<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class IndustriesCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $indianCategories = [
            'Information Technology',
            'Automobile',
            'Textiles',
            'Pharmaceuticals',
            'Telecommunications',
            'Construction',
            'Electronics',
            'Food Processing',
            'Banking',
            'Healthcare',
            'Education',
            'Retail',
            'Tourism',
            'Media and Entertainment',
            'Agriculture',
            'Energy',
            'Real Estate',
            'Financial Services',
            'Logistics',
            'Consulting',
            'Insurance',
            'Steel',
            'Chemicals',
            'Metal',
            'Cement',
        ];

        foreach ($indianCategories as $category) {
            DB::table('industries_categories')->insert([
                'uuid' => \Illuminate\Support\Str::uuid(),
                'category_name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
