<?php

use Illuminate\Database\Seeder;
use App\Models\Location\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create(['name'  => 'Kenya',
                         'sortname' =>'KE']);
        Country::create(['name'  => 'Tanzania',
                        'sortname' =>'TZ']);
    }
}
