<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandsController extends Controller
{
    public function listBrands()
    {
        $brands = Brands::latest()->get();
        return view('backend.brand.list_brand', compact('brands'));
    }

    public function storeBrands(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_vn' => 'required',
            'brand_image' => 'required',
        ],
            [
                'brand_name_en.required' => 'Please input your brand name',
                'brand_name_vn.required' => 'Please input your brand name',
            ]);

        $image = $request->file('brand_image');
        $name_image = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brands/' . $name_image);
        $save_url = 'upload/brands/' . $name_image;

        Brands::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_vn' => $request->brand_name_vn,
            'brand_slug_en' => Str::slug($request->brand_name_en),
            'brand_slug_vn' => Str::slug($request->brand_name_vn),
            'brand_image' => $save_url
        ]);

        $notification = array(
            'message' => 'Add Brand Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function editBrands($id)
    {
        $brands = Brands::findOrFail($id);
        return view('backend.brand.edit', compact('brands'));
    }

    public function updateBrands(Request $request, $id)
    {
        $old_image = $request->old_image;
        if ($request->file('brand_image')) {
            unlink($old_image);
            $image = $request->file('brand_image');
            $name_image = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brands/' . $name_image);
            $save_url = 'upload/brands/' . $name_image;

            Brands::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_vn' => $request->brand_name_vn,
                'brand_slug_en' => Str::slug($request->brand_name_en),
                'brand_slug_vn' => Str::slug($request->brand_name_vn),
                'brand_image' => $save_url
            ]);

            $notification = array(
                'message' => 'Update Brand Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('list.brands')->with($notification);
        } else {
            Brands::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_vn' => $request->brand_name_vn,
                'brand_slug_en' => Str::slug($request->brand_name_en),
                'brand_slug_vn' => Str::slug($request->brand_name_vn),
            ]);

            $notification = array(
                'message' => 'Update Brand Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('list.brands')->with($notification);
        }
    }

    public function deleteBrands($id)
    {
        $brands = Brands::findOrFail($id);
        $img = $brands->brand_image;
        unlink($img);

        Brands::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Delete Brand Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}