<?php

namespace SoftDeliveroo\Listeners;

use Exception;
use SoftDeliveroo\Database\Models\Product;
use SoftDeliveroo\Database\Models\VariationOption;
use SoftDeliveroo\Events\OrderCreated;

class ManageProductInventory
{
    protected function updateProductInventory($product)
    {

        try {
            $updatedQuantity = $product->quantity - $product->pivot->order_quantity;
            if ($updatedQuantity > -1) {
                Product::find($product->id)->update(['quantity' => $updatedQuantity]);
            }
            if (!empty($product->pivot->order_quantity->variation_option_id)) {
                $variationOption = VariationOption::findOrFail($product->pivot->order_quantity->variation_option_id);
                $updatedQuantity = $variationOption->quantity - $product->pivot->order_quantity;
                $variationOption->update([['quantity' => $updatedQuantity]]);
            }
        } catch (Exception $th) {
        }
    }

    /**
     * Handle the event.
     *
     * @param OrderCreated $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $products = $event->order->products;
        foreach ($products as $product) {
            $this->updateProductInventory($product);
        }
    }
}
