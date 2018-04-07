<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'name' => "1.jpg",
            'caption' => "Bright Room",
            'is_primary' => true,
            'status' => true,
            'room_type_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "2.jpg",
            'caption' => "Out View",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "3.jpg",
            'caption' => "Swimming in the Dusk",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "4.jpg",
            'caption' => "A fine Winter",
            'is_primary' => true,
            'status' => true,
            'room_type_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "5.jpg",
            'caption' => "Minimal",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "6.jpg",
            'caption' => "Abstract",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "7.jpg",
            'caption' => "New Concept",
            'is_primary' => true,
            'status' => true,
            'room_type_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "8.jpg",
            'caption' => "New Concept",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "9.jpg",
            'caption' => "Best Concept",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "10.jpg",
            'caption' => "New thing",
            'is_primary' => true,
            'status' => true,
            'room_type_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "11.jpg",
            'caption' => "Room with cool aspects",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "12.jpg",
            'caption' => "Amazing Room",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "13.jpg",
            'caption' => "Room with ac",
            'is_primary' => true,
            'status' => true,
            'room_type_id' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "14.jpg",
            'caption' => "Cozy Room",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "15.jpg",
            'caption' => "Artful room",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "16.jpg",
            'caption' => "Sculpture Room",
            'is_primary' => true,
            'status' => true,
            'room_type_id' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "17.jpg",
            'caption' => "Bath Room",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "18.jpg",
            'caption' => "Cooler Room",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "19.jpg",
            'caption' => "Whats new",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "20.jpg",
            'caption' => "Summer Breeze",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "21.jpg",
            'caption' => "Autumn Breeze",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "22.jpg",
            'caption' => "New Breeze",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "23.jpg",
            'caption' => "Full Breeze",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => "24.jpg",
            'caption' => "Coz Breeze",
            'is_primary' => false,
            'status' => true,
            'room_type_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
