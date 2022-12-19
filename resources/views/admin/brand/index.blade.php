@extends('admin.master')

@section('title')
   brand | add
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Brand Form</h4>
                    <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                    <form action="{{route('brand.new')}}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Brand Name </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="horizontal-firstname-input" name="name">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Brand Description </label>
                            <div class="col-sm-9">
                                <textarea  class="form-control" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image </label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="horizontal-password-input" name="image">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Status  </label>
                            <div class="col-sm-9">
                                <label for=""><input type="radio" name="status" value="1" checked> Publish</label>
                                <label for=""><input type="radio" name="status" value="0"> UnPublish</label>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Category </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
