<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuildingsTable extends Migration {

	public function up()
	{
		Schema::create('buildings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('address', 100);
			$table->string('number_of_appartments');
		});
	}

	public function down()
	{
		Schema::drop('building');
	}
}