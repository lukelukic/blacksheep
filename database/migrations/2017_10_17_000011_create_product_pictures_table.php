<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_picture', function (Blueprint $table) {
            $table->unsignedInteger("product_id");
            $table->unsignedInteger("picture_id");
            $table->timestamps();
            $table->primary(["product_id", "picture_id"]);

            //Foreign keys
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('picture_id')->references('id')->on('pictures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_pictures');
    }
}
