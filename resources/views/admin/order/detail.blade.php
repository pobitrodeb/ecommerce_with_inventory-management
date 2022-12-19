@extends('admin.master')
@section('title')
    pobitro-traders | product deetails
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4> Order Detail </h4>
                    <h4 class="text-success text-center">{{Session::get('message')}}</h4>
                    <table class="table table-bordered table-hover dt-responsive nowrap">

                        <tr>
                            <th>Order No</th>
                            <th>{{$order->id}}</th>
                        </tr>

                        <tr>
                            <th>Customer Info</th>
                            <th>{{$order->customer_id}} </th>
                        </tr>

                        <tr>
                            <th>Order total</th>
                            <th>{{$order->order_total}}</th>
                        </tr>

                        <tr>
                            <th>tax_total</th>
                            <th>{{$order->tax_total}}</th>
                        </tr>

                        <tr>
                            <th>shipping_total</th>
                            <th>{{$order->shipping_total}}</th>
                        </tr>

                        <tr>
                            <th>delivery_address</th>
                            <th>{{$order->delivery_address}}</th>
                        </tr>

                        <tr>
                            <th>order_status</th>
                            <th>{{$order->order_status}}</th>
                        </tr>

                        <tr>
                            <th>order_date</th>
                            <th>{{$order->order_date}}</th>
                        </tr>

                        <tr>
                            <th>payment_status</th>
                            <th>{{$order->payment_status}}</th>
                        </tr>

                        <tr>
                            <th>payment_method</th>
                            <th>{{$order->payment_method}}</th>
                        </tr>
                        <tr>
                            <th>payment_date</th>
                            <th>{{$order->payment_date}}</th>
                        </tr>

                        <tr>
                            <th>transaction_id</th>
                            <th>{{$order->transaction_id}}</th>
                        </tr>
                        <tr>
                            <th>delivery_status</th>
                            <th>{{$order->delivery_status}}</th>
                        </tr>
                        <tr>
                            <th>delivery_date</th>
                            <th>{{$order->delivery_date}}</th>
                        </tr>

                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

{{--    ########## product information ############# --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Product Information</h4>
                    <p class="card-title-desc">pobitro-trader all product</code>.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="text-center">
                        <tr>
                            <th>SL</th>
                            <th>Product ID</th>
                            <th>Product Name </th>
                            <th>Unit Price</th>
                            <th>Product qty</th>
                            <th>Total Price </th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($order->orderDetail as $order)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->product_id}}</td>
                                    <td>{{$order->product_name}} </td>
                                    <td>{{number_format($order->product_price)}} </td>
                                    <td>{{$order->product_qty}}</td>
                                    <td>{{number_format($order->product_price * $order->product_qty)}}</td>
                                    <td>Action</td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
