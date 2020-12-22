<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class UserProductView extends Component
{
    public $product;

    public function render()
    {
        return view('products.user-product-view')->with('product', $this->product);
    }

    public function mount($id)
    {
        $this->product = Product::find($id);
    }
}
