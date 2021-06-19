<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->integer('client_id');
            $table->primary('client_id');
			$table->string('first_name',32);
			$table->string('last_name',32);
			$table->integer('IIN',16)->unique();
			$table->string('role',16)->nullable();
			$table->string('telephone',16);
			$table->string('email',32)->unique();
			$table->integer('order_id');
			$table->integer('address_id');
			$table->foreign('order_id')->references('order_id')->on('order');
			$table->foreign('address_id')->references('address_id')->on('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
