<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	        Schema::create('navigations', function($table)
            {
                $table->increments('id');
                $table->string('name', 255);
                $table->string('alias', 255)->nullable();
                $table->string('url', 255)->default('/');
                $table->smallInteger('level')->default(0);
                $table->smallInteger('layout')->default(0);
                $table->smallInteger('order')->default(0);
                $table->boolean('display')->default(false);
                $table->boolean('secure')->default(true);
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
		Schema::drop('navigations');
		//
	}

}
