<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function handleLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (! Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {

            $notification = [
                'message' => 'Invalid username or password',
                'alert-type' => 'error',
            ];

            return redirect('/admin/login')->with($notification);
        }

        return redirect()->route('admin.dashboard');
    }

    public function changePassword()
    {
        return view('admin.password');
    }

    public function storePassword(Request $request)
    {
        /** @var \App\Models\Admin $user */
        $user = Auth::guard('admin')->user();

        $validated = $request->validate([
            'currentpassword' => 'required|string',
            'newpassword' => 'required|string|min:8|max:16|different:currentpassword',
            'confirmpassword' => 'required|string|same:newpassword',
        ]);

        if (! Hash::check($request->currentpassword, $user->password)) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => 'Current password is incorrect',
            ]);
        }

        $user->password = Hash::make($validated['newpassword']);
        $user->save();

        Auth::guard('admin')->logout();
        session()->flush();

        return redirect()->route('admin.login')->with([
            'alert-type' => 'success',
            'message' => 'Password updated successfully. Please login again.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
