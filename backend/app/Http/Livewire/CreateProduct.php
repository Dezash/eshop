<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $image;

    public $name;
    public $category;
    public $price;
    public $description;
    public $stock;
    public $sold;
    public $quality_type;
    public $warranty_duration = null;

    public $allCategories;
    public function mount()
    {
        $this->allCategories = Category::all();
        $this->category = Category::all()->first()->id; // livewire bug
        $this->quality_type = 1; // livewire bug
    }

    public function render()
    {
        return view('products.create-product')->with('categories', $this->allCategories);
    }

    public function save()
    {
        $this->validate([
            'image' => 'required|image|max:1024',
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
            'description' => 'required',
            'stock' => 'required|gt:0|Integer',
            'warranty_duration' => 'nullable|Integer|gt:0'
        ]);

        $name = md5($this->image . microtime()).'.'.$this->image->extension();

        $this->image->storeAs('images', $name);
        $product = new Product();
        $product->name = $this->name;
        $product->description = $this->description;
        $product->price = $this->price;
        $product->stock = $this->stock;
        $product->sold = $this->sold;
        $product->quality_type = $this->quality_type;
        $product->warranty_duration = $this->warranty_duration;

        $image = new Image();
        $image->path = $name;
        $category = Category::where('id', $this->category)->first();

        $product->category()->associate($category);
        $product->user()->associate(Auth::user()->id);
        $product->save();
        $image->product()->associate($product);
        $image->save();
        $this->redirect(route('user_product_list'));

    }
}
