<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action', function (Blueprint $table) {
            $table->integer('action_id');
            $table->primary('action_id');
			$table->integer('employee_id');
			$table->integer('client_id');
			$table->string('comment',255);
			$table->foreign('employee_id')->references('employee_id')->on('employee');
			$table->foreign('client_id')->references('client_id')->on('client');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action');
    }
}
