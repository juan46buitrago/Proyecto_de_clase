<?php

namespace Database\Seeders;


use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 =new Product();
        $product1->name ="computador";
        $product1->description ='Esta es la descripcion del computador';
        $product1->price=100400;
        $product1->category_id=1;
        $product1->save();

        $product2 =new Product();
        $product2->name ="televisor";
        $product2->description ='Esta es la descripcion del televisor';
    $product2->price=54545;
        $product2->category_id=2;
    $product2->save();
            
        $product3 =new Product();
        $product3->name ="raton";
        $product3->description ='Esta es la descripcion del raton';
    $product3->price=34445;
        $product3->category_id=1;
    $product3->save();
    
        }
    }

