<?php

use Illuminate\Database\Seeder;

class RecipientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Recipient::create([
            'district_id' => 2,
            'firstname' => 'James Carlo',
            'middlename' => 'Sebial',
            'lastname' => 'Luchavez',
            'phone' => '09381974206',
        ]);

        App\Recipient::create([
            'district_id' => 1,
            'firstname' => 'Denys',
            'middlename' => 'Don',
            'lastname' => 'Dela Cruz',
            'phone' => '09297601115',
        ]);
    }
}
