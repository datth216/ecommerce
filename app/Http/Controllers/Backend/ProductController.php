<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\MultiImg;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Recursive;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    private $category;

    function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recursive($data);
        $htmlOption = $recusive->categoryRecursive($parentId);
        return $htmlOption;
    }

    public function addProduct()
    {
        $brands = Brands::all();
        $htmlOption = $this->getCategory($parentId = '');
        return view('backend.product.add', compact('htmlOption', 'parentId', 'brands'));
    }

    public function storeProduct(Request $request)
    {
        if (empty($request->input('product_code'))) {
            $str_code = Str::random(10);
        } else {
            $str_code = $request->product_code;
        }
        $image = $request->file('product_thumbnail');
        $name_image = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_image);
        $save_url = 'upload/products/thumbnail/' . $name_image;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'product_name_en' => $request->product_name_en,
            'product_name_vn' => $request->product_name_vn,
            'product_slug_en' => Str::slug($request->product_name_en),
            'product_slug_vn' => Str::slug($request->product_name_vn),
            'product_code' => $str_code,
            'product_qty' => $request->product_qty,
            'product_tag_en' => $request->product_tag_en,
            'product_tag_vn' => $request->product_tag_vn,
            'product_size_en' => $request->product_size_en,
            'product_size_vn' => $request->product_size_vn,
            'product_color_en' => $request->product_color_en,
            'product_color_vn' => $request->product_color_vn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_vn' => $request->short_desc_vn,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_vn' => $request->long_desc_vn,
            'product_thumbnail' => $save_url,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deal' => $request->special_deal,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $name_multi_image = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-images/' . $name_multi_image);
            $url = 'upload/products/multi-images/' . $name_multi_image;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $url,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Add Product Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('list.product')->with($notification);
    }

    public function editProduct($id)
    {
        $multi_image = MultiImg::where('product_id', $id)->get();
        $product = Product::findOrFail($id);
        $htmlOption = $this->getCategory($product->category_id);
        $brands = Brands::get();
        return view('backend.product.edit', compact('product', 'htmlOption', 'brands', 'multi_image'));
    }

    public function listProduct()
    {
        $product = Product::latest()->get();
        return view('backend.product.list_product', compact('product'));
    }

    public function updateDataProduct(Request $request)
    {
        $product_id = $request->id;
        if (empty($request->input('product_code'))) {
            $str_code = Str::random(10);
        } else {
            $str_code = $request->product_code;
        }
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'product_name_en' => $request->product_name_en,
            'product_name_vn' => $request->product_name_vn,
            'product_slug_en' => Str::slug($request->product_name_en),
            'product_slug_vn' => Str::slug($request->product_name_vn),
            'product_code' => $str_code,
            'product_qty' => $request->product_qty,
            'product_tag_en' => $request->product_tag_en,
            'product_tag_vn' => $request->product_tag_vn,
            'product_size_en' => $request->product_size_en,
            'product_size_vn' => $request->product_size_vn,
            'product_color_en' => $request->product_color_en,
            'product_color_vn' => $request->product_color_vn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_vn' => $request->short_desc_vn,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_vn' => $request->long_desc_vn,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deal' => $request->special_deal,
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Update Data Product Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('list.product')->with($notification);
    }

    public function ImageProduct(Request $request)
    {
        $product_id = $request->id;
        $old_img = $request->old_image;
        unlink($old_img);
        $image = $request->file('product_thumbnail');
        $name_image = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_image);
        $save_url = 'upload/products/thumbnail/' . $name_image;

        Product::findOrFail($product_id)->update([
            'product_thumbnail' => $save_url,
        ]);

        $notification = array(
            'message' => 'Update Image Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    public function MultiImageProduct(Request $request)
    {
        $imgs = $request->multi_img;
        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $name_image = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-images/' . $name_image);
            $save_url = 'upload/products/multi-images/' . $name_image;

            MultiImg::where('id', $id)->update([
                'updated_at' => Carbon::now(),
                'photo_name' => $save_url,
            ]);
        }
        $notification = array(
            'message' => 'Update Images Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteMultiImageProduct($id)
    {
        $old_img = MultiImg::findOrFail($id);
        unlink($old_img->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Delete Image Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function inActiveProduct($id)
    {
        Product::findOrFail($id)->update([
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Inactive now',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
    }

    public function activeProduct($id)
    {
        Product::findOrFail($id)->update([
            'status' => 1,
        ]);
        $notification = array(
            'message' => 'Active now',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $imgs = MultiImg::where('product_id', $id)->get();
        foreach ($imgs as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }
        $notification = array(
            'message' => 'Product Delete Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
