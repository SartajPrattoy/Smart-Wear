<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_title');
            $table->string('product_description');
            $table->string('catagory_id');
            $table->string('apparel_id');
            $table->string('image')->nullable();
            $table->string('vendor_name')->nullable();
            $table->integer('price');
            $table->integer('discounted_price')->nullable();
            $table->integer('quantity');
            $table->integer('days');
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
        Schema::dropIfExists('temp_products');
    }
};
