<?php

use Illuminate\Database\Seeder;
use DB;

class ProductBreadSeed extends Seeder
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
        if (!($this->dataType('slug', 'products'))->exists) {
            DB::table('data_types')->insert([
                'name' => 'products',
                'slug' => 'products',
                'display_name_singular' => 'Product',
                'display_name_plural' => 'Products',
                'model_name' => 'Boldstellar\\Ecommerce\\Models\\Product',
                'controller' => 'Boldstellar\\Ecommerce\\Http\\Controllers\\ProductController',
                'generate_permissions' => '1',
                'server_side' => '0',
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
            ])->save();
        }


        $cart = DB::table('data_types')->where('slug', 'products')->firstOrFail();
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
                'ordrer'       => 1,
            ])->save();
        }
            
        if (!($this->dataRow($product, 'title'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'text',
                'display_name' => 'Title',
                'field'        => 'title',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 1,
                'details'      => '{}',
                'ordrer'       => 2,
            ])->save();
        }
        
        if (!($this->dataRow($product, 'slug'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'text',
                'display_name' => 'Slug',
                'field'        => 'slug',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 1,
                'details'      => '{}',
                'ordrer'       => 3,
            ])->save();
        }

        if (!($this->dataRow($product, 'content'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'rich_text_box',
                'display_name' => 'Content',
                'field'        => 'content',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 1,
                'details'      => '{}',
                'ordrer'       => 4,
            ])->save();
        }
        
        if (!($this->dataRow($product, 'cover'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'image',
                'display_name' => 'Cover',
                'field'        => 'cover',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 1,
                'details'      => '{}',
                'ordrer'       => 5,
            ])->save();
        }
        
        if (!($this->dataRow($product, 'thumbnail'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'image',
                'display_name' => 'Thumbnail',
                'field'        => 'thumbnail',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 1,
                'details'      => '{}',
                'ordrer'       => 6,
            ])->save();
        }
        
        if (!($this->dataRow($product, 'meta_title'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'text',
                'display_name' => 'Meta Title',
                'field'        => 'meta_title',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 1,
                'details'      => '{}',
                'ordrer'       => 7,
            ])->save();
        }
        
        if (!($this->dataRow($product, 'meta_keywords'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'text',
                'display_name' => 'Meta Keywords',
                'field'        => 'meta_keywords',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 1,
                'details'      => '{}',
                'ordrer'       => 8,
            ])->save();
        }
        
        if (!($this->dataRow($product, 'meta_description'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'text_area',
                'display_name' => 'Meta Description',
                'field'        => 'meta_description',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 1,
                'details'      => '{}',
                'ordrer'       => 9,
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
                'details'      => '{}',
                'ordrer'       => 10,
            ])->save();
        }
    
        if (!( $this->dataRow($product, 'updated_at'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'field'        => 'updated_at',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '{}',
                'order'        => 11,
            ])->save();
        }
                
        if (!($this->dataRow($product, 'product_belongstomany_product_category_relationship'))->exists) {
            $dataRow->fill([
                'data_type_id'    => $cart->id,
                'type'         => 'relationship',
                'field'        => 'product_belongstomany_product_category_relationship',
                'display_name' => 'product_categories',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'model'       => 'Boldstellar\\Ecommerce\\Models\\ProductCategory',
                    'table'       => 'product_categories',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'category_to_products',
                    'pivot'       => 1,
                    'taggable'    => '0',
                ],
                'order'        => 10,
            ])->save();
        }

        // if (!($this->dataRow($product, 'product_belongsto_status_relationship'))->exists) {
        //     $dataRow->fill([
        //         'type'         => 'relationship',
        //         'field'        => 'product_belongsto_status_relationship',
        //         'display_name' => 'cart_product',
        //         'required'     => 0,
        //         'browse'       => 1,
        //         'read'         => 1,
        //         'edit'         => 1,
        //         'add'          => 1,
        //         'delete'       => 0,
        //         'details'      => [
        //             'model'       => 'Boldstellar\\Ecommerce\\Models\\Product',
        //             'table'       => 'products',
        //             'type'        => 'belongsToMany',
        //             'column'      => 'id',
        //             'key'         => 'id',
        //             'label'       => 'title',
        //             'pivot_table' => 'cart_to_product',
        //             'pivot'       => '1',
        //             'taggable'    => '0',
        //         ],
        //         'order'        => 11,
        //     ])->save();
        // }
    
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
