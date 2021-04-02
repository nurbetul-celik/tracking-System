<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaravelTbUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laravel_tb_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('password',255);
            $table->text('remember_token',255);
            $table->string('email',100);
            $table->enum('type',array('admin','supervisor','personel'));
            $table->text('permissions');
            $table->text('activation_key',255);
            $table->integer('activation');
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
        Schema::dropIfExists('laravel_tb_user');
    }
}
