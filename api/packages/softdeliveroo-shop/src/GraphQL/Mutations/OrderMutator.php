<?php


namespace SoftDeliveroo\GraphQL\Mutation;

use Illuminate\Support\Facades\Log;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use SoftDeliveroo\Exceptions\SoftdeliverooException;
use SoftDeliveroo\Facades\Shop;

class OrderMutator
{

    public function store($rootValue, array $args, GraphQLContext $context)
    {
        try {
            return Shop::call('SoftDeliveroo\Http\Controllers\OrderController@store', $args);
        } catch (\Exception $e) {
            throw new SoftdeliverooException('PICKBAZAR_ERROR.SOMETHING_WENT_WRONG');
        }
    }
    public function update($rootValue, array $args, GraphQLContext $context)
    {
        try {
            return Shop::call('SoftDeliveroo\Http\Controllers\OrderController@updateOrder', $args);
        } catch (\Exception $e) {
            throw new SoftdeliverooException('PICKBAZAR_ERROR.SOMETHING_WENT_WRONG');
        }
    }
}
