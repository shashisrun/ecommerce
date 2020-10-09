<?php

use Illuminate\Database\Seeder;
use DB;

class CartBreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typesssss')->insert(
            [
                'name' => 'carts',
                'slug' => 'carts',
                'display_name_singular' => 'Cart',
                'display_name_plural' => 'Carts',
                'model_name' => 'App\Cart',
                'generate_permissions' => '1',
                'server_side' => '0',
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
            ],
            [
                'name' => 'wishlists',
                'slug' => 'wishlists',
                'display_name_singular' => 'Wishlist',
                'display_name_plural' => 'Wishlists',
                'model_name' => 'App\Wishlist',
                'generate_permissions' => '1',
                'server_side' => '0',
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
            ],
            [
                'name' => 'orders',
                'slug' => 'orders',
                'display_name_singular' => 'Order',
                'display_name_plural' => 'Orders',
                'model_name' => 'App\Order',
                'generate_permissions' => '1',
                'server_side' => '0',
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
            ],
            [
                'name' => 'products',
                'slug' => 'products',
                'display_name_singular' => 'Product',
                'display_name_plural' => 'Products',
                'model_name' => 'App\Product',
                'generate_permissions' => '1',
                'server_side' => '0',
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
            ],
        );
    }
}
