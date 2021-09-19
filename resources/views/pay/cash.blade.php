@extends('frontend.master')
@section('title')
    Cash On Delivery
@endsection
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class="active">Payment</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>
    <div class="body-content" style="min-height: 500px">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Shopping Amount</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            <hr>
                                            <li>
                                                @if(\Illuminate\Support\Facades\Session::has('coupon'))
                                                    Subtotal: <strong>{{ $miniCartTotal}}</strong><br>
                                                    Coupon:
                                                    <strong>{{ session()->get('coupon')['coupon_name']}}</strong>
                                                    ({{session()->get('coupon')['coupon_discount']}}%)<br>
                                                    Discount:
                                                    <strong>{{session()->get('coupon')['discount']}}
                                                    </strong>
                                                    <hr>
                                                    Grand Total:
                                                    <strong>{{session()->get('coupon')['total_amount']}}
                                                    </strong>
                                                @else
                                                    Subtotal: <strong>{{ $miniCartTotal}} </strong><br>
                                                    <hr>
                                                    Grand Total: <strong>{{$miniCartTotal}} </strong>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->                </div>
                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Payment</h4>
                                    </div>
                                    <form action="{{route('cash.order')}}" method="post" id="payment-form">
                                        @csrf
                                        <image src="{{asset('frontend/assets/images/payments/cash.png')}}"></image>
                                        <div class="form-row">
                                            <label for="card-element">
                                                <input type="hidden" name="name" value="{{$data['shipping_name']}}">
                                                <input type="hidden" name="email" value="{{$data['shipping_email']}}">
                                                <input type="hidden" name="phone" value="{{$data['shipping_phone']}}">
                                                <input type="hidden" name="address" value="{{$data['shipping_address']}}">
                                                <input type="hidden" name="post_code" value="{{$data['post_code']}}">
                                                <input type="hidden" name="note" value="{{$data['note']}}">
                                            </label>
                                        </div><br>

                                        <button class="btn btn-primary">Submit Payment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->                </div>
                    </form>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
        </div><!-- /.container -->
    </div>
@endsection
