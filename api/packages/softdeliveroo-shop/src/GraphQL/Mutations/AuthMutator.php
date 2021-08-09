<?php


namespace SoftDeliveroo\GraphQL\Mutation;


use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use SoftDeliveroo\Facades\Shop;

class AuthMutator
{
    public function token($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\UserController@token', $args);
    }

    public function logout($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\UserController@logout', $args);
    }

    public function register($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\UserController@register', $args);
    }
    public function changePassword($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\UserController@changePassword', $args);
    }
    public function forgetPassword($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\UserController@forgetPassword', $args);
    }
    public function verifyForgetPasswordToken($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\UserController@verifyForgetPasswordToken', $args);
    }
    public function resetPassword($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\UserController@resetPassword', $args);
    }
    public function banUser($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\UserController@banUser', $args);
    }
    public function activeUser($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\UserController@activeUser', $args);
    }
    public function contactAdmin($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\UserController@contactAdmin', $args);
    }
    public function socialLogin($rootValue, array $args, GraphQLContext $context)
    {
        return Shop::call('SoftDeliveroo\Http\Controllers\UserController@socialLogin', $args);
    }
}
