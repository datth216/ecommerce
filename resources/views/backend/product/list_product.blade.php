@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Product List</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product as $products)
                                        <tr>
                                            <td>
                                                <img src="{{asset($products->product_thumbnail)}}"
                                                     style="width: 70px; height: 70px;">
                                            </td>
                                            <td>{{$products->product_name_en}}</td>
                                            <td>{{$products->selling_price}}</td>
                                            <td>
                                                @if($products->discount_price == NULL)
                                                    <span class="badge badge-pill badge-danger">No discount</span>
                                                @else
                                                    @php
                                                        $price = $products->selling_price - $products->discount_price;
                                                        $priceDiscount = ($price / $products->selling_price) * 100;
                                                    @endphp
                                                    <span
                                                        class="badge badge-pill badge-danger">{{round($priceDiscount)}}%</span>
                                                @endif
                                            </td>
                                            <td>{{$products->product_qty}}</td>
                                            <td>
                                                @if($products->status == 1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td width="17%">
                                                <a href="{{route('product.edit', $products->id)}}"
                                                   class="btn btn-primary"><i class="fa fa-eye" title="Detail"></i></a>
                                                <a href="{{route('product.edit', $products->id)}}"
                                                   class="btn btn-warning"><i class="fa fa-edit" title="Edit"></i></a>
                                                <a href="{{route('product.delete', $products->id)}}"
                                                   class="btn btn-danger"
                                                   id="delete"><i class="fa fa-trash" title="Delete"></i></a>
                                                @if($products->status == 1)
                                                    <a href="{{route('product.inactive', $products->id)}}"
                                                       class="btn btn-danger"><i class="fa fa-arrow-down"
                                                                                 title="Inactive"></i></a>
                                                @else
                                                    <a href="{{route('product.active', $products->id)}}"
                                                       class="btn btn-success"><i class="fa fa-arrow-up"
                                                                                  title="Active"></i></a>
                                                @endif
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
        </section>
    </div>
@endsection
