<?php


namespace SoftDeliveroo\GraphQL\Mutation;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use SoftDeliveroo\Facades\Shop;

class ProductMutator
{
    public function store($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\ProductController@store', $args);
    }

    public function updateProduct($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\ProductController@updateProduct', $args);
    }
}
