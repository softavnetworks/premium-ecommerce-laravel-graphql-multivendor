<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SoftDeliveroo\Database\Models\Attribute;
use SoftDeliveroo\Database\Models\AttributeValue;
use SoftDeliveroo\Database\Models\Product;
use SoftDeliveroo\Database\Models\User;
use SoftDeliveroo\Database\Models\Category;
use SoftDeliveroo\Database\Models\Type;
use SoftDeliveroo\Database\Models\Order;
use SoftDeliveroo\Database\Models\OrderStatus;
use SoftDeliveroo\Database\Models\Coupon;
use Spatie\Permission\Models\Permission;
use SoftDeliveroo\Enums\Permission as UserPermission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // run your app seeder
    }
}
