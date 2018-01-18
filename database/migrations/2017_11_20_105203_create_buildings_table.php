dropIfExists<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuildingsTable extends Migration {

	public function up()
	{
		Schema::create('buildings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('username' , 50);
			$table->string('address', 100);
			$table->string('address_no', 5);
			$table->string('city', 100);
			$table->string('number_of_appartments', 100);
			$table->string('invoice', 100);
			$table->string('pib', 100);
			$table->string('mat', 100);
		});
	}

	public function down()
	{
		Schema::dropIfExists('building');
	}
}