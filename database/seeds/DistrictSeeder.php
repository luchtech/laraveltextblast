<?php

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\District::create(['name' => 'Poblacion']);
        App\District::create(['name' => 'Talomo']);
        App\District::create(['name' => 'Agdao']);
        App\District::create(['name' => 'Buhangin']);
        App\District::create(['name' => 'Bunawan']);
        App\District::create(['name' => 'Paquibato']);
        App\District::create(['name' => 'Baguio']);
        App\District::create(['name' => 'Calinan']);
        App\District::create(['name' => 'Marilog']);
        App\District::create(['name' => 'Toril']);
        App\District::create(['name' => 'Tugbok']);
    }
}
