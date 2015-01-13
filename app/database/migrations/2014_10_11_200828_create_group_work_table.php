<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupWorkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::drop('work_group');

        Schema::create('group_work', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('work_id')->unsigned();
            $table->integer('group_id')->unsigned();
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

        Schema::drop('group_work');

        Schema::create('work_group', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('work_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->timestamps();
        });
	}

}
