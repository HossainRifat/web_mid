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
        Schema::create('quantity_colors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('color_name', 100);
            $table->string('m', 20);
            $table->string('l', 20);
            $table->string('xl', 20);
            $table->string('xxl', 20);
            $table->string('xxxl', 20);
            $table->string('photo', 500);
            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantity_colors');
    }
};
