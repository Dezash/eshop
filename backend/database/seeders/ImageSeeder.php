<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::truncate();

        $product1 = Product::where('category_id', 1)->first();
        $product2 = Product::where('category_id', 2)->first();
        $product3 = Product::where('category_id', 3)->first();

        $image1 = new Image();
        $image1->path = 'https://i.picsum.photos/id/39/500/500.jpg?hmac=Xt6ZHIny_P8-99TbGD6qeZd5SgNz7TL8Slijip9uur0';
        $image2 = new Image();
        $image2->path = 'https://i.picsum.photos/id/952/500/500.jpg?hmac=YUsHdSyfohbYvchavjSJ3kmSjPObNWR8jSnxNogEWz0';
        $image3 = new Image();
        $image3->path = 'https://i.picsum.photos/id/577/500/500.jpg?hmac=TncQnnxcTYw8TDj9To8xHXc87_OJiD6SkQWwCKC81iI';
        $image4 = new Image();
        $image4->path = 'https://i.picsum.photos/id/580/500/500.jpg?hmac=DfJRLQ0gFwjpHrhORAEvUECyegfo-gforcVpPxXAxUU';

        $product1->images()->save($image1);
        $product2->images()->save($image2);
        $product3->images()->save($image3);
    }
}
