<?php

namespace Database\Seeders;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Database\Factories\UserFactory;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*$this->call([
            CategorySeeder::class,
            ProductSeeder::class
            ]);*/
    //Category::factory(10000)->create();
    Product::factory(50000)->create();
    //User::factory(1000)->Create();
    //CartItem::factory(20000)->create();     

       }

}

