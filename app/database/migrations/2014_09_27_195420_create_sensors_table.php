<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSensorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sensors', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('user_id');
			$table->string('uuid');
			$table->boolean('status')->default(0);
			$table->string('elevation');

			$table->timestamps();
		});

		DB::statement("ALTER TABLE sensors ADD COLUMN geolocation POINT AFTER status");
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sensors');
	}

}
