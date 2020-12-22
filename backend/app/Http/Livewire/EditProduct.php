<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $image;
    public $oldImage;

    public $product;

    public $name;
    public $category;
    public $price;
    public $description;
    public $stock;
    public $sold;
    public $quality_type;
    public $warranty_duration = null;

    public $allCategories;

    public function render()
    {
        return view('products.edit-product')->with('categories', $this->allCategories)->with('product', $this->product);
    }
    public function save()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
            'description' => 'required',
            'stock' => 'required|gt:0|Integer',
            'warranty_duration' => 'nullable|Integer|gt:0',
            'category' => 'required'
        ]);

        // assign new values
        $this->product->name = $this->name;
        $this->product->description = $this->description;
        $this->product->price = $this->price;
        $this->product->stock = $this->stock;
        $this->product->sold = $this->sold;
        $this->product->quality_type = $this->quality_type;
        $this->product->warranty_duration = $this->warranty_duration;

        if ($this->image != null)
        {
            if ($this->oldImage != null) {
                Storage::disk('public')->delete("images/" . $this->oldImage->path);
                $this->oldImage->delete();
            }
            $name = md5($this->image . microtime()).'.'.$this->image->extension();

            $this->image->storeAs('images', $name);

            $image = new Image();
            $image->path = $name;
            $this->product->save();
            $image->product()->associate($this->product);
            $image->save();
        }
        else
            $this->product->save();

        $this->redirect(route('user_product_list'));
    }

    public function mount($id)
    {
        $this->allCategories = Category::all();
        $this->product = Product::where('id', $id)->first();

        $this->category = $this->product->category()->first()->id;
        $this->quality_type = $this->product->quality_type;
        $this->oldImage= $this->product->images()->first();
        // get current product values for rendering
        $this->name = $this->product->name;
        $this->category = $this->product->category;
        $this->price = $this->product->price;
        $this->description = $this->product->description;
        $this->stock = $this->product->stock;
        $this->sold = $this->product->sold;
        $this->quality_type = $this->product->quality_type;
        $this->warranty_duration = $this->product->warranty_duration;
    }
}
