<?php

use Illuminate\Database\Seeder;
use App\Lottery;

class LotteriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lottery::create([
            'name' => 'bogotá',
            'slug' => str_slug('bogotá'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
        Lottery::create([
            'name' => 'boyacá',
            'slug' => str_slug('boyacá'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
        Lottery::create([
            'name' => 'caribeña',
            'slug' => str_slug('caribeña'),
            'description' => 'lorem ipsum',
            'type' => 'raffle'
        ]);
        Lottery::create([
            'name' => 'cauca',
            'slug' => str_slug('cauca'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
        Lottery::create([
            'name' => 'chontico',
            'slug' => str_slug('chontico'),
            'description' => 'lorem ipsum',
            'type' => 'raffle'
        ]);
        Lottery::create([
            'name' => 'cruz roja',
            'slug' => str_slug('cruz roja'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
        Lottery::create([
            'name' => 'cundinamarca',
            'slug' => str_slug('cundinamarca'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
        Lottery::create([
            'name' => 'huila',
            'slug' => str_slug('huila'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
        Lottery::create([
            'name' => 'la bolita',
            'slug' => str_slug('la bolita'),
            'description' => 'lorem ipsum',
            'type' => 'raffle'
        ]);
        Lottery::create([
            'name' => 'la fantástica',
            'slug' => str_slug('la fantástica'),
            'description' => 'lorem ipsum',
            'type' => 'raffle'
        ]);
        Lottery::create([
            'name' => 'manizales',
            'slug' => str_slug('manizales'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
        Lottery::create([
            'name' => 'medellín',
            'slug' => str_slug('medellín'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
        Lottery::create([
            'name' => 'meta',
            'slug' => str_slug('meta'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
        Lottery::create([
            'name' => 'paisita',
            'slug' => str_slug('paisita'),
            'description' => 'lorem ipsum',
            'type' => 'raffle'
        ]);
        Lottery::create([
            'name' => 'quindío',
            'slug' => str_slug('quindío'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
        Lottery::create([
            'name' => 'risaralda',
            'slug' => str_slug('risaralda'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
        Lottery::create([
            'name' => 'santander',
            'slug' => str_slug('santander'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
        Lottery::create([
            'name' => 'sinuano',
            'slug' => str_slug('sinuano'),
            'description' => 'lorem ipsum',
            'type' => 'raffle'
        ]);
        Lottery::create([
            'name' => 'tolima',
            'slug' => str_slug('tolima'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
        Lottery::create([
            'name' => 'valle',
            'slug' => str_slug('valle'),
            'description' => 'lorem ipsum',
            'type' => 'lottery'
        ]);
    }
}
