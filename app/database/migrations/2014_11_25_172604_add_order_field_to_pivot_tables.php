<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderFieldToPivotTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('group_work', function(Blueprint $table)
		{
		    $table->smallInteger('order')->nullable();	
		});
		Schema::table('group_text', function(Blueprint $table)
		{
		    $table->smallInteger('order')->nullable();	
		});
		Schema::table('works', function(Blueprint $table)
		{
			$table->dropColumn('order');
		});
		Schema::table('texts', function(Blueprint $table)
		{
			$table->dropColumn('order');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('texts', function(Blueprint $table)
		{
		    $table->smallInteger('order')->nullable();	
		});
		Schema::table('works', function(Blueprint $table)
		{
		    $table->smallInteger('order')->nullable();	
		});
		Schema::table('group_text', function(Blueprint $table)
		{
			$table->dropColumn('order');
		});
		Schema::table('group_work', function(Blueprint $table)
		{
			$table->dropColumn('order');
		});
	}

}
