<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoomBookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_bookings')->insert([
            'arrival_date' => "2018-04-18",
            'departure_date' => "2018-04-19",
            'room_cost' => "25000",
            'status' => 'checked_in',
            'payment' => false,
            'room_id' => 1,
            'user_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('room_bookings')->insert([
            'arrival_date' => "2018-04-25",
            'departure_date' => "2018-04-28",
            'room_cost' => "75000",
            'status' => 'pending',
            'payment' => false,
            'room_id' => 1,
            'user_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('room_bookings')->insert([
            'arrival_date' => "2018-04-24",
            'departure_date' => "2018-04-26",
            'room_cost' => "50000",
            'status' => 'pending',
            'payment' => false,
            'room_id' => 15,
            'user_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('room_bookings')->insert([
            'arrival_date' => "2018-04-20",
            'departure_date' => "2018-04-21",
            'room_cost' => "14000",
            'status' => 'pending',
            'payment' => false,
            'room_id' => 2,
            'user_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('room_bookings')->insert([
            'arrival_date' => "2018-04-01",
            'departure_date' => "2018-04-04",
            'room_cost' => "18000",
            'status' => 'checked_out',
            'payment' => true,
            'room_id' => 10,
            'user_id' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('room_bookings')->insert([
            'arrival_date' => "2018-04-05",
            'departure_date' => "2018-04-10",
            'room_cost' => "15000",
            'status' => 'cancelled',
            'payment' => false,
            'room_id' => 11,
            'user_id' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
