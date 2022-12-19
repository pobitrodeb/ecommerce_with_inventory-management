@extends('admin.master')

@section('title')
    product | manage
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Default Datatable</h4>
                    <p class="card-title-desc">pobitro-trader all product</code>.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="text-center">
                        <tr>
                            <th>SL</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Brand</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->subCategory->name}} </td>
                                <td>{{$product->brand->name}} </td>
                                <td>{{$product->name}} </td>
                                <td>
                                    <img src="{{asset($product->image)}}" alt="" height="80" width="130">
                                </td>
                                <td>
                                    <a href="{{route('product.detail',['id'=>$product->id])}}"><i><i class="fa fa-book-dead"></i></i></a>
                                    <a href=""><i><i class="fa fa-edit"></i></i></a>
                                    <a href=""><i><i class="fa fa-trash"></i></i></a>
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
