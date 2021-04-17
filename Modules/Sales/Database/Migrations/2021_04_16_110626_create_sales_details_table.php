<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id();
            $table->uuid('sales_id');
            $table->unsignedBigInteger('items_id');
            $table->unsignedBigInteger('quantity');
            $table->timestamps();

            $table->foreign('sales_id')->references('id')->on('sales')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('items_id')->references('id')->on('items')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_details');
    }
}