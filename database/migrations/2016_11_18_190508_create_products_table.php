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
          $table->string('title');
          $table->string('author');
          $table->string('condition');
          $table->string('format');
          $table->string('publisher');
          $table->integer('genre_id')->unsigned();
          $table->foreign('genre_id')->references('id')->on('genres');
          $table->string('language');
          $table->string('isbn');
          $table->string('description');
          $table->decimal('price',5,2);
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
