<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'username' => 'luchmewep',
            'firstname' => 'James Carlo',
            'middlename' => 'Sebial',
            'lastname' => 'Luchavez',
            'password' => Hash::make('luchmewep')
        ]);
    }
}
