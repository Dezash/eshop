<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all()->first();
        $product1 = new Product();
        $product2 = new Product();
        $product3 = new Product();
        $product4 = new Product();
        $product5 = new Product();
        $product6 = new Product();

        $categoryPC = Category::where('name', 'Kompiuteriai')->first();
        $categoryMOB = Category::where('name', 'Telefonai')->first();
        $categoryTV = Category::where('name', 'Televizoriai')->first();

        $product1->name = 'Personal Computer 1';
        $product1->description = 'pc number1';
        $product1->price = 500.50;
        $product1->stock = 100;
        $product1->sold = 0;
        $product1->quality_type = 0;
        $product1->warranty_duration = 12;
        $product1->discount = 0;

        $product2->name = 'Personal Computer 2';
        $product2->description = 'pc number2';
        $product2->price = 500.50;
        $product2->stock = 100;
        $product2->sold = 0;
        $product2->quality_type = 0;
        $product2->warranty_duration = 12;
        $product2->discount = 0;

        $product3->name = 'Mobile 1';
        $product3->description = 'Mobile1';
        $product3->price = 500.50;
        $product3->stock = 100;
        $product3->sold = 0;
        $product3->quality_type = 0;
        $product3->warranty_duration = 12;
        $product3->discount = 0;

        $product4->name = 'Mobile 2';
        $product4->description = 'Mobile2';
        $product4->price = 500.50;
        $product4->stock = 100;
        $product4->sold = 0;
        $product4->quality_type = 0;
        $product4->warranty_duration = 12;
        $product4->discount = 0;

        $product5->name = 'TV 1';
        $product5->description = 'TV number1';
        $product5->price = 500.50;
        $product5->stock = 100;
        $product5->sold = 0;
        $product5->quality_type = 0;
        $product5->warranty_duration = 12;
        $product5->discount = 0;

        $product6->name = 'TV 2';
        $product6->description = 'TV number1';
        $product6->price = 500.50;
        $product6->stock = 100;
        $product6->sold = 0;
        $product6->quality_type = 0;
        $product6->warranty_duration = 12;
        $product6->discount = 0;

        $product1->user()->associate($user);
        $product2->user()->associate($user);
        $product3->user()->associate($user);
        $product4->user()->associate($user);
        $product5->user()->associate($user);
        $product6->user()->associate($user);

        //$product1->image()->save($image1);
        $categoryPC->product()->save($product1);
        //$product2->image()->save($image1);
        $categoryPC->product()->save($product2);

        //$product3->image()->save($image2);
        $categoryMOB->product()->save($product3);

        //$product4->image()->save($image2);
        $categoryMOB->product()->save($product4);

        //$product5->image()->save($image3);
        $categoryTV->product()->save($product5);

        $categoryTV->product()->save($product6);
    }
}
