<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>

</head>
<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="6">
                    <table>
                        <tr>
                            <td class="title" colspan="8">
                                <img src="https://scontent.fdac140-1.fna.fbcdn.net/v/t39.30808-6/311272615_518124233654666_9084224875444856355_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=G8SNcisFlnkAX_upXXw&_nc_ht=scontent.fdac140-1.fna&oh=00_AT_21dV6HVNrwWRR_atWi7NsR6TzJKHurtGNcXovQsuREg&oe=63432F10" alt="Company logo" style="width: 100%; max-width: 150px; height: 100px" />
                            </td>

                            <td colspan="4">
                                Invoice # :00 {{$order->id}}<br />
                                Order Date : {{$order->order_date}}<br />
                                Delivery Date : {{date('Y-M-d')}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="6">
                    <table>
                        <tr>
                            <td>
                                <h3>Billing Information</h3>
                                {{$order->customer->name}}<br />
                                {{$order->customer->email}}<br />
                                ++88 {{$order->customer->mobile}}
                            </td>

                            <td>
                                <h3>Shipping Information</h3>
                                {{$order->delivery_address}}<br />
                                Alt No :  ++88 {{$order->customer->mobile}}

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td colspan="4">Payment Method</td>

                <td colspan="8">
                    {{$order->payment_method == 1 ? 'Cash On Delivery' : 'Online Payment Method'}}
                </td>
            </tr>

            <tr class="details">
                <td colspan="3"></td>

                <td></td>
            </tr>

            <tr class="heading">
                <td colspan="6">Item Name</td>
                <td colspan="" class="text-center">Quantity</td>
                <td colspan="3" class="text-center">Unit price</td>
                <td colspan="2" class="text-right">Total</td>

            </tr>
            @php($sum = 0)
            @foreach($order->orderDetail as $orderDetail)
                <tr class="item">
                    <td colspan="6">{{$orderDetail->product_name}}</td>
                    <td colspan=""class="text-center">{{$orderDetail->product_qty}}</td>
                    <td colspan="3"class="text-center">{{$orderDetail->product_price}}</td>
                    <td colspan="2"class="text-right">{{number_format($orderDetail->product_qty * $orderDetail->product_price)}}</td>
                </tr>
                @php($sum = $sum + ($orderDetail->product_qty * $orderDetail->product_price))
            @endforeach

            <tr class="total">
                <td colspan="9">SubTotal :</td>
                <td colspan="3" class="text-right">{{number_format($sum)}}</td>
            </tr>
            <tr class="total">
                <td colspan="9">Tax Total :</td>
                @php($tax = ($sum*15)/100)
                <td colspan="3" class="text-right">{{round($tax)}}</td>
            </tr>

            <tr class="total">
                <td colspan="9">Shipping Total :</td>
                <td colspan="3" class="text-right">{{number_format($order->shipping_total)}}</td>
            </tr>
            <tr class="total">
                <td colspan="9">Total Payable :</td>
                <td colspan="3" class="text-right">{{number_format($sum + $tax + $order->shipping_total)}}</td>
            </tr>

        </table>
    </div>
</body>
</html>
