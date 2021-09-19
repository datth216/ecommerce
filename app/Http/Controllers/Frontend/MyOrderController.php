<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

class MyOrderController extends Controller
{
    public function myOrders()
    {
        $order = Order::where('user_id', Auth::id())->orderBy('user_id', 'DESC')->get();
        return view('frontend.user.order', compact('order'));
    }

    public function ordersDetail($order_id)
    {
        $order = Order::where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order_detail', compact('order', 'orderItem'));
    }

    public function invoiceDowload($order_id)
    {
        $order = Order::where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        // return view('frontend.user.order_invoice', compact('order', 'orderItem'));
        $pdf = PDF::loadView('frontend.user.order_invoice', compact('order', 'orderItem'));
        return $pdf->download('invoice.pdf');
    }

    public function ordersReturn(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d m Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Return Order Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('my.order')->with($notification);
    }

    public function ordersReturnView()
    {
        $order = Order::where('user_id', Auth::id())->where('return_reason', '!=', NULL)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order_return', compact('order'));
    }

    public function ordersCancelView()
    {
        $order = Order::where('user_id', Auth::id())->where('status', 'Cancel')->orderBy('id', 'DESC')->get();
        return view('frontend.user.order_cancel', compact('order'));
    }
}
