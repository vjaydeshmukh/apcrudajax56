<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
	public function up()
	{
		Schema::create('students', function (Blueprint $table) {
			$table->increments('id');
			$table->string('first_name', 20);
			$table->string('last_name', 20);

			$table->unsignedInteger('sex_id');
			$table->foreign('sex_id')->references('id')->on('sexes')
              ->onDelete('restrict')
              ->onUpdate('restrict');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('students');
	}
}