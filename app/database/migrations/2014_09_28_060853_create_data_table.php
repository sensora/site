<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('data', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('sensor_id');
			$table->string('temperature')->nullable();
			$table->string('moisture')->nullable();
			$table->string('pressure')->nullable();
			$table->string('noise')->nullable();
			$table->string('light')->nullable();

			$table->softDeletes();

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
		Schema::drop('data');
	}

}
