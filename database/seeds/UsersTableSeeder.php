<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\User::class)->create();
        $user = User::where('email', 'admin@mail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Josef Admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]);
        }

        User::create([
            'name' => 'Emily Myers',
            'email' => 'emily@myers.com',
            'password' => Hash::make('password'),
        ]);
    }
}
