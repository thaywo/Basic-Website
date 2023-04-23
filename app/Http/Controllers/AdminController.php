<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'You have successfully Logged Out',
            'alert-type' => 'success',
        );

        return redirect('/login')->with($notification);
    }

    public function profile()
    {
        $userId = Auth::user()->id;
        $adminData = User::find($userId);
        return view('admin.admin_profile_view', compact('adminData'));
    }

public function editprofile()
{
    $userId = Auth::user()->id;
    $userEdit = User::find($userId);
    return view('admin.admin_profile_edit', compact('userEdit'));
}

public function storeprofile(Request $request)
{
     $userId = Auth::user()->id;
    $data = User::find($userId);
    $data->name = $request->name;
    $data->email = $request->email;
    $data->username = $request->username;
    if ($request->file('profile_image')) {
        $file = $request->file('profile_image');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'),$filename);
        $data['profile_image'] = $filename;
    }

    $data->save();

    $notification = array(
        'message' => $data->name . ' ' .'Profile Updated Succssfully',
        'alert-type' => 'success'
    );
    return redirect()->route('admin.profile')->with($notification);
}

public function editpassword()
{
   return view('admin.admin_change_password');
}

public function storepassword(Request $request)
{
    $validateData = $request->validate([
        'oldpassword' => 'required',
        'newpassword' => 'required',
        'confirm_password' => 'required|same:newpassword',
    ]);
    $hashedPassword = Auth::user()->password;
    if (Hash::check($request->oldpassword, $hashedPassword)) {
        $users = User::find(Auth::id());
        $users->password = bcrypt($request->newpassword);
        $users->save();

        $notification = array(
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.profile')->with($notification);
    }
    else {
        $notification = array(
            'message' => 'Some info are not correct',
            'alert-type' => 'info',
        );

        return redirect()->route('admin.profile')->with($notification);
    }
}
}
