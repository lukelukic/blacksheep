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
            //Fields
            $table->increments('id');
            $table->timestamps();
            $table->string("name", 30)->unique();
            $table->mediumText("description");
            $table->boolean("is_active")->default(false);
            $table->boolean("is_offer")->default(false);
            $table->unsignedInteger("product_category_id")->unsigned();
            $table->boolean("special")->default(false);
            //Foreign keys
            $table->foreign('product_category_id')->references('id')->on('product_categories');
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
