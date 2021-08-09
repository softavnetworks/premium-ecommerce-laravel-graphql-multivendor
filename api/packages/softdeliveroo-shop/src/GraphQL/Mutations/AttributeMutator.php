<?php


namespace SoftDeliveroo\GraphQL\Mutation;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use SoftDeliveroo\Facades\Shop;

class AttributeMutator
{
    public function storeAttribute($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\AttributeController@store', $args);
    }
    public function updateAttribute($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\AttributeController@updateAttribute', $args);
    }
    public function deleteAttribute($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\AttributeController@deleteAttribute', $args);
    }
}
