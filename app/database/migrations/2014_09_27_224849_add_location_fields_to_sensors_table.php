<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddLocationFieldsToSensorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sensors', function(Blueprint $table)
		{
			$table->dropColumn('geolocation');

			$table->string('latitude')->after('status');
			$table->string('longitude')->after('latitude');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sensors', function(Blueprint $table)
		{
			$table->dropColumn(['latitude', 'longitude']);
		});

		DB::statement("ALTER TABLE sensors ADD COLUMN geolocation POINT AFTER status");
	}

}
