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
        Schema::table('messages', function (Blueprint $table) {
            DB::table('messages')->insert(array(
                'sender_email' => "rh140025@gmail.com",
                'receiver_email' => "rh150025@gmail.com",
                'title' => "hello test",
                'message_details' => "hello this is a message",
                'status' => 'sent',
                'send_time' => '121'
            ));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            DB::table("messages")->where("sender_email", "=", "rh140025@gmail.com")->delete();
        });
    }
};
