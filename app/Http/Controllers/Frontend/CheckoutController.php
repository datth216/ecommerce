<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function miniCart()
    {
        $miniCart = Cart::content();
        $miniCartQty = Cart::count();
        $miniCartTotal = Cart::total();

        return response()->json(array(
            'miniCart' => $miniCart,
            'miniCartQty' => $miniCartQty,
            'miniCartTotal' => $miniCartTotal
        ));
    }

    public function storeCheckout(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;
        $data['post_code'] = $request->post_code;
        $data['note'] = $request->note;
        $miniCartTotal = Cart::total(0, '', '');
        if($request->payment_method == 'stripe'){
                return view('pay.pay', compact('data', 'miniCartTotal'));
        }elseif($request->payment_method == 'card'){
            return 'card';
        }else{
            return view('pay.cash', compact('data', 'miniCartTotal'));
        }
    }
}
