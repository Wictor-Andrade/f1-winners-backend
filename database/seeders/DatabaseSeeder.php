<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'souzs',
            'email' => 'admin@souzs.com',
            'password' => Hash::make('123456'),
        ]);

        $this->call([
            CountrySeeder::class,
            TeamSeeder::class,
            DriverSeeder::class,
        ]);
    }
}
