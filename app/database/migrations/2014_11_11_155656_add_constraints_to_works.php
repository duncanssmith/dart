<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsToWorks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// DB::select(DB::raw('ALTER TABLE `works` CHANGE COLUMN `work_date` `work_date` VARCHAR(32) DEFAULT NULL AFTER `dimensions`;'));
		// DB::select(DB::raw('ALTER TABLE `group_work` CHANGE COLUMN `work_id` `work_id` INT(10) UNSIGNED NOT NULL;'));
		// DB::select(DB::raw('ALTER TABLE `group_work` CHANGE COLUMN `group_id` `group_id` INT(10) UNSIGNED NOT NULL;'));
		Schema::table('group_work', function(Blueprint $table)
		{		
            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('group_work', function(Blueprint $table)
		{
    	    $table->dropForeign('group_work_work_id_foreign');
	    	$table->dropForeign('group_work_group_id_foreign');	
		});
	}

}
