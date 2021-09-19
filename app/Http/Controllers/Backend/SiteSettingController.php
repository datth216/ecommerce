<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class SiteSettingController extends Controller
{
    public function siteSetting()
    {
        $setting = SiteSetting::find(1);
        return view('backend.setting.site-setting', compact('setting'));
    }

    public function updateSiteSetting(Request $request)
    {
        $setting_id = $request->id;
        $old_image = $request->old_image;
        if ($request->file('logo')) {
            unlink($old_image);
            $image = $request->file('logo');
            $name_image = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(139, 96)->save('upload/logo/' . $name_image);
            $save_url = 'upload/logo/' . $name_image;

            SiteSetting::findOrFail($setting_id)->update([
                'phone_1' => $request->phone_1,
                'phone_2' => $request->phone_2,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'logo' => $save_url,
            ]);

            $notification = array(
                'message' => 'Update Site Successfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else {
            SiteSetting::findOrFail($setting_id)->update([
                'phone_1' => $request->phone_1,
                'phone_2' => $request->phone_2,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
            ]);

            $notification = array(
                'message' => 'Update Site Successfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }
}
