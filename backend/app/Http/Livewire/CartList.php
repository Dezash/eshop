<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class CartList extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.cart-list', [
            'cart' =>  Cart::where('user_id', '=', Auth::user()->id)->paginate(10),
            'products' => Product::all(),
            'orderCount' => Order::count() + 1
        ]);
    }

    public function delete(Cart $cartToDelete)
    {
        $cartToDelete->delete();
    }
    public function createOrder()
    {
        $uID = auth()->user()->id;
        Order::create([
            'user_id' => $uID
        ]);
        $last = DB::getPdo()->lastInsertId();
        return redirect('/orders/' . $last);
    }
    public function increaseQnt(Cart $cartItem)
    {
        Cart::where('id', $cartItem->id)->update([
            'quantity' => $cartItem->quantity + 1
        ]);
    }
    public function lowerQnt(Cart $cartItem)
    {
        Cart::where('id', $cartItem->id)->update([
            'quantity' => ($cartItem->quantity <= 1 ? 1 : $cartItem->quantity - 1)
        ]);
    }
}
