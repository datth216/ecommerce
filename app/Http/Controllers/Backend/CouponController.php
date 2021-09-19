<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function listCoupons()
    {
        $coupon = Coupon::latest()->get();
        return view('backend.coupon.list_coupon', compact('coupon'));
    }

    public function storeCoupons(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required|integer',
            'coupon_validate' => 'required',
        ],
            [
                'coupon_name.required' => 'Please input your coupon name',
                'coupon_discount.required' => 'Please input your coupon discount',
                'coupon_discount.integer' => 'Please input number'
            ]);

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validate' => $request->coupon_validate,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Add Coupon Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function editCoupons($id)
    {
        $coupons = Coupon::findOrFail($id);
        return view('backend.coupon.edit', compact('coupons'));
    }

    public function updateCoupons(Request $request, $id)
    {
        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validate' => $request->coupon_validate,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Update Coupon Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('list.coupons')->with($notification);
    }

    public function deleteCoupons($id)
    {
        Coupon::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Delete Coupon Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
