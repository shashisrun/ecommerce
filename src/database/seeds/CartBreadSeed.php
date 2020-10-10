<?php

use Illuminate\Database\Seeder;
use DB;

class CartBreadSeed extends Seeder
{

      /**
     * [dataType description].
     *
     * @param [String] $field [description]
     * @param [String] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return  DB::table('data_types')->firstOrNew([$field => $for]);
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!($this->dataType('slug', 'carts'))->exists) {
            DB::table('data_types')->insert([
                'name' => 'carts',
                'slug' => 'carts',
                'display_name_singular' => 'Cart',
                'display_name_plural' => 'Carts',
                'model_name' => 'Boldstellar\\Ecommerce\\Models\Cart',
                'generate_permissions' => '1',
                'server_side' => '0',
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
            ])->save();
        }


        $cart = DB::table('data_types')->where('slug', 'carts')->firstOrFail();
        $dataRow = DB::table('data_rows');

        if (!($this->dataRow($cart, 'id'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'number',
                'display_name' => 'ID',
                'field'        => 'id',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
                'details'      => '{}',
            ])->save();
        }
            
        if (!($this->dataRow($product, 'user_id'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'number',
                'display_name' => 'User ID',
                'field'        => 'user_id',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 1,
                'details'      => '{}',
            ])->save();
        }
        
        if (!($this->dataRow($product, 'product_id'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'number',
                'display_name' => 'Product ID',
                'field'        => 'product_id',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 1,
                'details'      => '{}',
            ])->save();
        }

        if (!($this->dataRow($product, 'quentity'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'number',
                'display_name' => 'Quantity',
                'field'        => 'quentity',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 1,
                'details'      => '{}'
            ])->save();
        }
    
        if (!($this->dataRow($product, 'created_at'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'field'        => 'created_at',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 6,
                'details'      => '{}'
            ])->save();
        }
    
        if (!( $this->dataRow($product, 'updated_at'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'field'        => 'created_at',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 7,
            ])->save();
        }
                
        if (!($this->dataRow($product, 'cart_belongsto_user_relationship'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'relationship',
                'display_name' => 'users',
                'field'        => 'cart_belongsto_user_relationship',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'TCG\\Voyager\\Models\\User',
                    'table'       => 'users',
                    'type'        => 'belongsTo',
                    'column'      => 'user_id',
                    'key'         => 'id',
                    'label'       => 'email',
                    'pivot_table' => 'blog_categories',
                    'pivot'       => 0,
                    'taggable'    => '0',
                ],
                'order'        => 10,
            ])->save();
        }

        if (!($this->dataRow($product, 'cart_belongstomany_product_relationship'))->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'cart_product',
                'field'        => 'cart_belongstomany_product_relationship',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'Boldstellar\\Ecommerce\\Models\\Product',
                    'table'       => 'products',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'title',
                    'pivot_table' => 'cart_to_product',
                    'pivot'       => '1',
                    'taggable'    => '0',
                ],
                'order'        => 11,
            ])->save();
        }
    
    }


     /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DB::table('data_rows')->firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }
}
