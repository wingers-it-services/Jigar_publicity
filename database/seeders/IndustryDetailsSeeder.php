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

        // Predefined array of industrial chemicals
        $industrialChemicals = [
            'Sulfuric Acid', 'Nitric Acid', 'Hydrochloric Acid', 'Sodium Hydroxide', 'Ammonia',
            'Benzene', 'Methanol', 'Acetone', 'Ethylene', 'Propylene',
            'Chlorine', 'Formaldehyde', 'Acetic Acid', 'Sodium Carbonate', 'Sodium Hypochlorite',
            'Hydrogen Peroxide', 'Phosphoric Acid', 'Ammonium Nitrate', 'Calcium Carbonate', 'Sodium Chloride'
        ];

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
                'product'            => $industrialChemicals[array_rand($industrialChemicals)],
                'by_product'         => $faker->word,
                'raw_material'       => $faker->word,
                'industry_type'      => $faker->word,
                'web_link'           => $faker->url,
                'office_address'     => $faker->address,
            ]);
        }
    }
}
