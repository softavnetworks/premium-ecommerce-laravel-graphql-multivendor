<?php


namespace SoftDeliveroo\GraphQL\Mutation;

use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use SoftDeliveroo\Http\Controllers\OrderStatusController;
use SoftDeliveroo\Facades\Shop;

class OrderStatusMutator
{

    public function store($rootValue, array $args, GraphQLContext $context)
    {

        // Do graphql stuff
        return Shop::call('SoftDeliveroo\Http\Controllers\OrderStatusController@store', $args);
    }
}
