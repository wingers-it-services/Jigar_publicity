<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use Faker to generate fake data
        $faker = \Faker\Factory::create();

        // Create 10 fake user records
        // for ($i = 0; $i < 50; $i++) {
        //     DB::table('users')->insert([
        //         'uuid'            => (string) Str::uuid(),
        //         'image'           => $faker->imageUrl(),
        //         'email'           => $faker->unique()->safeEmail(),
        //         'password'        => '123', // Use a default password or a hashed version of your choice
        //         'name'            => $faker->name(),
        //         'gender'          => $faker->randomElement(['Male', 'Female']),
        //         'phone'           => $faker->phoneNumber(),
        //         'website'         => $faker->url(),
        //         'company_name'    => $faker->company(),
        //         'company_address' => $faker->address(),
        //         'no_of_device'    => $faker->numberBetween(1, 10),
        //         'account_status'  => $faker->numberBetween(0, 1),
        //         'is_admin'        => $faker->boolean(),
        //         'created_at'      => now(),
        //         'updated_at'      => now(),
        //         'active_device'   => $faker->numberBetween(0, 5),
        //         'deleted_at'      => $faker->optional()->dateTime(),
        //         'payment_status'  => $faker->numberBetween(0, 1),
        //     ]);
        // }
    }
}
