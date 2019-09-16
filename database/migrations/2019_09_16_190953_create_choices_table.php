<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoicesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('choices', function (Blueprint $table) {
      $table->integer('user_id');
      $table->foreign('user_id')->references('id')->on('users');

      $table->integer('pizza_id');
      $table->foreign('pizza_id')->references('id')->on('pizzas');
      
      $table->integer('quantity');
      
      $table->integer('order_id');
      $table->foreign('order_id')->references('id')->on('orders');

      $table->primary(['user_id', 'order_id', 'pizza_id']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('choices');
  }
}
