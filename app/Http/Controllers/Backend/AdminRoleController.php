<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminRoleController extends Controller
{
    public function allRole()
    {
        $admin = Admin::where('type', 2)->latest()->get();
        return view('backend.role.all_admin', compact('admin'));
    }

    public function addAdminRole()
    {
        return view('backend.role.add_admin');
    }

    public function storeAdminRole(Request $request)
    {
        $image = $request->file('profile_photo_path');
        $name_gen = uniqid() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
        $save_url = 'upload/admin_images/' . $name_gen;

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'profile_photo_path' => $save_url,

            'brands' => $request->brands,
            'category' => $request->category,
            'product' => $request->product,
            'sliders' => $request->sliders,
            'coupons' => $request->coupons,

            'setting' => $request->setting,
            'orders' => $request->orders,
            'reports' => $request->reports,
            'users' => $request->users,
            'user_role' => $request->user_role,
            'type' => 2,

            'created_at' => Carbon::now(),


        ]);

        $notification = array(
            'message' => 'Admin Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.role')->with($notification);
    }

    public function editAdminRole($id)
    {
        $admin = Admin::findOrFail($id);
        return view('backend.role.edit_admin', compact('admin'));
    }

    public function updateAdminRole(Request $request, $id)
    {
        $old_image = $request->old_image;
        if ($request->file('profile_photo_path')) {
            unlink($old_image);
            $image = $request->file('profile_photo_path');
            $name_image = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_image);
            $save_url = 'upload/admin_images/' . $name_image;

            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'profile_photo_path' => $save_url,

                'brands' => $request->brands,
                'category' => $request->category,
                'product' => $request->product,
                'sliders' => $request->sliders,
                'coupons' => $request->coupons,

                'setting' => $request->setting,
                'orders' => $request->orders,
                'reports' => $request->reports,
                'users' => $request->users,
                'user_role' => $request->user_role,
                'type' => 2,

                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Update Admin Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('admin.role')->with($notification);
        } else {
            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,

                'brands' => $request->brands,
                'category' => $request->category,
                'product' => $request->product,
                'sliders' => $request->sliders,
                'coupons' => $request->coupons,

                'setting' => $request->setting,
                'orders' => $request->orders,
                'reports' => $request->reports,
                'users' => $request->users,
                'user_role' => $request->user_role,
                'type' => 2,

                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Update Admin Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('admin.role')->with($notification);
        }
    }

    public function deleteAdminRole($id)
    {
        $img = Admin::findOrFail($id);
        $delete_img = $img->profile_photo_path;
        unlink($delete_img);

        Admin::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Delete Admin Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.role')->with($notification);
    }
}
