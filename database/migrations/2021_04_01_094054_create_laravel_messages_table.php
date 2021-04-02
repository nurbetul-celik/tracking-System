<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaravelMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message_text');
            $table->integer('sender_id');
            $table->integer('receiver_id');
            $table->enum('status',array('active','deleted','passive'))->default('active');
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
        Schema::dropIfExists('tb_messages');
    }
}
