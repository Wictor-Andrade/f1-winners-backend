<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('teams')->truncate();

        $teams = [
            ['name' => 'Mercedes', 'country' => 'Germany'],
            ['name' => 'Red Bull Racing', 'country' => 'Austria'],
            ['name' => 'Ferrari', 'country' => 'Italy'],
            ['name' => 'McLaren', 'country' => 'United Kingdom'],
            ['name' => 'Alpine', 'country' => 'France'],
            ['name' => 'Aston Martin', 'country' => 'United Kingdom'],
            ['name' => 'AlphaTauri', 'country' => 'Italy'],
            ['name' => 'Williams', 'country' => 'United Kingdom'],
            ['name' => 'Haas', 'country' => 'United States'],
            ['name' => 'Sauber', 'country' => 'Switzerland'],
        ];

        foreach ($teams as $team) {
            $country = Country::where('name', $team['country'])->first();

            if ($country) {
                Team::updateOrCreate(
                    ['name' => $team['name']],
                    ['country_id' => $country->id]
                );
            }
        }
    }
}
