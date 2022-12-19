@extends('admin.master')

@section('title')
    Order | manage
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Order Manage Tabel </h4>
                    <p class="card-title-desc">pobitro-trader all order</code>.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="text-center">
                        <tr>
                            <th>SL</th>
                            <th>Order No</th>
                            <th>Customer Info</th>
                            <th>Order Status</th>
                            <th>Order Date</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->customer_id}}</td>
{{--                                    <td>{{$order->customer->name. '('.$order->customer->name.')'}}</td>--}}
                                    <td>{{$order->order_status}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->payment_method ==  1 ? 'Cash on Delivery' : 'Online Payment'}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>
                                        <a href="{{route('admin-order.detail',['id'=>$order->id])}}" class="btn btn-primary" title="View Order Invoice"><i><i class="fa fa-book-dead"></i></i></a>

                                        <a href="{{route('admin-order.view-invoice',['id'=>$order->id])}}" class="btn btn-dark" title="View Order Invoice"><i><i class="fa fa-file-pdf"></i></i></a>

                                        <a href="{{route('admin-order.download-invoice',['id'=>$order->id])}}" class="btn btn-dark" title="Download Order Invoice" target="_blank"><i><i class="fa fa-download"></i></i></a>

                                        <a href="{{route('admin-order.edit',['id'=>$order->id])}}" class="btn btn-warning" title="Edit Order"><i><i class="fa fa-edit"></i></i></a>

                                        <a href="{{route('admin-order.delete',['id'=>$order->id])}}" class="btn btn-danger" title="Delete Order"><i><i class="fa fa-trash"></i></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
