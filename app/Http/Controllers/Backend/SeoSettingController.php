<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    public function seoSetting(){
        $seo_setting = SeoSetting::find(1);
        return view('backend.setting.seo-setting', compact('seo_setting'));
    }

    public function updateSeoSetting(Request $request, $id){
        SeoSetting::findOrFail($id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
        ]);

        $notification = array(
            'message' => 'Update Seo Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
