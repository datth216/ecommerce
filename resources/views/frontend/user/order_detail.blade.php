@extends('frontend.index')
@php
$product = \App\Models\Product::where('status', 1)
    ->limit(5)
    ->get();
$hotdeal = \App\Models\Product::where('hot_deals', 1)
    ->latest()
    ->limit(4)
    ->get();
$special_offer = \App\Models\Product::where('special_offer', 1)
    ->limit(5)
    ->get();
$special_deal = \App\Models\Product::where('special_deal', 1)
    ->latest()
    ->limit(3)
    ->get();
$featured_product = \App\Models\Product::where('featured', 1)->get();
$slider = \App\Models\Slider::where('status', 1)
    ->limit(3)
    ->get();
$categoryParent = \App\Models\Category::where('parent_id', 0)->get();
$skip_category_6 = \App\Models\Category::skip(4)->first();
$skip_product_6 = \App\Models\Product::where('status', 1)
    ->where('category_id', $skip_category_6->id)
    ->get();
// $skip_brand_8 = \App\Models\Brands::skip(8)->first();
// $skip_product_8 = \App\Models\Product::where('status', 1)->where('brand_id', $skip_brand_8->id)->get();
@endphp
@section('content')
    <div class="body-content" style="min-height: 460px">
        <div class="container">
            <div class="row">
                @php
                    $id = \Illuminate\Support\Facades\Auth::user()->id;
                    $users = \App\Models\User::find($id);
                @endphp
                @include('frontend.common.user_sidebar')
                <div class="col-md-5">
                    <div class="card-header">
                        <h4>Shipping Detail</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Date:</th>
                                <th>{{ $order->order_date }}</th>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <th>{{ $order->name }}</th>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <th>{{ $order->email }}</th>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <th>{{ $order->phone }}</th>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <th>{{ $order->address }}</th>
                            </tr>
                            <tr>
                                <th>Post Code:</th>
                                <th>{{ $order->post_code }}</th>
                            </tr>
                            <tr class="text-success">
                                <th>Total:</th>
                                <th>{{ $order->amount }}</th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card-header">
                        <h4 style="color: red">Invoice No: {{ $order->invoice_no }}</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($orderItem as $order1)
                            <table class="table">
                                <tr>
                                    <th>Product:</th>
                                    <th>{{ $order1->product->product_name_en }}</th>
                                </tr>
                                <tr>
                                    <th>Code:</th>
                                    <th>{{ $order1->product->product_code }}</th>
                                </tr>
                                <tr>
                                    <th>Color:</th>
                                    <th>{{ $order1->color }}</th>
                                </tr>
                                @if (!empty($order1->size))
                                    <tr>
                                        <th>Size:</th>
                                        <th>{{ $order1->size }}</th>
                                    </tr>
                                @endif
                                <tr>
                                    <th>Quantity:</th>
                                    <th>{{ $order1->qty }}</th>
                                </tr>
                                <tr>
                                    <th>Price:</th>
                                    <th>{{ $order1->price }}</th>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <th>{{ $order1->price }}</th>
                                </tr>
                            </table>
                        @endforeach

                    </div>
                </div>
            </div>
            @if ($order->status !== 'Pending')

            @else
                @php
                    $order = App\Models\Order::where('id', $order->id)
                        ->where('return_reason', '=', NULL)
                        ->first();
                @endphp
                @if ($order)
                    <form action="{{ route('order.return', $order->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="label">Reason Return:</label>
                            <textarea class="form-control" cols="10" rows="5" name="return_reason" id=""></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </form>
                @else
                    <span class="badge badge-pill badge-warning" style="background: red">You have send request!</span><br>
                @endif
            @endif
            <br>
        </div>
    </div>
@endsection
