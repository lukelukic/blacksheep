<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            //Fields
            $table->increments('id');
            $table->timestamps();
            $table->string("name", 30)->unique();
            $table->unsignedInteger("parent_id")->nullable();

            //Foreign keys
            $table->foreign("parent_id")->references("id")->on("product_categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categories');
    }
}
