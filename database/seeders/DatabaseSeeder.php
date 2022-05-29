<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();


        foreach (range(1,9) as $num) {
            Product::create([
                'name' => 'labtop '.$num,
                'slug' => 'labtop-'.$num,
                'details' => "labtop $num details",
                'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam fugiat asperiores ipsa, quis ducimus consequuntur odit voluptas quisquam architecto vero, obcaecati et possimus hic voluptate explicabo quam perspiciatis dolore laboriosam.',
                'image'=>'/images/laptop/labtop-'.$num.'.jpg',
                'images'=>json_encode(['images1.jpeg','images2.jpeg','images3.jpg','images4.jpg']),
                'price' => rand(1000,100000),
            ]);
        }

    }
}
