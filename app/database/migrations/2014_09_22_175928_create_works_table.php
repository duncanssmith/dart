<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('works', function($table)
            {
                $table->increments('id');
                $table->string('reference', 16)->nullable();
                $table->string('title', 255)->nullable();
                $table->string('media', 255)->nullable();
                $table->string('dimensions', 32)->nullable();
                $table->string('work_date', 32)->nullable();
                $table->timestamps();
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
            Schema::drop('works');
		//
	}

}
