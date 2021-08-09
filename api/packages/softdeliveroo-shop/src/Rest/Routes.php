<?php

use Illuminate\Support\Facades\Route;

use SoftDeliveroo\Http\Controllers\AddressController;
use SoftDeliveroo\Http\Controllers\AttributeController;
use SoftDeliveroo\Http\Controllers\AttributeValueController;
use SoftDeliveroo\Http\Controllers\ProductController;
use SoftDeliveroo\Http\Controllers\SettingsController;
use SoftDeliveroo\Http\Controllers\UserController;
use SoftDeliveroo\Http\Controllers\TypeController;
use SoftDeliveroo\Http\Controllers\OrderController;
use SoftDeliveroo\Http\Controllers\OrderStatusController;
use SoftDeliveroo\Http\Controllers\CategoryController;
use SoftDeliveroo\Http\Controllers\CouponController;
use SoftDeliveroo\Http\Controllers\AttachmentController;
use SoftDeliveroo\Http\Controllers\ShippingController;
use SoftDeliveroo\Http\Controllers\TaxController;
use SoftDeliveroo\Enums\Permission;
use SoftDeliveroo\Http\Controllers\ShopController;
use SoftDeliveroo\Http\Controllers\TagController;
use SoftDeliveroo\Http\Controllers\WithdrawController;

Route::post('/register', 'SoftDeliveroo\Http\Controllers\UserController@register');
Route::post('/token', 'SoftDeliveroo\Http\Controllers\UserController@token');
Route::post('/forget-password', 'SoftDeliveroo\Http\Controllers\UserController@forgetPassword');
Route::post('/verify-forget-password-token', 'SoftDeliveroo\Http\Controllers\UserController@verifyForgetPasswordToken');
Route::post('/reset-password', 'SoftDeliveroo\Http\Controllers\UserController@resetPassword');
Route::post('/contact', 'SoftDeliveroo\Http\Controllers\UserController@contactAdmin');
Route::post('/social-login-token', 'SoftDeliveroo\Http\Controllers\UserController@socialLogin');

Route::apiResource('products', ProductController::class, [
    'only' => ['index', 'show']
]);
Route::apiResource('types', TypeController::class, [
    'only' => ['index', 'show']
]);
Route::apiResource('attachments', AttachmentController::class, [
    'only' => ['index', 'show']
]);
Route::apiResource('categories', CategoryController::class, [
    'only' => ['index', 'show']
]);
Route::apiResource('tags', TagController::class, [
    'only' => ['index', 'show']
]);

Route::get('fetch-parent-category', 'SoftDeliveroo\Http\Controllers\CategoryController@fetchOnlyParent');

Route::apiResource('coupons', CouponController::class, [
    'only' => ['index', 'show']
]);

Route::post('coupons/verify', 'SoftDeliveroo\Http\Controllers\CouponController@verify');


Route::apiResource('order_status', OrderStatusController::class, [
    'only' => ['index', 'show']
]);

Route::apiResource('attributes', AttributeController::class, [
    'only' => ['index', 'show']
]);

Route::apiResource('all-shop', ShopController::class, [
    'only' => ['index', 'show']
]);

Route::apiResource('attribute-values', AttributeValueController::class, [
    'only' => ['index', 'show']
]);

Route::apiResource('settings', SettingsController::class, [
    'only' => ['index']
]);


Route::group(['middleware' => ['can:' . Permission::CUSTOMER, 'auth:sanctum']], function () {
    Route::post('/logout', 'SoftDeliveroo\Http\Controllers\UserController@logout');
    Route::apiResource('orders', OrderController::class, [
        'only' => ['index', 'show', 'store']
    ]);
    Route::get('orders/tracking_number/{tracking_number}', 'SoftDeliveroo\Http\Controllers\OrderController@findByTrackingNumber');
    Route::apiResource('attachments', AttachmentController::class, [
        'only' => ['store', 'update', 'destroy']
    ]);
    Route::post('checkout/verify', 'SoftDeliveroo\Http\Controllers\CheckoutController@verify');
    Route::get('me', 'SoftDeliveroo\Http\Controllers\UserController@me');
    Route::put('users/{id}', 'SoftDeliveroo\Http\Controllers\UserController@update');
    Route::post('/change-password', 'SoftDeliveroo\Http\Controllers\UserController@changePassword');
    Route::apiResource('address', AddressController::class, [
        'only' => ['destroy']
    ]);
});

Route::group(
    ['middleware' => ['permission:' . Permission::STAFF . '|' . Permission::STORE_OWNER, 'auth:sanctum']],
    function () {
        Route::get('analytics', 'SoftDeliveroo\Http\Controllers\AnalyticsController@analytics');
        Route::apiResource('products', ProductController::class, [
            'only' => ['store', 'update', 'destroy']
        ]);
        Route::apiResource('attributes', AttributeController::class, [
            'only' => ['store', 'update', 'destroy']
        ]);
        Route::apiResource('attribute-values', AttributeValueController::class, [
            'only' => ['store', 'update', 'destroy']
        ]);
        Route::apiResource('orders', OrderController::class, [
            'only' => ['update', 'destroy']
        ]);
        Route::get('popular-products', 'SoftDeliveroo\Http\Controllers\AnalyticsController@popularProducts');
    }
);
Route::group(
    ['middleware' => ['permission:' . Permission::STORE_OWNER, 'auth:sanctum']],
    function () {
        Route::apiResource('all-shop', ShopController::class, [
            'only' => ['store', 'update', 'destroy']
        ]);
        Route::apiResource('withdraws', WithdrawController::class, [
            'only' => ['store', 'index', 'show']
        ]);
        Route::post('users/add-staff', 'SoftDeliveroo\Http\Controllers\ShopController@addStaff');
        Route::post('users/remove-staff', 'SoftDeliveroo\Http\Controllers\ShopController@removeStaff');
        Route::get('staffs', 'SoftDeliveroo\Http\Controllers\UserController@staffs');
        Route::get('my-shops', 'SoftDeliveroo\Http\Controllers\ShopController@myShops');
    }
);


Route::group(['middleware' => ['permission:' . Permission::SUPER_ADMIN, 'auth:sanctum']], function () {
    Route::apiResource('types', TypeController::class, [
        'only' => ['store', 'update', 'destroy']
    ]);
    Route::apiResource('withdraws', WithdrawController::class, [
        'only' => ['update', 'destroy']
    ]);
    Route::apiResource('categories', CategoryController::class, [
        'only' => ['store', 'update', 'destroy']
    ]);
    Route::apiResource('tags', TagController::class, [
        'only' => ['store', 'update', 'destroy']
    ]);
    Route::apiResource('coupons', CouponController::class, [
        'only' => ['store', 'update', 'destroy']
    ]);
    Route::apiResource('order_status', OrderStatusController::class, [
        'only' => ['store', 'update', 'destroy']
    ]);

    Route::apiResource('settings', SettingsController::class, [
        'only' => ['store']
    ]);
    Route::apiResource('users', UserController::class);
    Route::post('users/ban-user', 'SoftDeliveroo\Http\Controllers\UserController@banUser');
    Route::post('users/active-user', 'SoftDeliveroo\Http\Controllers\UserController@activeUser');
    Route::apiResource('taxes', TaxController::class);
    Route::apiResource('shipping', ShippingController::class);
    Route::post('approve-shop', 'SoftDeliveroo\Http\Controllers\ShopController@approveShop');
    Route::post('disapprove-shop', 'SoftDeliveroo\Http\Controllers\ShopController@disApproveShop');
    Route::post('approve-withdraw', 'SoftDeliveroo\Http\Controllers\WithdrawController@approveWithdraw');
});
