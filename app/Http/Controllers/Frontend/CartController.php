<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL || $product->discount_price == $product->selling_price) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->product_qty,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'size' => $request->product_size,
                    'color' => $request->product_color,
                    'image' => $product->product_thumbnail,
                ]
            ]);
            return response()->json(['success' => 'Add To Cart Successfully']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->product_qty,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'size' => $request->product_size,
                    'color' => $request->product_color,
                    'image' => $product->product_thumbnail,
                ]
            ]);
            return response()->json(['success' => 'Add To Cart Successfully']);
        }
    }

    public function miniCart()
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

    public function removeMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json([
            'success' => 'Remove Item Successfully',
        ]);
    }

    public function couponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->first();
        if ($coupon) {
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount' => (float)Cart::total(0, '', '') * $coupon->coupon_discount / 100,
                'total_amount' => (float)Cart::total(0, '', '') - (float)Cart::total(0, '', '') * $coupon->coupon_discount / 100,
            ]);

            return response()->json(array(
                'validaty' => true,
                'success' => 'Valid',
            ));

        } else {
            return response()->json([
                'error' => 'Invalid',
            ]);
        }
    }

    public function couponCal()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(0, '', ''),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount' => session()->get('coupon')['discount'],
                'total_amount' => round(session()->get('coupon')['total_amount'], 2)
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(0, '', ''),
            ));
        }
    }

    public function couponRemove()
    {
        Session::forget('coupon');
        return response()->json(array(
            'success' => 'Remove Coupon Successfully',
        ));
    }

    public function checkout()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $miniCart = Cart::content();
                $miniCartQty = Cart::count();
                $miniCartTotal = Cart::total();
                return view('frontend.checkout.checkout_view', compact('miniCartTotal', 'miniCart', 'miniCartQty'));
            } else {
                $notification = array(
                    'message' => 'Choose Your Product',
                    'alert-type' => 'error',
                );
                return redirect()->route('/')->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'You Need To Login',
                'alert-type' => 'error',
            );
            return redirect()->route('login')->with($notification);
        }
    }


}
