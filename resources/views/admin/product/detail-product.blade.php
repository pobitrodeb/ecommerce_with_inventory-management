@extends('admin.master')
@section('title')
    pobitro-traders | product deetails
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Product Detail</h4>
                <h4 class="text-success text-center">{{Session::get('message')}}</h4>
                    <table class="table table-bordered table-hover dt-responsive nowrap">

                        <tr>
                            <th>Product Name</th>
                            <th>{{$product->name}}</th>
                        </tr>

                        <tr>
                            <th>Product Code</th>
                            <th>{{$product->code}} </th>
                        </tr>

                        <tr>
                            <th>Regular Price </th>
                            <th>{{$product->regular_price}}</th>
                        </tr>

                        <tr>
                            <th>Selling Price </th>
                            <th>{{$product->selling_price}} </th>
                        </tr>

                        <tr>
                            <th>Stock  Price </th>
                            <th>{{$product->stock_price}} </th>
                        </tr>

                        <tr>
                            <th>Stock Amount</th>
                            <th>{{$product->stock_amount}} </th>
                        </tr>

                        <tr>
                            <th>Short Description</th>
                            <th>{{$product->short_description}}</th>
                        </tr>

                        <tr>
                            <th>Long Description </th>
                            <th>{{$product->long_description}}</th>
                        </tr>
                        <tr>
                            <th>Sub Images</th>
                            <th>
                                <img src="" alt="" height="80" width="130">
                                <img src="" alt="" height="80" width="130">
                                <img src="" alt="" height="80" width="130">
                            </th>
                        </tr>

                        <tr>
                            <th>Publication Status  </th>
                            <th>{{$product->status == 1 ? 'Publish' : 'Un Publish'}}</th>
                        </tr>


                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
