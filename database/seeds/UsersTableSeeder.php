<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "Geeta",
            'last_name' => "sharma",
            'gender' => "female",
            'phone' => "9866893439",
            'address' => "Kathmandu",
            'email' => "gita3459@gmail.com",
            'password' => bcrypt('password'),
            'avatar' => 'girl-1.png',
            'about' => "hello from the other world",
            'role' => 'admin',
            'status' => TRUE,
            'remember_token' => str_random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        factory(App\Model\User::class, 10)->create();
    }
}
