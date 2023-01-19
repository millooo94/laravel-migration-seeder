<?php
use Faker\Generator as Faker;
use App\Train;
use Illuminate\Database\Seeder;

class TrainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 250; $i++) {

            $train = new Train();

            $train->departure_station = $faker->randomElement(['Roma', 'Milano', 'Modena', 'Bologna', 'Napoli', 'Milano', 'Brescia', 'Catania', 'Acireale', 'Palermo', 'Messina', 'Firenze', 'Pisa']);

            $train->arrival_station = $faker->randomElement(['Roma', 'Milano', 'Modena', 'Bologna', 'Napoli', 'Milano', 'Brescia', 'Catania', 'Acireale', 'Palermo', 'Messina', 'Firenze', 'Pisa']);

            if($train->departure_station === 'Acireale' || $train->departure_station === 'Catania' || $train->departure_station === 'Messina' || $train->departure_station === 'Palermo' || $train->departure_station === 'Napoli' || $train->arrival_station === 'Catania' || $train->arrival_station === 'Messina' || $train->arrival_station === 'Palermo' || $train->arrival_station === 'Acireale' || $train->arrival_station === 'Napoli') {
                $train->company = $faker->randomElement(['Regionale', 'Regionale Veloce']);
            } else {
                $train->company = $faker->randomElement(['Frecciarossa', 'Frecciarossa 1000', 'Trenord', 'TTPER']);
            };

            $train->departure_time = $faker->time();

            do {
                $train->arrival_time =  $faker->time();
            } while(strtotime($train->arrival_time) < strtotime($train->departure_time));

            $train->train_code = [rand(1000,9999), rand(10000, 99999)][rand(0, 1)];

            if($train->company === 'Regionale' || $train->company === 'Regionale Veloce' || $train->company === 'Trenord' || $train->company === 'TTPER') {
                $train->carriage_number = 8;
            } else {
                $train->carriage_number = 11;
            };

            $train->in_time = $faker->randomElement([1, 1, 1, 1, 0]);

            $train->cancelled = $faker->randomElement([1, 0, 0, 0, 0 , 0, 0, 0, 0, 0]);

            $train->save();
        }
    }
}
