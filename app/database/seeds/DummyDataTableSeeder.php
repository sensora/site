<?php
use Faker\Factory as Faker;

class DummyDataTableSeeder extends Seeder {

	public function run()
	{
        DB::disableQueryLog();

		$faker = Faker::create('es_ES');

        $password = Hash::make('secret');

		foreach(range(0, 100) as $index)
		{
			$user = User::create([
                'name'      =>  $faker->name,
                'email'     =>  $faker->safeEmail,
                'password'  =>  $password,
			]);

            foreach (range(1, 20) as $i) {
                $sensor = Sensor::create([
                    'user_id'   =>  $user->id,
                    'label'     =>  mt_rand(0, 1) == 1 ? $faker->word : $user->email . '-' . str_random(10),
                    'uuid'      =>  $faker->uuid,
                    'status'    =>  mt_rand(0, 10) > 5 ? true : false,
                    'elevation' =>  mt_rand(0, 1) == 1 ? '' : $faker->numberBetween(500, 2500),
                    'latitude'  =>  $faker->randomFloat(6, 15.274827, 48.683862),
                    'longitude' =>  $faker->randomFloat(6, -73.163520, -125.340226),
                ]);

                if ( $sensor->status ) {
                    foreach (range(0, 1000) as $data) {
                        list($mintemp, $maxtemp) = array(mt_rand(0, 10), mt_rand(30, 50));

                        $data = Data::create([
                            'sensor_id'     =>  $sensor->id,
                            'temperature'   =>  $faker->numberBetween($mintemp, $maxtemp),
                            'moisture'      =>  $faker->randomFloat(2, mt_rand(0, 100)),
                            'pressure'      =>  $faker->randomFloat(2, 100000, 999999),
                            'noise'         =>  null,
                            'light'         =>  $faker->numberBetween(0, 1000),
                        ]);
                    }
                }
            }
		}
	}

}