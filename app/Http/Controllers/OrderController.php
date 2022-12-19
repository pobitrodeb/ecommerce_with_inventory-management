<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use PDF;
class OrderController extends Controller
{
    private $orders;
    public function manage()
    {
//        $this->orders = ;
        return view('admin.order.manage',[
            'orders' => Order::orderBy('id', 'desc')->get(),
        ]);
    }

    public function detail($id)
    {
        $this->orders = Order::find($id);
        return view('admin.order.detail',[
            'order' =>$this->orders,
        ]);
    }
    public function viewInvoice($id)
    {
        $this->orders = Order::find($id);
        return view('admin.order.invoice',[
            'order' =>$this->orders,
        ]);
    }

    public function downloadInvoice($id)
    {
        $pdf = PDF::loadView('admin.order.invoice-download',[ 'order' =>Order::find($id)]);
        return $pdf->download();
//        $pdf = PDF::loadHTML('<h1>Test</h1>');
//        return $pdf->download();
    }
    public function edit($id)
    {
        return view('admin.order.edit-order',[ 'order' =>Order::find($id)]);
    }

    public function delete($id)
    {

    }
}
