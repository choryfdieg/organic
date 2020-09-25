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
            $table->id();
            $table->string('title', 500)->nullable();
            $table->string('url_clean', 500)->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->unsigned();
            $table->integer('offer_price')->unsigned()->nullable();            
            $table->integer('stock')->unsigned();
            $table->integer('member_id')->unsigned()->nullable();            
            $table->integer('type_product_id')->unsigned()->nullable();            
            $table->integer('category_product_id')->unsigned()->nullable();
            $table->integer('status_product_id')->unsigned()->nullable();
            $table->enum('posted', ['yes', 'not'])->default('not');
            $table->timestamps();
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
