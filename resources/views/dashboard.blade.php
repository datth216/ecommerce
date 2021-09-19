@extends('frontend.index')
@php
    $product = \App\Models\Product::where('status', 1)->limit(5)->get();
    $hotdeal = \App\Models\Product::where('hot_deals', 1)->latest()->limit(4)->get();
    $special_offer = \App\Models\Product::where('special_offer', 1)->limit(5)->get();
    $special_deal = \App\Models\Product::where('special_deal', 1)->latest()->limit(3)->get();
    $featured_product = \App\Models\Product::where('featured', 1)->get();
    $slider = \App\Models\Slider::where('status', 1)->limit(3)->get();
    $categoryParent = \App\Models\Category::where('parent_id', 0)->get();
    $skip_category_6 = \App\Models\Category::skip(4)->first();
    $skip_product_6 = \App\Models\Product::where('status', 1)->where('category_id', $skip_category_6->id)->get();
    // $skip_brand_8 = \App\Models\Brands::skip(8)->first();
    // $skip_product_8 = \App\Models\Product::where('status', 1)->where('brand_id', $skip_brand_8->id)->get();
@endphp
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
             @include('frontend.common.user_sidebar')
                <div class="col-md-8">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hi </span>
                            <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}</strong>,
                            Welcome to Simple Online Shop
                        </h3>
                    </div>
                    <div class="card">
                        <img src="{{asset('frontend/assets/images/banner1.jpg')}}" alt=""
                             style="width: 810px;height: 410px;margin-bottom: 10px">
                    </div>
                </div>
            </div>
        </div>
@endsection
