@extends('website.master')

@section('title')
    checkout page
@endsection

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>
                                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Cehck Out Form</h6>
                                <form action="{{route('new.order')}}" method="POST">
                                    @csrf
                                    <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>User Name</label>
                                                    <div class="row">
                                                        <div class="col-md-12 form-input form">
                                                            @if(isset($customer->name))
                                                            <input type="text" value="{{$customer->name}}" name="name" readonly>
                                                            @else
                                                                <input type="text" placeholder="Full Name" name="name">
                                                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        @if(isset($customer->email))
                                                        <input type="email" value="{{$customer->email}}" name="email" readonly>
                                                        @else
                                                            <input type="email" placeholder="Email Address" name="email">
                                                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label>
                                                    <div class="form-input form">
                                                        @if(isset($customer->password))
                                                        <input type="number" value="{{$customer->mobile}}" name="mobile">
                                                        @else
                                                            <input type="number" placeholder="Phone Number" name="mobile">
                                                            <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Delivery Address</label>
                                                    <div class="form-input form">
                                                        <textarea name="delivery_address" class="form-control"></textarea>
                                                        <span class="text-danger">{{$errors->has('delivery_address') ? $errors->first('delivery_address') : ''}}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="">Select your Payment Methods</label>
                                                <div class="single-checkbox checkbox-style-3">
                                                    <label for="" class="me-5"><input type="radio" value="1" name="payment_method"> Cash on delivery</label>
                                                    <label for=""><input type="radio" value="2" name="payment_method" checked>  Online Payment </label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button class="btn" type="submit">Confirm Order </button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title text-center">Pricing Table</h5>
                            <div class="sub-total-price">
                                @php($sum = 0)
                                @foreach($CartProducts as $cartProduct)
                                <div class="total-price">
                                    <p class="value">{{$cartProduct->name}}: ({{$cartProduct->price}}*{{$cartProduct->quantity}})</p>
                                    <p class="price">Tk : {{$cartProduct->price*$cartProduct->quantity}}</p>
                                </div>
                                    @php($sum = $sum + ($cartProduct->price*$cartProduct->quantity))
                                @endforeach
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price(Tk) : </p>
                                    <p class="price"> {{number_format($sum)}}</p>
                                </div>
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Tax Amount (15%) Tk : </p>
                                    @php($tax = ($sum*15)/100)
                                    <p class="price"> {{number_format($tax)}}</p>
                                </div>
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Shipping Tk : </p>
                                   @php($shipping = 500)
                                    <p class="price"> {{$shipping}}</p>
                                </div>
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Grand Total Taka  : </p>
                                    @php($grandTotal= $sum + $tax + $shipping)
                                    <p class="price"> {{number_format($grandTotal)}}</p>
                                </div>
                            </div>

                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{asset('/')}}website/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
