<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->insert([
            'name' => "Air Conditioner",
            'icon' => "air_conditioner.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Bathtub",
            'icon' => "bathtub.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Breakfast",
            'icon' => "breakfast.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Computer",
            'icon' => "computer.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "First Aid Kit",
            'icon' => "first_aid_kit.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Hair Dryer",
            'icon' => "hair_dryer.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Mini Bar",
            'icon' => "mini_bar.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Mini Cooler",
            'icon' => "mini_cooler.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Parking",
            'icon' => "parking.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Telephone",
            'icon' => "telephone.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Television",
            'icon' => "television.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('facilities')->insert([
            'name' => "Wifi",
            'icon' => "wifi.png",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
