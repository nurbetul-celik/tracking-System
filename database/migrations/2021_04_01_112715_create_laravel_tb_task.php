<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaravelTbTask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laravel_tb_task', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name',255) ;
            $table->text('description');
            $table->enum('type',array('waiting','started','on_confirmation','revision','finished'));
            $table->enum('difficulty',array(1,2,3,4,5));
            $table->enum('user',array('admin','supervisor','personel'));
            $table->integer('user_id');
            $table->integer('supervisor_id');
            $table->dateTime('start_date');
            $table->dateTime('deadline_date');
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
        Schema::dropIfExists('laravel_tb_task');
    }
}
