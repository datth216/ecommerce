<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MyCartController extends Controller
{
    public function MyCart()
    {
        return view('frontend.my_cart.my_cart');
    }

    public function getMyCart()
    {
        $miniCart = Cart::content();
        $miniCartQty = Cart::count();
        $miniCartTotal = Cart::total(0, '', '');

        return response()->json(array(
            'miniCart' => $miniCart,
            'miniCartQty' => $miniCartQty,
            'miniCartTotal' => $miniCartTotal
        ));
    }

    public function removeMyCart($rowId)
    {
        Cart::remove($rowId);

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        return response()->json([
            'success' => 'Remove Item Successfully',
        ]);
    }

    public function processMyCart($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);


        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount' => Cart::total() * $coupon->coupon_discount / 100,
                'total_amount' => Cart::total() - Cart::total() * $coupon->coupon_discount / 100,
            ]);
        }

        return response()->json('increment');
    }

    public function decrementMyCart($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount' => Cart::total() * $coupon->coupon_discount / 100,
                'total_amount' => Cart::total() - Cart::total() * $coupon->coupon_discount / 100,
            ]);
        }

        return response()->json('decrement');
    }
}
