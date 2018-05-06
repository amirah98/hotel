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
            'status' => 'checked_out',
            'payment' => true,
            'room_id' => 1,
            'user_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('room_bookings')->insert([
            'arrival_date' => "2018-04-20",
            'departure_date' => "2018-04-25",
            'room_cost' => "125000",
            'status' => 'checked_out',
            'payment' => true,
            'room_id' => 2,
            'user_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('room_bookings')->insert([
            'arrival_date' => "2018-04-20",
            'departure_date' => "2018-04-25",
            'room_cost' => "125000",
            'status' => 'checked_out',
            'payment' => true,
            'room_id' => 2,
            'user_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('room_bookings')->insert([
            'arrival_date' => "2018-05-15",
            'departure_date' => "2018-05-20",
            'room_cost' => "25000",
            'status' => 'pending',
            'payment' => false,
            'room_id' => 2,
            'user_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('room_bookings')->insert([
            'arrival_date' => "2018-05-10",
            'departure_date' => "2018-04-20",
            'room_cost' => "50000",
            'status' => 'checked_in',
            'payment' => false,
            'room_id' => 3,
            'user_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('room_bookings')->insert([
            'arrival_date' => "2018-05-10",
            'departure_date' => "2018-05-10",
            'room_cost' => "20000",
            'status' => 'cancelled',
            'payment' => false,
            'room_id' => 4,
            'user_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
