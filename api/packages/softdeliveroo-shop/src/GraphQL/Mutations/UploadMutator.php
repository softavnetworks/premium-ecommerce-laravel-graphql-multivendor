<?php


namespace SoftDeliveroo\GraphQL\Mutation;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use SoftDeliveroo\Facades\Shop;

class UploadMutator
{
    public function store($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\AttachmentController@store', $args);
    }
}
