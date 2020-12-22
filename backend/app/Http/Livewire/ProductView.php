<?php

namespace App\Http\Livewire;

use App\Models\Cart;
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
        Cart::create([
            'quantity' => 1,
            'user_id' => $user,
            'product_id' => $productID,
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Item added.']);
    }
}
