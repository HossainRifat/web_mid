<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::table('messages')->where(['sender_email' => 'rh140025@gmail.com'])->update(['sender_email' => 'djcadet']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('messages')->where(['sender_email' => 'djcadet'])->update(['sender_email' => 'rh140025@gmail.com']);
    }
};
