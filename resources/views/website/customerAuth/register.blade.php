@extends('website.master')

@section('title')
    complete order
@endsection

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">customer-registration</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">customer-registration</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header bg-primary text-center text-white">
                          Register Form
                        </div>
                        <div class="card-body">
                            <form action="{{route('new.customer')}}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="" class="col-md-3"> Full Name : </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-md-3"> Email : </label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-md-3"> Mobile : </label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="mobile">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-md-3"> Password : </label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-primary" value="Registration" name="submit">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
