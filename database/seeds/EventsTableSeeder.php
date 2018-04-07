<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'name' => "Holi 2018",
            'image' => "1.jpeg",
            'date' => "2018-05-18",
            'venue' => "Hotel Garden Area",
            'price' => 2500,
            'capacity' => 550,
            'description' => "Albatross Concert and Holi Celebration 2018. Enjoy with live music and tank wash after holi.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('events')->insert([
            'name' => "Food Festa",
            'image' => "2.jpg",
            'date' => "2018-04-18",
            'venue' => "Hotel Garden Area",
            'price' => 3500,
            'capacity' => 350,
            'description' => "Cultural Performance with food testing sessions.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('events')->insert([
            'name' => "South Asian Youth Summit",
            'image' => "3.jpg",
            'date' => "2018-04-20",
            'venue' => "Leonat Conference Hall",
            'price' => 0,
            'capacity' => 250,
            'description' => "Discussion of youth involvement in protection of cultural heritage.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('events')->insert([
            'name' => "Regional Minority Society Conference",
            'image' => "4.jpg",
            'date' => "2018-04-15",
            'venue' => "Darfurd Conference Hall",
            'price' => 0,
            'capacity' => 100,
            'description' => "Leaders of minority society discuss the involvement in politics.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('events')->insert([
            'name' => "Bankers Society Annual Summit",
            'image' => "5.jpg",
            'date' => "2018-04-10",
            'venue' => "Kafe Conference Hall",
            'price' => 5400,
            'capacity' => 60,
            'description' => "Talks by industry veterans on Central Bank limits on foreign loans.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
