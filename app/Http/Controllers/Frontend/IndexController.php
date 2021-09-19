<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $product = Product::where('status', 1)->limit(5)->get();
        $hotdeal = Product::where('hot_deals', 1)->latest()->limit(4)->get();
        $special_offer = Product::where('special_offer', 1)->limit(5)->get();
        $special_deal = Product::where('special_deal', 1)->latest()->limit(3)->get();
        $featured_product = Product::where('featured', 1)->get();
        $slider = Slider::where('status', 1)->limit(3)->get();
        $categoryParent = Category::where('parent_id', 0)->get();
        $skip_category_6 = Category::skip(4)->first();
        $skip_product_6 = Product::where('status', 1)->where('category_id', $skip_category_6->id)->get();
        // $skip_brand_8 = Brands::skip(8)->first();
        // $skip_product_8 = Product::where('status', 1)->where('brand_id', $skip_brand_8->id)->get();

        return view('frontend.index', compact('categoryParent', 'slider', 'product', 'featured_product', 'hotdeal', 'special_offer', 'special_deal', 'skip_category_6', 'skip_product_6'));
    }

    public function categoriesProduct($cat_id, $slug)
    {
        $categoryParent = Category::where('parent_id', 0)->get();
        $tagProduct = Product::where('status', 1)->where('category_id', $cat_id)->paginate();
        return view('frontend.common.categories', compact('categoryParent', 'tagProduct'));
    }

    public function tagProduct($tag)
    {
        $categoryParent = Category::where('parent_id', 0)->get();
        $tagProduct = Product::where('status', 1)->where('product_tag_en', $tag)->orWhere('product_tag_vn', $tag)->paginate(3);
        return view('frontend.tags.tags', compact('tagProduct', 'categoryParent'));
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function userProfile()
    {
        $categoryParent = Category::where('parent_id', 0)->get();
        $hotdeal = Product::where('hot_deals', 1)->latest()->limit(4)->get();
        $special_offer = Product::where('special_offer', 1)->limit(5)->get();
        $special_deal = Product::where('special_deal', 1)->latest()->limit(3)->get();
        $slider = Slider::where('status', 1)->limit(3)->get();
        $product = Product::where('status', 1)->limit(5)->get();
        $featured_product = Product::where('featured', 1)->get();
        $skip_category_6 = Category::skip(4)->first();
        $skip_product_6 = Product::where('status', 1)->where('category_id', $skip_category_6->id)->get();
        // $skip_brand_8 = Brands::skip(8)->first();
        // $skip_product_8 = Product::where('status', 1)->where('brand_id', $skip_brand_8->id)->get();
        $id = Auth::user()->id;
        $users = User::find($id);
        return view('frontend.user_profile', compact('users', 'categoryParent', 'hotdeal', 'special_offer', 'special_deal', 'slider', 'product', 'featured_product', 'skip_category_6', 'skip_product_6'));
    }

    public function userProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $fileName = date('Ymd') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $fileName);
            $data['profile_photo_path'] = $fileName;
        }
        $data->save();

        $notification = array(
            'message' => 'Updated successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function userChangePassword()
    {
        $categoryParent = Category::where('parent_id', 0)->get();
        $hotdeal = Product::where('hot_deals', 1)->latest()->limit(4)->get();
        $special_offer = Product::where('special_offer', 1)->limit(5)->get();
        $special_deal = Product::where('special_deal', 1)->latest()->limit(3)->get();
        $slider = Slider::where('status', 1)->limit(3)->get();
        $product = Product::where('status', 1)->limit(5)->get();
        $featured_product = Product::where('featured', 1)->get();
        $skip_category_6 = Category::skip(4)->first();
        $skip_product_6 = Product::where('status', 1)->where('category_id', $skip_category_6->id)->get();
        // $skip_brand_8 = Brands::skip(8)->first();
        // $skip_product_8 = Product::where('status', 1)->where('brand_id', $skip_brand_8->id)->get();
        $users = User::find(Auth::user()->id);
        return view('frontend.user_change_password', compact('users', 'categoryParent', 'hotdeal', 'special_offer', 'special_deal', 'slider', 'product', 'featured_product', 'skip_category_6', 'skip_product_6'));
    }

    public function userUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        } else {
            return redirect()->back();
        }
    }

    public function detailProduct($id, $slug)
    {
        $product = Product::findOrFail($id);
        $hotdeal = Product::where('hot_deals', 1)->latest()->limit(4)->get();
        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);
        $color_vn = $product->product_color_vn;
        $product_color_vn = explode(',', $color_vn);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);
        $size_vn = $product->product_size_vn;
        $product_size_vn = explode(',', $size_vn);

        $cat_id = $product->category_id;
        $related_product = Product::where('category_id', $cat_id)->where('id', '!=', $id)->get();

        $multiImg = MultiImg::where('product_id', $id)->get();
        return view('frontend.product.product_detail', compact('product', 'multiImg', 'product_color_en', 'product_color_vn', 'product_size_en', 'product_size_vn', 'related_product', 'hotdeal'));
    }

    public function modalProduct($id)
    {
        $product = Product::with('category', 'brand')->findOrFail($id);
        $color = $product->product_color_en;
        $product_color = explode(',', $color);
        $size = $product->product_size_en;
        $product_size = explode(',', $size);
        return response()->json([
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ]);
    }

    public function productSearch(Request $request)
    {
        $item = $request->search;
        $products = Product::where('product_name_en', 'LIKE', "%$item%")->paginate(3);
        $categoryParent = Category::where('parent_id', 0)->get();
        return view('frontend.product.search', compact('products', 'categoryParent'));
    }
}
