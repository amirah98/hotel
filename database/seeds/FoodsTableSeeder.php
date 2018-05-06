<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'name' => "Sizzling Gambas",
            'type' => 'Appetizer',
            'image' => "sizzling_gambas.jpeg",
            'price' => 630,
            'description' => "Sizzling gambas is made with a combination of shrimp and vegetables.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('foods')->insert([
            'name' => "Calamares",
            'type' => 'Appetizer',
            'image' => "calamares.jpg",
            'price' => 630,
            'description' => "Calamares is the Filipino version of the Mediterranean breaded fried squid dish, Calamari.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('foods')->insert([
            'name' => "Tinolang Manok",
            'type' => 'Soup',
            'image' => "tinolang_manok.jpg",
            'price' => 530,
            'description' => "Tinola in Tagalog or Visayan, is a soup-based dish served as an main dish in the Philippines.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('foods')->insert([
            'name' => "Chicken Sotanghon Soup",
            'type' => 'Soup',
            'image' => "chicken_sotanghon_soup.jpg",
            'price' => 410,
            'description' => "Chicken Sotanghon Soup is a soup made with bite-sized chicken, cellophane noodles and vegetables.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('foods')->insert([
            'name' => "Mixed Green Salad",
            'type' => 'Salad',
            'image' => "mixed_green_salad.jpg",
            'price' => 370,
            'description' => "Garlic, crushed red pepper flakes season the light vinaigrette that dresses this refreshing salad.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('foods')->insert([
            'name' => "Chef's Salad",
            'type' => 'Salad',
            'image' => "chef_salad.jpg",
            'price' => 400,
            'description' => "Chef salad is an American salad consisting of eggs, meat, chicken, tomatoes, cucumbers and cheese.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('foods')->insert([
            'name' => "Beefsteak Tagalog",
            'type' => 'Main Course',
            'image' => "beefsteak_tagalog.jpg",
            'price' => 650,
            'description' => "Beefsteak Tagalog is a dish of pieces of salted and peppered sirloin.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('foods')->insert([
            'name' => "Cordon Bleu",
            'type' => 'Main Course',
            'image' => "cordon_bleu.jpg",
            'price' => 630,
            'description' => "A cordon bleu is a dish of meat wrapped around cheese, then breaded and pan-fried or deep-fried.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('foods')->insert([
            'name' => "Chicken Pork Adobo",
            'type' => 'Main Course',
            'image' => "chicken_pork_adobo.jpg",
            'price' => 630,
            'description' => "Chicken Pork Adobo is a version of classic Filipino stew combining chicken pieces and pork cubes.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('foods')->insert([
            'name' => "Grilled Squid",
            'type' => 'Main Course',
            'image' => "grilled_squid.jpg",
            'price' => 550,
            'description' => "The simple grilled squid recipe uses a fantastic cumin marinade for a Middle Eastern twist.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('foods')->insert([
            'name' => "Fresh Fruit Platter",
            'type' => 'Dessert',
            'image' => "fresh_fruit_platter.jpg",
            'price' => 300,
            'description' => "It is a base of ripe, colorful, sliced melons and pineapples.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('foods')->insert([
            'name' => "Banana Split",
            'type' => 'Dessert',
            'image' => "banana_split.jpg",
            'price' => 360,
            'description' => "A banana split is an ice cream-based dessert.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('foods')->insert([
            'name' => "Chocolate Vanilla Sundae",
            'type' => 'Dessert',
            'image' => "chocolate_vanilla_sundae.jpeg",
            'price' => 200,
            'description' => "This is a rich sundae made with brownies, vanilla ice cream, chocolate syrup, and whipped cream.",
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


    }
}

