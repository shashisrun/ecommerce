<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->string('slug')->unique('listings_slug_unique');
            $table->longText('content')->nullable();
            $table->text('cover')->nullable();
            $table->text('thumbnail')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
