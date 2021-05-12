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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description');
            $table->unsignedInteger('price');
            $table->unsignedInteger('weight');
            $table->unsignedInteger('calories');
            $table->unsignedInteger('fats');
            $table->unsignedInteger('proteins');
            $table->unsignedInteger('carbohydrates');
            $table->unsignedInteger('category_id');
            $table->timestamps();
        });
    }


    public function category()
    {
      return $this->belongsTo(Category::class);
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
