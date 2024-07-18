<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of Indian area names
        $indianAreas = [
            'Delhi',
            'Mumbai',
            'Bangalore',
            'Chennai',
            'Kolkata',
            'Hyderabad',
            'Pune',
            'Ahmedabad',
            'Jaipur',
            'Lucknow',
        ];

        // Seed the database with Indian area names
        foreach ($indianAreas as $area) {
            DB::table('areas')->insert([
                'uuid' => \Illuminate\Support\Str::uuid(),
                'area_name' => $area,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
