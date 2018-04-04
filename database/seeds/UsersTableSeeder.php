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
            'first_name' => "Jenisha",
            'last_name' => "Doe",
            'gender' => "female",
            'phone' => "984562846",
            'address' => "Kathmandu",
            'email' => "admin@admin.com",
            'password' => bcrypt('password'),
            'avatar' => 'girl.png',
            'about' => "hello from the other world",
            'role' => 'admin',
            'status' => TRUE,
            'remember_token' => str_random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        factory(App\Model\User::class, 10)->create();
    }
}
