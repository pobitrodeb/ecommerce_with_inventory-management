<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;
class CustomerDashboarController extends Controller
{
    private $orders;
    public function index()
    {
        $this->orders = Order::where('customer_id', Session::get('customer_id'))->orderBy('id', 'desc')->get();
        return view('website.customer.index', [
            'orders' => $this->orders,
        ]);
    }
}
