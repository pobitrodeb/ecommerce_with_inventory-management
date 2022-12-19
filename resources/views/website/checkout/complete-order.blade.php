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
                        <h1 class="page-title">complete-order</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>complete-order-post</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


  <section class="py-5">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="card card-body text-center">
                      <h2>
                          {{Session::get('message')}}
                      </h2>
                  </div>
              </div>
          </div>
      </div>
  </section>


@endsection
