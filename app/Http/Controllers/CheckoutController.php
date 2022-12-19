<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use Session;
use Cart;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail, $cartProducts;
    public function index()
    {
       if(Session::get('customer_id'))
       {
           $this->customer = Customer::find(Session::get('customer_id'));
       }
       else
        {
          $this->customer = '';
        }
        return view('website.checkout.index',[
            'customer' => $this->customer,
        ]);
    }

    public function newOrder(Request $request)
    {

        if(Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:customers',
                'mobile' => 'required',
                'delivery_address' => 'required',
            ]);

            $this->customer = Customer::newCustomer($request);
            Session::put('customer_id',$this->customer->id);
            Session::put('customer_name',$this->customer->name);
        }
        $this->order   = Order::newOrder($this->customer, $request);
        OrderDetail::newOrderDetail($this->order);

        $this->cartProducts = Cart::getContent();
        foreach ( $this->cartProducts as $cartProduct)
        {
            Cart::remove($cartProduct->id);
        }

        return redirect('/complete-order')->with('message', 'Your order suessfully Post. please wait we will contact with soon..');
    }
    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }
}
