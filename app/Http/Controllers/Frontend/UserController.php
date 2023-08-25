<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function updateUserDetails(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $request->username,
            'email' => $request->email
        ]);
        $user->userDetail()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'phone' => $request->phone,
                'address' => $request->address,
                'pincode' => $request->pincode,
            ]
        );
        toastr()->success('User Details Updated!');
        return redirect()->route('myaccount');
    }


    public function changePassword()
    {
        return view('pages.frontend.masterpage.myaccount.changepassword');
    }

    public function updateChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if ($currentPasswordStatus) {

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            toastr()->success('Password Updated Successfully!');
            return redirect()->back();
        } else {
            toastr()->success('Current Password does not match with Old Password!');

            return redirect()->back();
        }
    }
}
