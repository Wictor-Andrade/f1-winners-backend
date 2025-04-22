<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run()
    {
        DB::table('countries')->truncate();

        DB::table('countries')->insert([
            ['name' => 'Brazil'],
            ['name' => 'United Kingdom'],
            ['name' => 'Germany'],
            ['name' => 'Italy'],
            ['name' => 'France'],
            ['name' => 'Spain'],
            ['name' => 'Australia'],
            ['name' => 'Japan'],
            ['name' => 'United States'],
            ['name' => 'Netherlands'],
            ['name' => 'Finland'],
            ['name' => 'Canada'],
            ['name' => 'Mexico'],
            ['name' => 'Austria'],
            ['name' => 'Switzerland'],
        ]);
    }
}
