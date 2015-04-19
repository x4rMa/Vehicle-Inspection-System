<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */


	public function up()
	{
		Schema::create('certificates', function(Blueprint $table){
			$table->increments('id');
			$table->integer('vehicle_id');
			$table->string('certno', 100);
			$table->integer('issued_by');
			$table->boolean('status')->default(false); // 1 approved, 0 declined
			$table->softDeletes();
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
		Schema::drop('certificates');
	}

}
