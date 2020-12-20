<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class OrderView extends Component
{
    public $order;


    public $address;
    public $speed = "exp";
    public $method = 0;

    public function render()
    {
        $currID = request()->segment(count(request()->segments()));
        return view(
            'orders.order-view',
            [
                'completed' => DB::table('orders')
                    ->where([
                        ['id', '=', $currID],
                        ['status', '!=', 'null'],
                    ])->count(),
            ]
        );
    }

    public function submit()
    {
        $uID = auth()->user()->id;
        $currOrd = Order::where('user_id', '=', $uID)
            ->orderByDesc('id')
            ->take(1)
            ->get()[0]->id;
        $ad = $this->address;
        $sp = $this->speed;
        $me = $this->method;
        $currID = request()->segment(count(request()->segments()));
        
        DB::update("UPDATE `orders` SET `shipping_address`='$ad', `express_shipping`='$sp', `shipping_type`='$me', `status`='1' WHERE `id`=$currOrd");
        DB::delete("DELETE FROM `carts` WHERE `user_id`=$uID");
    }
}
