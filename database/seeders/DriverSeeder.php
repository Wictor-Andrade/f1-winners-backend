<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;
use App\Models\Country;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('drivers')->truncate();

        $drivers = [
            [
                'first_name' => 'Lewis',
                'last_name'  => 'Hamilton',
                'country'    => 'United Kingdom',
                'team'       => 'Mercedes',
                'birthdate'  => '1985-01-07',
                'number'     => 44,
            ],
            [
                'first_name' => 'Max',
                'last_name'  => 'Verstappen',
                'country'    => 'Netherlands',
                'team'       => 'Red Bull Racing',
                'birthdate'  => '1997-09-30',
                'number'     => 1,
            ],
            [
                'first_name' => 'Charles',
                'last_name'  => 'Leclerc',
                'country'    => 'Monaco',
                'team'       => 'Ferrari',
                'birthdate'  => '1997-10-16',
                'number'     => 16,
            ],
            [
                'first_name' => 'Lando',
                'last_name'  => 'Norris',
                'country'    => 'United Kingdom',
                'team'       => 'McLaren',
                'birthdate'  => '1999-11-13',
                'number'     => 4,
            ],
            [
                'first_name' => 'Sergio',
                'last_name'  => 'Pérez',
                'country'    => 'Mexico',
                'team'       => 'Red Bull Racing',
                'birthdate'  => '1990-01-26',
                'number'     => 11,
            ],
            [
                'first_name' => 'Fernando',
                'last_name'  => 'Alonso',
                'country'    => 'Spain',
                'team'       => 'Aston Martin',
                'birthdate'  => '1981-07-29',
                'number'     => 14,
            ],
        ];

        foreach ($drivers as $d) {
            $country = Country::where('name', $d['country'])->first();
            $team    = Team::where('name',    $d['team'])   ->first();

            if ($country && $team) {
                Driver::updateOrCreate(
                    ['first_name' => $d['first_name'], 'last_name' => $d['last_name']],
                    [
                        'country_id' => $country->id,
                        'team_id'    => $team->id,
                        'birthdate'  => $d['birthdate'],
                        'number'     => $d['number'],
                    ]
                );
            }
        }
    }
}
