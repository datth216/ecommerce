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
    <div class="body-content" style="min-height: 494px">
        <div class="container">
            <div class="row">
                @php
                    $id = \Illuminate\Support\Facades\Auth::user()->id;
                    $users = \App\Models\User::find($id);
                @endphp
                @include('frontend.common.user_sidebar')
                <div class="col-md-1"></div>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="col-md-1">
                                        <label for="">Date</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Invoice</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Payment</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Total</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Order</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Action</label>
                                    </td>
                                </tr>
                                @foreach ($order as $item)
                                    <tr>
                                        <td class="col-md-1">
                                            <label for="">{{ $item->order_date }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $item->invoice_no }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $item->payment_method }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $item->amount }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">
                                                <span class="badge badge-pill badge-warning" style="background: gray">
                                                    {{ $item->status }}
                                                </span>
                                            </label>
                                        </td>
                                        <td class="col-md-2">
                                            <a href="{{ url('user/orders_detail', $item->id) }}"><i
                                                    class="fa fa-eye"></i></a>
                                            <a target="_blank" href="{{ url('user/invoice_dowload', $item->id) }}"><i
                                                    class="fa fa-download"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
