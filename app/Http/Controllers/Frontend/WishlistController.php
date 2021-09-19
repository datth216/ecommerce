<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function wishlist()
    {
        return view('frontend.wishlist.wishlist');
    }

    public function getWishlist()
    {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    public function removeWishlist($id)
    {
        $remove = Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json([
            'success' => 'Remove Product Successfully',
        ]);
    }


    public function addWishlist(Request $request, $product_id)
    {
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if ($wishlist) {
                return response()->json([
                    'error' => 'Has Exist On Your Wishlist',
                ]);
            } else {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json([
                    'success' => 'Add To Your Wishlist Successfully',
                ]);
            }
        } else {
            return response()->json([
                'error' => 'Login Your Account',
            ]);
        }
    }
}
