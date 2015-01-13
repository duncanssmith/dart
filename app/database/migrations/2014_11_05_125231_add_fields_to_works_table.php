<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToWorksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('works', function(Blueprint $table)
		{
			// $table->string('description', 256)->nullable();
			// $table->string('notes', 256)->nullable();
		});

		// DB::select(DB::raw('ALTER TABLE `works` CHANGE COLUMN `work_date` `work_date` VARCHAR(32) DEFAULT NULL AFTER `dimensions`;'));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// DB::select(DB::raw('ALTER TABLE `works` CHANGE COLUMN `work_date` `work_date` DATE DEFAULT NULL;'));

		Schema::table('works', function(Blueprint $table)
		{
		  //   $table->dropColumn('notes');
		  //   $table->dropColumn('description');
		});
	}

}
