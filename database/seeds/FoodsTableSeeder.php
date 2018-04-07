<?php

use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
        'name' => "1.jpg",
        'image' => "1.jpg",
        'price' => 20,
        'status' => true,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);
    }
}
