<?php


namespace SoftDeliveroo\GraphQL\Queries;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use SoftDeliveroo\Facades\Shop;

class OrderQuery
{
    public function fetchOrders($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\OrderController@fetchOrders', $args);
    }
}
