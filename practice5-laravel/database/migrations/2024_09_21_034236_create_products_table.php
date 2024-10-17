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
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('slug');
      $table->text('description')->nullable();
      $table->decimal('price', 15, 2);
      $table->integer('discount')->nullable();
      $table->string('image')->nullable();
      $table->integer('total_stock_qty');
      $table->tinyInteger('visibility')->nullable();
      $table->foreignId('product_category_id')
        ->nullable()
        ->constrained()
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->foreignId('product_brand_id')
        ->nullable()
        ->constrained()
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->foreignId('product_supplier_id')
        ->nullable()
        ->constrained()
        ->onUpdate('cascade')
        ->onDelete('cascade');
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
};
