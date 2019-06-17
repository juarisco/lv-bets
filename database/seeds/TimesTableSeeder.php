<?php

use Illuminate\Database\Seeder;
use App\Time;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Time::create([
            'number_time' => 1,
            'alias' => 'día',
            'description' => 'lorem ipsum',
        ]);

        Time::create([
            'number_time' => 2,
            'alias' => 'noche',
            'description' => 'lorem ipsum',
        ]);

        Time::create([
            'number_time' => 3,
            'alias' => 'tres',
            'description' => 'lorem ipsum',
        ]);
    }
}
