<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('texts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 256)->nullable();
			$table->string('author', 64)->nullable();
			$table->string('year', 16)->nullable();
			$table->string('description', 256)->nullable();
			$table->string('publication', 256)->nullable();
			$table->string('publication_date', 24)->nullable();
			$table->text('content')->nullable();
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
		Schema::drop('texts');
	}

}
