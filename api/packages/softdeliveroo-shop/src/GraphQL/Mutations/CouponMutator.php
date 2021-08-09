<?php


namespace SoftDeliveroo\GraphQL\Mutation;

use Illuminate\Support\Facades\Log;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use SoftDeliveroo\Facades\Shop;

class CouponMutator
{

    public function verify($rootValue, array $args, GraphQLContext $context)
    {
        try {
            return Shop::call('SoftDeliveroo\Http\Controllers\CouponController@verify', $args);
        } catch (\Exception $e) {
            return Log::info($e->getMessage());
        }
    }
}
