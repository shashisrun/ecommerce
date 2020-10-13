<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;


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
        return  DataType::firstOrNew([$field => $for]);
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
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'carts');
        if (!$dataType->exists) {
            $dataType->fill([
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


        $cart = DataType::where('slug', 'carts')->firstOrFail();

        $dataRow = $this->dataRow($cart, 'id');
        if (!$dataRow->exists) {
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
            
        $dataRow = $this->dataRow($cart, 'user_id');
        if (!$dataRow->exists) {
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
        
        $dataRow = $this->dataRow($cart, 'product_id');
        if (!$dataRow->exists) {
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

        $dataRow = $this->dataRow($cart, 'quentity');
        if (!$dataRow->exists) {
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
    
        $dataRow = $this->dataRow($cart, 'created_at');
        if (!$dataRow->exists) {
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
    
        $dataRow = $this->dataRow($cart, 'updated_at');
        if (!$dataRow->exists) {
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

         $dataRow = $this->dataRow($cart, 'cart_belongsto_user_relationship');        
        if (!$dataRow->exists) {
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

        $dataRow = $this->dataRow($cart, 'cart_belongstomany_product_relationship');
        if (!$dataRow->exists) {
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

}
