<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $id =  Auth::user()->id;
        $data = Admin::find($id);
        // dd($data);
        return view('admin.admin_profile', compact('data'));
    }

    public function adminProfileEdit()
    {
        $id =  Auth::user()->id;
        $data = Admin::find($id);
        return view('admin.admin_profile_edit', compact('data'));
    }

    public function adminProfileStore(Request $request)
    {
        $id =  Auth::user()->id;
        $data = Admin::find($id);
        $data->name = $request->username;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));
            $fileName = 'upload/admin_images/' . date('Ymd')  . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/'), $fileName);
            $data['profile_photo_path'] = $fileName;
        }
        $data->save();

        $notification = array(
            'message' => 'Updated successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function adminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function adminUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        // $hashedPassword = Admin::find(1)->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $admin = Admin::find(Auth::id());
            // $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        } else {
            return redirect()->back();
        }
    }
}
