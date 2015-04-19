<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesInspectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicles_inspection', function(Blueprint $table){
			$table->increments('id');
			$table->integer('vehicle_id')->unsigned();

			$table->string('mileage')->nullable();
			$table->string('pstatus')->nullable();
			$table->string('istatus')->nullable();
			$table->string('certno')->nullable();
			$table->text('comment')->nullable();
			$table->string('reistatus')->nullable();
			$table->string('inspe_comment')->nullable();
			$table->decimal('amount_paid', 10, 2)->nullable();
			$table->string('reinspe_amount')->nullable();
			$table->string('vvalue')->nullable();
			$table->string('issue_date')->nullable();
			$table->string('inspedate')->nullable();
			$table->string('weekreport')->nullable();
			$table->string('monthreport')->nullable();
			$table->string('odometreunit')->nullable();
			$table->string('inspecentre')->nullable();
			$table->boolean('status')->default(false);
			$table->integer('staff_id')->nullable();

			$table->softDeletes();
			$table->timestamps();

			$table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicles_inspection');
	}

}
