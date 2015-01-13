<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsToTexts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('group_text', function(Blueprint $table)
		{		
            $table->foreign('text_id')->references('id')->on('texts')->onDelete('cascade');
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
		Schema::table('group_text', function(Blueprint $table)
		{
    	    $table->dropForeign('group_text_text_id_foreign');
	    	$table->dropForeign('group_text_group_id_foreign');	
		});
	}

}
