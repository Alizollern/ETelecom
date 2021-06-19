<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->integer('employee_id');
			$table->primary('employee_id');
            $table->string('login',32);
			$table->string('password',32);
			$table->string('first_name',32);
			$table->string('last_name',32);
		    $table->int('salary');
			$table->date('birth_date');
			$table->string('gender',4);
			$table->date('hire_date');
			$table->integer('role_id');
			$table->integer('action_id');
			$table->foreign('role_id')->references('role_id')->on('role');
			$table->foreign('action_id')->references('action_id')->on('action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
