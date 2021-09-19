@extends('frontend.master')
@section('title')
    Checkout
@endsection
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>
    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <!-- guest-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <h4 class="checkout-subtitle"><strong>Shipping</strong></h4>

                                                <form class="register-form" method="POST" action="{{route('store.checkout')}}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Name
                                                            <span>*</span></label>
                                                        <input type="text"
                                                               class="form-control unicase-form-control text-input"
                                                               required
                                                               id="exampleInputEmail1" name="shipping_name"
                                                               placeholder=""
                                                               value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title">Email
                                                            <span>*</span></label>
                                                        <input type="text"
                                                               class="form-control unicase-form-control text-input"
                                                               id="exampleInputPassword1" placeholder=""
                                                               name="shipping_email"
                                                               value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title">Phone
                                                            <span>*</span></label>
                                                        <input type="text"
                                                               class="form-control unicase-form-control text-input"
                                                               required
                                                               id="exampleInputPassword1" placeholder=""
                                                               name="shipping_phone"
                                                               value="{{\Illuminate\Support\Facades\Auth::user()->phone}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title">Post Code
                                                            <span>*</span></label>
                                                        <input type="text"
                                                               class="form-control unicase-form-control text-input"
                                                               id="exampleInputPassword1" placeholder=""
                                                               name="post_code">
                                                    </div>
                                            </div>
                                            <!-- guest-login -->

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Address<span>*</span></label>
                                                        <textarea name="shipping_address" cols="25" rows="5"
                                                                  class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title"
                                                               for="exampleInputEmail1">Note<span>*</span></label>
                                                        <textarea name="note" cols="25" rows="4"
                                                                  class="form-control"></textarea>
                                                    </div>
                                            </div>
                                            <!-- already-registered-login -->

                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>

                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach($miniCart as $item)
                                                <li>
                                                    Image: <img src="{{asset($item->options->image)}}"
                                                                style="height: 50px; width: 50px">
                                                </li><br>
                                                <li>
                                                    Quantity: <strong>{{$item->qty}}</strong>
                                                </li>
                                                <li>
                                                    @if($item->options->size == null)
                                                        Size:  <strong>None</strong>
                                                    @else
                                                        Size: <strong>{{$item->options->size}};</strong>
                                                    @endif
                                                </li>
                                                <li>
                                                    Color: <strong>{{$item->options->color}}</strong>
                                                </li>
                                            @endforeach
                                            <hr>
                                            <li>
                                                @if(\Illuminate\Support\Facades\Session::has('coupon'))
                                                    Subtotal: <strong>{{ $miniCartTotal}} </strong><br>
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
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Payment</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Stripe</label>
                                            <input type="radio" name="payment_method" value="stripe">
                                            <image src="{{asset('frontend/assets/images/payments/4.png')}}"></image>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Card</label>
                                            <input type="radio" name="payment_method" value="card">
                                            <image src="{{asset('frontend/assets/images/payments/3.png')}}"></image>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Cash</label>
                                            <input type="radio" name="payment_method" value="cash">
                                            <image src="{{asset('frontend/assets/images/payments/6.png')}}"></image>
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit"
                                            class="btn-upper btn btn-primary checkout-page-button">Pay
                                    </button>
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
