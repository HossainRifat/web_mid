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
        Schema::create('buyers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email')->unique();
            $table->string('phone', 20)->unique();
            $table->string('address', 500);
            $table->string('passport', 100)->nullable();
            $table->string('nid', 30);
            $table->string('gender', 10);
            $table->string('dob', 50);
            $table->string('status', 50);
            $table->string('photo', 500);
            $table->string('documents', 500);
            $table->string('account', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyers');
    }
};
