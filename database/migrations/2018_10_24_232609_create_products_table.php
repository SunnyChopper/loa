<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('product_name', 256);
            $table->string('product_description', 1024);
            $table->double('product_price');
            $table->integer('stock');
            $table->string('featured_image_url', 512);
            $table->string('image_links', 512)->default("[]");
            $table->string('sku', 256);
            $table->text('selectors');
            $table->integer('digital_product');
            $table->string('digital_product_link', 512);
            $table->string('shipping_options');
            $table->double('avg_rating')->default(-1);
            $table->integer('num_reviews');
            $table->integer('is_active')->default(1);
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
