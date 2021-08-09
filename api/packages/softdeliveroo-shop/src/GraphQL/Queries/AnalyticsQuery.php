<?php


namespace SoftDeliveroo\GraphQL\Queries;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use SoftDeliveroo\Facades\Shop;

class AnalyticsQuery
{
    public function analytics($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\AnalyticsController@analytics', $args);
    }

    public function popularProducts($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\AnalyticsController@popularProducts', $args);
    }
}
