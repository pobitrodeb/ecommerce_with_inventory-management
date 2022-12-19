@extends('admin.master')

@section('title')
    edit order
@endsection

@section('body')
    <div class="card">
        <div class="card-header">Edit Order</div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="" class="col-md-3"> Order No : </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" readonly value="{{$order->id}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-md-3"> Order Date : </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" readonly value="{{$order->order_date}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-md-3"> Total Payable : </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" readonly value="{{$order->order_total}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-md-3"> Order Status : </label>
                    <div class="col-md-9">
                        <select name="order_status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="cancel">Cancel</option>
                            <option value="complete">Complete</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-md-3"> Payment Status : </label>
                    <div class="col-md-9">
                        <select name="payment_status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="cancel">Cancel</option>
                            <option value="complete">Complete</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-md-3">Delivery Status : </label>
                    <div class="col-md-9">
                        <select name="delivery_status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="cancel">Cancel</option>
                            <option value="complete">Complete</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-md-3">Delivery Address : </label>
                    <div class="col-md-9">
                        <textarea name="delivery_address" class="form-control">
                            {{$order->delivery_address}}
                        </textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-md-3"></label>
                    <div class="col-md-9">
                        <input type="submit" class="btn btn-primary px-5" value="Update Order Status">
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
