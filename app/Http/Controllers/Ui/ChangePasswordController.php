<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function index()
    {
        if (Session()->has('customer')) {
            return view('changepassword');
        }else{
            abort(404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => 'required | min:6',
            'confirm_password' => 'required | min:6 | same:new_password'
        ]);

        User::find($request->user_id)->update(['password' => Hash::make($request->new_password)]);
        session()->put('uisuccess', 'Password Changed Successfully');
        return redirect('/');
    }
}
