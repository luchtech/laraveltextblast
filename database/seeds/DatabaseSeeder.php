<?php

use App\Recipient;
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
        $this->call([
            UserSeeder::class,
            DistrictSeeder::class,
            RecipientSeeder::class
        ]);
    }
}
