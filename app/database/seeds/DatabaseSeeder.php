<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		//$this->call('StatusTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('LocationTableSeeder');
		// $this->call('TaskTableSeeder');
		$this->call('LevelTableSeeder');
		// $this->call('ProjectTableSeeder');
		$this->call('VehicleTableSeeder');

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}

// class StatusTableSeeder extends Seeder {

// 	/**
// 	 * Run the database seeds.
// 	 *
// 	 * @return void
// 	 */
// 	public function run()
// 	{
// 		DB::table('statuses')->truncate();

// 		Status::create(array(
// 			'status_name' 	=> 'Complete',
// 			'class_name' => 'label-success'
// 		));

// 		Status::create(array(
// 			'status_name' 	=> 'Ongoing',
// 			'class_name' => 'label-warning'
// 		));

	
// 		Status::create(array(
// 			'status_name' 	=> 'Overdue',
// 			'class_name' => 'label-danger'
// 		));

// 		Status::create(array(
// 			'status_name' 	=> 'Aborted',
// 			'class_name' => 'label-inverse'
// 		));
// 	}

// }

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		DB::table('users')->truncate();

		User::create(array(
			'username' 	=> 'admin',
			'firstname' => 'Admin',
			'lastname'	=> 'Admin',
			'email'		=> 'admin@eaa-s.jp',
			'password'	=> Hash::make('admin123'),
			'phone'		=> '1234567',
			'status' => 1,
			'level_id'  => 1
		));

		User::create(array(
			'username' 	=> 'richard_keep',
			'firstname' => 'richard',
			'lastname'	=> 'keep',
			'email'		=> 'r.kipsang@gmail.com',
			'password'	=> Hash::make('admin123'),
			'phone'		=> '+254721341661',
			'status' => 1,
			'level_id'  => 3
		));


		// DB::table('settings')->truncate();

		// Settings::create(array(
		// 	'company' 	=> 'Blue Webs Africa',
		// 	'slogan' 	=> 'Developing elegant websites',
		// 	'address'	=> nl2br("Luther Plaza\n Nairobi"),
		// 	'email'		=> 'info@bluewebsafrica.co.ke',
		// 	'logo'		=> 'logo.png'
		// ));
	}

}

class LocationTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('locations')->truncate();

		$query = "
INSERT INTO `locations` (`id`, `location_name`, `location_charge`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Japan - Fukuoka (Moji)', '1000.00', NULL, '2015-04-03 17:56:37', '2015-04-03 17:56:37'),
(2, 'Japan - Fukuoka (Kanda)', '1000.00', NULL, '2015-04-03 17:56:59', '2015-04-03 17:56:59'),
(3, 'Japan - Kobe', '1000.00', NULL, '2015-04-03 17:57:20', '2015-04-03 17:57:20'),
(4, 'Japan - Osaka', '1000.00', NULL, '2015-04-03 17:57:45', '2015-04-03 17:57:45'),
(5, 'Japan - Nagoya', '1000.00', NULL, '2015-04-03 17:58:07', '2015-04-03 17:58:07'),
(6, 'Japan - Kisarazu', '1000.00', NULL, '2015-04-03 17:59:02', '2015-04-03 17:59:02'),
(7, 'Japan - Yokohama', '1000.00', NULL, '2015-04-03 17:59:34', '2015-04-03 17:59:34'),
(8, 'Uganda', '13950.00', NULL, '2015-04-03 17:54:00', '2015-04-03 17:54:00'),
(9, 'Tanzania', '17740.00', NULL, '2015-04-03 17:55:05', '2015-04-03 17:55:05'),
(10, 'Zambia', '16825.00', NULL, '2015-04-03 17:55:26', '2015-04-03 17:55:26'),
(11, 'Dubai', '1000.00', NULL, '2015-04-03 17:55:49', '2015-04-03 17:55:49'),
(12, 'Kenya', '1000.00', NULL, '2015-04-03 17:59:48', '2015-04-03 17:59:48');";
		DB::connection()->getpdo()->exec($query);
	}
}


// class TaskTableSeeder extends Seeder {

// 	/**
// 	 * Run the database seeds.
// 	 *
// 	 * @return void
// 	 */
// 	public function run()
// 	{
// 		DB::table('tasks')->truncate();

// 		for($i=1; $i<=20; $i++) {

// 			$faker = Faker\Factory::create();

// 			Task::create(array(
// 					'title' => $faker->sentence(rand(3,6)),
// 					'description' => $faker->paragraph(rand(20, 30)),
// 					'start_at' => $faker->dateTimeThisYear('now'),
// 					'status_id' => rand(1,4),
// 					'priority_id' => rand(1,3)
// 				));
// 		}
// 	}


// }

// class ProjectTableSeeder extends Seeder {

// 	/**
// 	 * Run the database seeds.
// 	 *
// 	 * @return void
// 	 */
// 	public function run()
// 	{
// 		DB::table('projects')->truncate();

// 		for($i=1; $i<=20; $i++) {

// 			$faker = Faker\Factory::create();

// 			Project::create(array(
// 					'title' => $faker->sentence(rand(3,6)),
// 					'description' => $faker->paragraph(rand(20, 30)),
// 					'client_id' => rand(1,4),
// 					'user_id' =>rand(1,3),
// 					'start_at' => $faker->dateTimeThisYear('now'),
// 					'end_at' => $faker->dateTimeThisYear('now'),
// 					'priority_id' => rand(1,3)
// 			));
// 		}
// 	}


// }

class LevelTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('levels')->truncate();

		Level::create(array(
			'level_name' => 'Administrator'
		));
		Level::create(array(
			'level_name' => 'Inspector'
		));
		Level::create(array(
			'level_name' => 'Customer'
		));
		Level::create(array(
			'level_name' => 'Revenue Authority User'
		));
		Level::create(array(
			'level_name' => 'General User'
		));
		
	}

}

// Location Table Seeder

class VehicleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	
	public function run()
	{
		DB::table('certificates')->truncate();
		DB::table('inspectordetails')->truncate();
		DB::table('vehicles_inspection')->truncate();
		DB::table('vehicles')->truncate();

		/*Vehicle::create(array(
			'user_id' => 1,
			'chasis' => '12345',
			'enginecc' => '123456',
			'yor' => '2003',
			'make' => 'Nissan',
			'model' => 'Sunny',
			'location_id' => 1,
			'destination' => 'Nairobi',
			'vec' => 'VEC001',
			'charge' => 10000,
			'inspection_date' => '2015-04-20 00:00:00'
		));

		VehicleInspection::create(array(
			'vehicle_id' => 1
		));
		
		InspectorDetails::create(array(
			'vehicle_id' => 1
		));*/
	}

}

			