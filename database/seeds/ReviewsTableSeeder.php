<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'review' => "I have the best experience viewing that room.",
            'rating' => 5,
            'approval_status' => "approved",
            'room_booking_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('reviews')->insert([
            'review' => "I like the environment of the hotel.",
            'rating' => 3,
            'approval_status' => "pending",
            'room_booking_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('reviews')->insert([
            'review' => "My children enjoyed the view and ample play spaces in the hotel.",
            'rating' => 4,
            'approval_status' => "approved",
            'room_booking_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('reviews')->insert([
            'review' => "This is my second time and I like the hotel.",
            'rating' => 4,
            'approval_status' => "approved",
            'room_booking_id' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('reviews')->insert([
            'review' => "I would never come back in this hotel.",
            'rating' => 1,
            'approval_status' => "rejected",
            'room_booking_id' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
