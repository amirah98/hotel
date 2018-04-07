<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(RoomTypesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(FacilitiesTableSeeder::class);
        $this->call(FacilityRoomTypeTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
    }
}
