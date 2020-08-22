<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_id');
            $table->string('name');
            $table->string('invoice_name')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('purchase_price',10,2);
            $table->decimal('sale_price',10,2);
            $table->string('unit');
            $table->decimal('in_hand',12,2);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        Schema::table('inventory_histories', function($table){
            $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_histories');
    }
}
