@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Orders Search By Date</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Invoice</th>
                                            <th>Amount</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->order_date }}
                                                </td>
                                                <td>{{ $item->invoice_no }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>
                                                    {{ $item->payment_method }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-pill badge-primary">{{ $item->status }}</span>
                                                </td>
                                                <td width="17%">
                                                    <a href="{{ route('orders.detail', $item->id) }}"
                                                        class="btn btn-primary"><i class="fa fa-eye" title="Detail"></i></a>
                                                    <a target="_blank" href="{{ route('invoice.download', $item->id) }}"
                                                        class="btn btn-warning"><i class="fa fa-download"
                                                            title="Dowload"></i></a>
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
