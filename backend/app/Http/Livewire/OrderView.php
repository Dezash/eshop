<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class OrderView extends Component
{
    public $order;


    public $address;
    public $speed = "exp";
    public $method = 0;
    public $card;
    public $currOrdId = 0;
    public function mount()
    {
        $this->currOrdId = request()->segment(count(request()->segments()));
        $this->order =  Order::find($this->currOrdId);
    }

    public function render()
    {

        return view(
            'orders.order-view',
            [
                'completed' => $this->order->status, 
            ]
        );
    }

    public function submit()
    {

        $this->validate([
            'address' => ['required'],
            'card' => ['required', 'regex:/^(\\b\\d{4}\\s\\d{4}\\s\\d{4}\\s\\d{4}\\b) (0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2}) [0-9]{3,4}$/i']
        ]);

        $uID = auth()->user()->id;
        $ad = $this->address;
        $sp = $this->speed;
        $me = $this->method;
        Order::where('id', $this->currOrdId)->update(
            [
                'shipping_address' => $ad,
                'express_shipping' => $sp,
                'shipping_type' => $me,
                'status' => 1
            ]
        );
        $cartItems = Cart::all();
        foreach ($cartItems as $key => $value) {
            $prodID = $value->product_id;
            $qnt = $value->quantity;
            OrderItem::create([
                'order_id' => $this->currOrdId,
                'product_id' => $prodID,
                'quantity' => $qnt
            ]);
        }
        Cart::where('user_id', $uID)->delete();
        $this->redirect(route('order_view', $this->currOrdId));
    }
}
