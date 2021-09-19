<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function ordersPending()
    {
        $order = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('backend.order.order-pending', compact('order'));
    }

    public function ordersDetail($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.order.order-detail', compact('order', 'orderItem'));
    }

    public function ordersConfirmed()
    {
        $order = Order::where('status', 'Confirmed')->orderBy('id', 'DESC')->get();
        return view('backend.order.order-confirmed', compact('order'));
    }

    public function ordersProcessing()
    {
        $order = Order::where('status', 'Processing')->orderBy('id', 'DESC')->get();
        return view('backend.order.order-processing', compact('order'));
    }

    public function ordersPicked()
    {
        $order = Order::where('status', 'Picked')->orderBy('id', 'DESC')->get();
        return view('backend.order.order-picked', compact('order'));
    }

    public function ordersShipped()
    {
        $order = Order::where('status', 'Shipped')->orderBy('id', 'DESC')->get();
        return view('backend.order.order-shipped', compact('order'));
    }

    public function ordersDelivered()
    {
        $order = Order::where('status', 'Delivered')->orderBy('id', 'DESC')->get();
        return view('backend.order.order-delivered', compact('order'));
    }

    public function ordersCancel()
    {
        $order = Order::where('status', 'Cancel')->orderBy('id', 'DESC')->get();
        return view('backend.order.order-cancel', compact('order'));
    }

    public function ordersReturn()
    {
        $order = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();
        return view('backend.order.order-return', compact('order'));
    }

    public function ordersPendingToConfirm($order_id)
    {
        $order = Order::findOrFail($order_id)->update([
            'status' => 'Confirmed'
        ]);

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('orders.confirmed')->with($notification);
    }

    public function ordersPendingToCancel($order_id)
    {
        $order = Order::findOrFail($order_id)->update([
            'status' => 'Cancel',
            'cancel_date' => Carbon::now('d m Y')
        ]);

        $notification = array(
            'message' => 'Order Cancel Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('orders.cancel')->with($notification);
    }

    public function ordersConfirmToProcessing($order_id)
    {
        $order = Order::findOrFail($order_id)->update([
            'status' => 'Processing'
        ]);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('orders.processing')->with($notification);
    }

    public function ordersProcessingToPicked($order_id)
    {
        $order = Order::findOrFail($order_id)->update([
            'status' => 'Picked'
        ]);

        $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('orders.picked')->with($notification);
    }

    public function ordersPickedToShipped($order_id)
    {
        $order = Order::findOrFail($order_id)->update([
            'status' => 'Shipped'
        ]);

        $notification = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('orders.shipped')->with($notification);
    }

    public function ordersShippedToDelivered($order_id)
    {           
        $product = OrderItem::where('order_id', $order_id)->get();
        foreach ($product as $item) {
            Product::where('id', $item->id)->where('product_qty', '>' , 0)->update([
                'product_qty' => DB::raw('product_qty-' . $item->qty),
            ]);
        }

        $order = Order::findOrFail($order_id)->update([
            'status' => 'Delivered'
        ]);

        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('orders.delivered')->with($notification);
    }

    public function AdminInvoiceDownload($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        $pdf = PDF::loadView('backend.order.order-invoice', compact('order', 'orderItem'));
        return $pdf->download('invoice.pdf');
    }

    public function acceptReturn($order_id)
    {
        $order = Order::findOrFail($order_id)->update([
            'return_order' => 2,
        ]);

        $notification = array(
            'message' => 'Order Return Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function acceptReturnSuccess()
    {
        $order = Order::where('return_order', 2)->orderBy('id', 'DESC')->get();
        return view('backend.order.order-return-success', compact('order'));
    }
}
