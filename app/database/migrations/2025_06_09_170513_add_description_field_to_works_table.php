<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionFieldToWorksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        	Schema::table('works', function(Blueprint $table)
		{
			 $table->string('description', 4096)->nullable();
			 $table->string('notes', 4096)->nullable();
		});
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('works', function(Blueprint $table)
		{
		     $table->dropColumn('notes');
		     $table->dropColumn('description');
		});
		//
	}

}
