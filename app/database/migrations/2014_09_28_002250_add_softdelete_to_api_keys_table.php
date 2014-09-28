<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSoftdeleteToApiKeysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('api_keys', function(Blueprint $table)
		{
			$table->softDeletes();

			$table->dropColumn('status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('api_keys', function(Blueprint $table)
		{
			$table->dropColumns(['deleted_at']);

			$table->boolean('status')->default(0);
		});
	}

}
