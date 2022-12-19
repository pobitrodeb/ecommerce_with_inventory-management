@extends('admin.master')

@section('title')
    product | add
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Product </h4>
                    <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                    <form action="{{route('product.new')}}" method="POSt" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category Name </label>
                            <div class="col-sm-9">
                                <select class="form-control" required name="category_id">
                                    <option selected disabled>---- Select Category ------</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">SubCategory Name </label>
                            <div class="col-sm-9">
                                <select class="form-control" required name="sub_category_id">
                                    <option selected disabled>---- SubCategory Category ------</option>
                                    @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Brand Name </label>
                            <div class="col-sm-9">
                                <select class="form-control" required name="brand_id">
                                    <option selected disabled>---- Brand Name ------</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Unit</label>
                            <div class="col-sm-9">
                                <select class="form-control" required name="unit_id">
                                    <option selected disabled>---- Unit ------</option>
                                    @foreach($units as $unit)
                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="code">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Regular Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="regular_price">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Selling Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="selling_price">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Stock Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="stock_price">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Stock Amount</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="stock_amount">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea  class="form-control"  name="short_description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="long_description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Product Image </label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" accept="image/*" name="image">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Product Sub Image </label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" accept="image/*" name="sub_image[]" multiple>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label"> Status </label>
                            <div class="col-sm-9">
                                <label for=""><input type="radio" name="status" value="1" checked> Publish</label>
                                <label for=""><input type="radio" name="status" value="0"> UnPublish</label>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Product </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
