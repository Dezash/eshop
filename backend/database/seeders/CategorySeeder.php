<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Computers']);
        Category::create(['name' => 'Mobile Phones']);
        Category::create(['name' => 'TVs']);
    }
}
