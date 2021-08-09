<?php


namespace SoftDeliveroo\GraphQL\Mutation;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use SoftDeliveroo\Facades\Shop;

class WithdrawMutation
{
    public function store($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\WithdrawController@store', $args);
    }
    public function approveWithdraw($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\WithdrawController@approveWithdraw', $args);
    }
}
