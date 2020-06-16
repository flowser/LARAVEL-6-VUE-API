<?php

use Illuminate\Database\Seeder;
use App\Models\Users\Attribute\Gender;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create(['name'        => 'male']);
        Gender::create(['name'        => 'female']);
    }
}
