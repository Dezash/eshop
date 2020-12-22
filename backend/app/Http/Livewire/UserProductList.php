<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class UserProductList extends Component
{
    public $searchTerm;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('products.user-product-list')->with('products', Product::where('user_id', Auth::user()->id)->where('name', 'like', $searchTerm)->get());
    }

    public function delete(Product $product)
    {
        if ($product->images()->first() != null)
            Storage::disk('public')->delete("images/" . $product->images()->first()->path);

        $this->emit('alert', ['type' => 'success', 'message' => 'Product deleted.']);
        $product->delete();
    }
}
