<?php


namespace SoftDeliveroo\GraphQL\Queries;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use SoftDeliveroo\Facades\Shop;

class UserQuery
{
    public function fetchStaff($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\UserController@fetchStaff', $args);
    }
    public function me($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\UserController@me', $args);
    }
}
