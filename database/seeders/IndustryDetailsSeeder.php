<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IndustryDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            $areaId = DB::table('areas')->inRandomOrder()->first()->id;
            $categoryId = DB::table('industries_categories')->inRandomOrder()->first()->id;

            DB::table('industry_details')->insert([
                'uuid'               => $faker->uuid,
                'advertisment_image' => $faker->imageUrl(),
                'area_id'            => $areaId,
                'category_id'        => $categoryId,
                'industry_name'      => $faker->company,
                'contact_no'         => $faker->phoneNumber,
                'address'            => $faker->address,
                'created_at'         => now(),
                'updated_at'         => now(),
                'email'              => $faker->email,
                'product'            => $faker->word,
                'by_product'         => $faker->word,
                'raw_material'       => $faker->word,
                'industry_type'      => $faker->word,
                'web_link'           => $faker->url,
                'office_address'     => $faker->address,
            ]);
        }
    }
}
