<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventBookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_bookings')->insert([
            'number_of_tickets' => 10,
            'total_cost' => 0,
            'status' => true,
            'payment' => true,
            'user_id' => 2,
            'event_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('event_bookings')->insert([
            'number_of_tickets' => 2,
            'total_cost' => 5000,
            'status' => true,
            'payment' => false,
            'user_id' => 2,
            'event_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('event_bookings')->insert([
            'number_of_tickets' => 4,
            'total_cost' => 10000,
            'status' => false,
            'payment' => false,
            'user_id' => 3,
            'event_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('event_bookings')->insert([
            'number_of_tickets' => 3,
            'total_cost' => 10500,
            'status' => true,
            'payment' => false,
            'user_id' => 4,
            'event_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('event_bookings')->insert([
            'number_of_tickets' => 1,
            'total_cost' => 5400,
            'status' => true,
            'payment' => true,
            'user_id' => 4,
            'event_id' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('event_bookings')->insert([
            'number_of_tickets' => 6,
            'total_cost' => 15000,
            'status' => true,
            'payment' => false,
            'user_id' => 5,
            'event_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
