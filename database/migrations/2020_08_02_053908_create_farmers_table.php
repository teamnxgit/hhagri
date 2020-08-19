<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->string('farmer_code');
            $table->string('title');
            $table->string('full_name')->nullable();
            $table->string('short_name');
            $table->string('gender');
            $table->string('nic');
            $table->string('house_no')->nullable();
            $table->string('street');
            $table->string('town');
            $table->string('district');
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });


        Schema::table('farmers', function($table){
            $table->primary('farmer_code');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmers');
    }
}
