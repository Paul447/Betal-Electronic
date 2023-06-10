<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\admin\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = User::with('ds')->join('municipalities', 'users.municipality', 'municipalities.municipalities_id')
       ->join('districts', 'users.district', '=', 'districts.district_id')
       ->join('provinces', 'users.province', '=', 'provinces.province_id')
       ->where('role','=','Editor')->get();



        return view('admin.editor.vieweditor')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = "/admin/editor";
        $title = "Add Editor";
        $province = Province::all();
        $data = compact('url', 'title', 'province');
        return view('admin.editor.addeditor')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
        //         'name'=>'required|alpha_dash',
                 'email'=>'required|email|unique:users,email',
        //         'role' =>'required|alpha_dash',
        //         'contact'=>'required|numeric',
        //         'image'=> 'required|mimes:png,jpg,jpeg|max:2048',
        //           'password' => [
        //             'required',
        //             'string',
        //             'min:8',             // must be at least 8 characters in length
        //             'regex:/[a-z]/',      // must contain at least one lowercase letter
        //             'regex:/[A-Z]/',      // must contain at least one uppercase letter
        //             'regex:/[0-9]/',      // must contain at least one digit
        //             'regex:/[@$!%*#?&]/', // must contain a special character
        //         ],
        //         'province'=>'required|numeric',
        //         'district'=>'required|numeric',
        //         'municipality'=>'required|numeric',
        //         'ward'=>'required|numeric',
           ]

       );

        $picture = $request->file('image');
        if(!is_null($picture)){
       $filename=time()."." . $request->file('image')->getClientOriginalExtension();
        $isuploaded =  $request->file('image')->storeAs('public/editor',$filename);
        if($isuploaded){
            $rand = mt_rand(10000, 99999);
            $pass= "Mrit@" . $rand;
            $password = Hash::make($pass);
            $createdby=  session('user')['id'];

            $insert = User::create(array_merge($request->all(),['createdby'=>$createdby,'image'=>$filename,'password'=>$password]));
            if($insert){

                 $ismailsended = Mail::send('admin.editor.mail', ['name'=>$request->name,'email'=>$request->email,'password'=>$pass ,'role'=>$request->role], function ($message)  use ($request){

                   $message->to($request->email);

                   $message->subject('Login Credintial');

               });
               if($ismailsended){
                return redirect('/home');
               }
            }
        }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function viewadmin($id)
    {

               $data=  User::with('ds')->join('municipalities', 'users.municipality', 'municipalities.municipalities_id')
                 ->join('districts', 'users.district', '=', 'districts.district_id')
                 ->join('provinces', 'users.province', '=', 'provinces.province_id')
                 ->where('users.id','=',$id)
                 ->get();
                 return view('admin.editor.admindetails')->with(compact('data'));
    }
}
