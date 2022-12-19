@extends('website.master')

@section('title')
    Customer Dashboard
@endsection

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">My Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">My Dashboard</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href=""> My Profile </a></li>
                            <li class="list-group-item"><a href=""> All Order </a></li>
                            <li class="list-group-item"><a href=""> My Accounts </a></li>
                            <li class="list-group-item"><a href=""> Change Password </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">Recent Order </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-hover text-center">
                                        <thead>
                                            <tr>
                                               <th>SL No</th>
                                               <th>Order No</th>
                                               <th>Order Total</th>
                                               <th>Order Date</th>
                                               <th>Order Status</th>
                                               <th>Action</th>
                                            </tr>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->order_total}}</td>
                                            <td>{{$order->order_date}}</td>
                                            <td>{{$order->order_status}}</td>
                                            <td>
                                                <a href="" class="btn btn-warning"> Edit</a>
                                                <a href="" class="btn btn-danger"> Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </thead>
                                    </table>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </section>


@endsection
