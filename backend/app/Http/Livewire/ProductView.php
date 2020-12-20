<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProductView extends Component
{
    public $product;

    public function render()
    {
        return view('products.product-view')->with('product', $this->product);
    }

    public function mount($id)
    {
        $this->product = Product::find($id);
    }
    public function addToCart($productID)
    {
        $user = auth()->user()->id;
        DB::insert("INSERT INTO `carts`(`quantity`, `user_id`, `product_id`) VALUES(1, $user, $productID)");
    }
}
