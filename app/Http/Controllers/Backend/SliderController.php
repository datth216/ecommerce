<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function listSliders()
    {
        $slider = Slider::latest()->get();
        return view('backend.slider.list_slider', compact('slider'));
    }

    public function storeSliders(Request $request)
    {
        $request->validate([
            'slider_img' => 'required',
        ],
            [
                'slider_img.required' => 'Please choose your image',
            ]);

        $image = $request->file('slider_img');
        $name_img = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/sliders/' . $name_img);
        $url = 'upload/sliders/' . $name_img;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 1,
            'slider_img' => $url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Add Slider Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function editSliders($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('sliders'));
    }

    public function updateSliders(Request $request, $id)
    {
        $old_img = $request->old_image;
        if ($request->file('slider_img')) {
            unlink($old_img);
            $image = $request->file('slider_img');
            $name_image = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/sliders/' . $name_image);
            $save_url = 'upload/sliders/' . $name_image;

            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Update Slider Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('list.sliders')->with($notification);
        } else {
            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Update Slider Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('list.sliders')->with($notification);
        }
    }

    public function deleteSliders(Request $request, $id)
    {
        $img = Slider::findOrFail($id);
        $imgDel = $img->slider_img;
        unlink($imgDel);
        Slider::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Delete Slider Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function inActiveSliders($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Inactive now',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
    }

    public function activeSliders($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 1,
        ]);
        $notification = array(
            'message' => 'Active now',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
