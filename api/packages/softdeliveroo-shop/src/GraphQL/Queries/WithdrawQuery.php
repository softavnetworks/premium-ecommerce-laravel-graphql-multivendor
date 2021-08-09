<?php


namespace SoftDeliveroo\GraphQL\Queries;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use SoftDeliveroo\Facades\Shop;

class WithdrawQuery
{
    public function fetchWithdraws($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\WithdrawController@fetchWithdraws', $args);
    }

    public function fetchSingleWithdraw($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\WithdrawController@fetchSingleWithdraw', $args);
    }
}
