<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMetaTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_meta_types', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('type');
            $table->integer('product_category_id');
            $table->integer('filterable');
            $table->integer('visible');
            $table->timestamps();
            $table->integer('parent')->nullable();
            $table->integer('status');
            $table->integer('required')->nullable();
            $table->longText('details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_meta_types');
    }
}
