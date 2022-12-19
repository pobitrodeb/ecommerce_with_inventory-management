@extends('admin.master')

@section('title')
   sub-category | manage
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
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category Name </th>
                            <th>SubCategory Name </th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($subCategories as $subcategory)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$subcategory->category->name}}</td>
                            <td>{{$subcategory->name}}</td>
                            <td>{{$subcategory->description}}</td>
                            <td>
                                <img src="{{asset($subcategory->image)}}" alt="" height="80" width="120">
                            </td>
                            <td>{{$subcategory->status == 1 ? 'Publish' : 'Un Publish'}}</td>
                            <td>
                                <a href="" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
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
