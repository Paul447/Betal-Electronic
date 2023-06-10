<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\admin\User;

class UserController extends Controller
{

    function login(Request $req){

        $user  = User::where(['email' => $req->uname ])->first();
        if($user=='' || !hash::check($req->pass, $user->password ))
        {

            $req->session()->put('logerror','incorrect Username or password');
            return redirect('/login');
        }

        else{
            if(  $user->role =='Admin' || $user->role =='Editor' || $user->role =='SuperAdmin')
            {
                $req->session()->put('user',$user);
                return redirect('/home');
            }
            else
            {
                $req->session()->put('logerror','incorrect Username or password');
                return redirect('/login');
            }


        }
      }
      function viewprofile($id)
      {
        $data = User::with('ds')->join('municipalities', 'users.municipality', 'municipalities.municipalities_id')
        ->join('districts', 'users.district', '=', 'districts.district_id')
        ->join('provinces', 'users.province', '=', 'provinces.province_id')
        ->where('users.id','=',$id)->get();
        return view('admin.profile.viewprofile')->with(compact('data'));
      }
      function editprofile($id)
      {

      }
      function logout(Request $req)
      {
       $req->session()->flush();
       return redirect('/login');


      }
}
