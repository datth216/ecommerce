@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Order Details</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Order Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Shipping Details</strong> </h4>
                        </div>
                        <table class="table">
                            <tr>
                                <th> Order Date : </th>
                                <th> {{ $order->order_date }} </th>
                            </tr>
                            <tr>
                                <th> Shipping Name : </th>
                                <th> {{ $order->name }} </th>
                            </tr>

                            <tr>
                                <th> Shipping Phone : </th>
                                <th> {{ $order->phone }} </th>
                            </tr>

                            <tr>
                                <th> Shipping Email : </th>
                                <th> {{ $order->email }} </th>
                            </tr>

                            <tr>
                                <th> Address : </th>
                                <th> {{ $order->address }} </th>
                            </tr>
                            <tr>
                                <th> Post Code : </th>
                                <th> {{ $order->post_code }} </th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><span class="text-danger"> Invoice :
                                    {{ $order->invoice_no }}</span></h4>
                        </div>


                        <table class="table">
                            <tr>
                                <th> Name : </th>
                                <th> {{ $order->name }} </th>
                            </tr>

                            <tr>
                                <th> Phone : </th>
                                <th> {{ $order->phone }} </th>
                            </tr>

                            <tr>
                                <th> Payment Type : </th>
                                <th> {{ $order->payment_method }} </th>
                            </tr>

                            <tr>
                                <th> Order : </th>
                                <th>
                                    <span class="badge badge-pill badge-warning"
                                        style="background: #418DB9;">{{ $order->status }} </span>
                                </th>
                            </tr>

                            <tr>
                                <th> Order Total : </th>
                                <th>${{ $order->amount }} </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>
                                    @if ($order->status == 'Pending')
                                        @if ($order->return_order == 0)
                                            <a href="{{ route('pending.to.cancel', $order->id) }}" id="cancel"
                                                class="btn btn-block btn-danger">Cancel Order</a>
                                            <a href="{{ route('pending.to.confirm', $order->id) }}" id="confirm"
                                                class="btn btn-block btn-success">Confirm Order</a>
                                        @else
                                            <a href="{{ route('pending.to.confirm', $order->id) }}" id="confirm"
                                                class="btn btn-block btn-success">Confirm Order</a>
                                        @endif
                                    @elseif($order->status == 'Confirmed')
                                        <a href="{{ route('confirm.to.processing', $order->id) }}" id="processing"
                                            class="btn btn-block btn-success">Processing Order</a>
                                    @elseif($order->status == 'Processing')
                                        <a href="{{ route('processing.to.picked', $order->id) }}" id="picked"
                                            class="btn btn-block btn-success">Processing Order</a>
                                    @elseif($order->status == 'Picked')
                                        <a href="{{ route('picked.to.shipped', $order->id) }}" id="shipped"
                                            class="btn btn-block btn-success">Shipped Order</a>
                                    @elseif($order->status == 'Shipped')
                                        <a href="{{ route('shipped.to.delivered', $order->id) }}" id="delivered"
                                            class="btn btn-block btn-success">Delivered Order</a>
                                    @endif
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">

                        </div>



                        <table class="table">
                            <tbody>

                                <tr>
                                    <td width="10%">
                                        <label for=""> Image</label>
                                    </td>

                                    <td width="20%">
                                        <label for=""> Product Name </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Product Code</label>
                                    </td>


                                    <td width="10%">
                                        <label for=""> Color </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Size </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Quantity </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Price </label>
                                    </td>

                                </tr>


                                @foreach ($orderItem as $item)
                                    <tr>
                                        <td width="10%">
                                            <label for=""><img src="{{ asset($item->product->product_thumbnail) }}"
                                                    height="50px;" width="50px;"> </label>
                                        </td>

                                        <td width="20%">
                                            <label for=""> {{ $item->product->product_name_en }}</label>
                                        </td>


                                        <td width="10%">
                                            <label for=""> {{ $item->product->product_code }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> {{ $item->color }}</label>
                                        </td>

                                        <td width="10%">
                                            @if (!empty($item->size))
                                                <label for=""> {{ $item->size }}</label>
                                            @else
                                                <label for="">----</label>
                                            @endif
                                        </td>

                                        <td width="10%">
                                            <label for=""> {{ $item->qty }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> {{ $item->price }} ( {{ $item->price * $item->qty }} )
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
    </div>
@endsection
