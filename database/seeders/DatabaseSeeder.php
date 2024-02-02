<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Upiland',
            'username' => 'upiland99',
            'email' => 'upiland@gmail',
            'role' => 'applyer',
            'gender' => 'male',
            'password' => bcrypt(12345678),
        ]);

        User::create([
            'name' => 'adelund',
            'username' => 'adelund99',
            'email' => 'adel@gmail',
            'role' => 'applyer',
            'gender' => 'female',
            'password' => bcrypt(12345678),
        ]);
    }
}
