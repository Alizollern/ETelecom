<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->integer('address_id');
			$table->primary('address_id');
			$table->integer('region_id');
			$table->integer('type_id');
			$table->integer('street_id');
			$table->integer('corpus')->nullable();
			$table->integer('apartment')->nullable();
			$table->integer('room')->nullable();
			$table->foreign('region_id')->references('region_id')->on('region');
			$table->foreign('type_id')->references('type_id')->on('street_type');
			$table->foreign('street_id')->references('street_id')->on('street');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
