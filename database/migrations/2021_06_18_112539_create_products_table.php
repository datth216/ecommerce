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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->string('product_name_en');
            $table->string('product_name_vn');
            $table->string('product_slug_en');
            $table->string('product_slug_vn');
            $table->string('product_code');
            $table->integer('product_qty');
            $table->string('product_tag_en');
            $table->string('product_tag_vn');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_vn')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_vn');
            $table->integer('selling_price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->string('short_desc_en');
            $table->string('short_desc_vn');
            $table->string('long_desc_en');
            $table->string('long_desc_vn');
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deal')->nullable();
            $table->integer('status')->default(0);
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
