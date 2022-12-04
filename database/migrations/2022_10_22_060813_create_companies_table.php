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
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('email');
            $table->string('tin', 50);
            $table->string('trade_license', 50);
            $table->string('phone', 50);
            $table->string('address', 500);
            $table->string('total_orders_done', 50);
            $table->string('total_profit', 50);
            $table->string('photo', 500)->nullable();
            $table->string('production_per_week', 50);
            $table->string('status', 500)->nullable();
            $table->integer('seller_id')->unsigned();
            $table->foreign('seller_id')->references('id')->on('sellers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
