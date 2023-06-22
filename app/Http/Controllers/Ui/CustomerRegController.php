<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\admin\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class CustomerRegController extends Controller
{

    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province = Province::all();
        $data = compact('province');
        return view('customerAdd')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // $picture = $request->file('image');
        // if (!is_null($picture)) {
        //     $filename = time() . "." . $request->file('image')->getClientOriginalExtension();
        //     $isuploaded =  $request->file('image')->storeAs('public/editor', $filename);
        //     if ($isuploaded) {

        $password = Hash::make($request->password);

        $rand = mt_rand(10000, 99999);
        $insert = User::create(array_merge($request->all(), ['image' => "avatar.svg", 'password' => $password, 'role' => 'user', 'user_status' => 'unverified', 'otp' => $rand]))->id;
        if ($insert) {

            try {
                $ismailsended = Mail::send('otp', ['name' => $request->user_name, 'otp' => $rand], function ($message)  use ($request) {

                    $message->to($request->email);

                    $message->subject('Login Credintial');
                });
                if ($ismailsended) {
                    session()->put('id', $insert);
                    session()->put('otpSend', 'Please Check The Gmail And Enter OTP!');
                    return view('otpVerify');
                }
            } catch (Exception $e) {
                echo "Something went wrong, mail can't be sent";
            }
            // $ismailsended = Mail::send('otp', ['name' => $request->user_name, 'otp' => $rand], function ($message)  use ($request) {

            //     $message->to($request->email);

            //     $message->subject('Login Credintial');
            // });
            if ($ismailsended) {
                session()->put('id', $insert);
                session()->put('otpSend', 'Please Check The Gmail And Enter OTP!');
                return view('otpVerify');
            }
        }
        //     }
        // }
    }
    public function google_auth(Request $request)
    {
        $cookie = $request->query('cookie');

        if (isset($cookie)) {
            $userDataObj = [];
            $userDataPairs = explode('; ', $cookie);
            foreach ($userDataPairs as $pair) {
                $parts = explode('=', $pair);
                $key = $parts[0];
                $value = isset($parts[1]) ? $parts[1] : '';
                $userDataObj[$key] = $value;
            }

            $name = $userDataObj['profile_namee'];
            $email = $userDataObj['emaill'];

            $sql_email = User::select()->pluck("email");

            if (in_array($email,  $sql_email->toArray())) {
                $user  = User::where(['email' => $email])->get()->first();
                $request->session()->put('customer', $user);
                session()->put('message', 'Logged In Successfully');
                return redirect('/');
            } else {
                $insert =   User::create([
                    'user_name' => $name,
                    'email' => $email,
                    'password' => '',
                    'contact' => '',
                    'image' => '',
                    'role' => 'user',
                    'user_status' => 'verified',
                    'province' => '1',
                    'district' => '1',
                    'municipality' => '1',
                    'ward' => '1',
                ])->id;
                $user  = User::where(['id' => $insert])->get()->first();
                $request->session()->put('customer', $user);
                session()->put('message', 'Registered Successfully');
                return redirect('/');
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
    public function otpverify(Request $request)
    {
        $id = session('id');
        $user = User::where('id', '=', $id)->get()->first();

        if ($user->otp != $request->otp) {
            session()->put('otperror', 'OTP Does not Match Check Your Mail And Try Again');
            return view('otpVerify');
        } else {
            $request->session()->put('customer', $user);
            $find = User::find($id);
            session()->put('Registered', 'Your Account Registered Successfully');
            $find->update(['user_status' => 'verified', 'otp' => '']);
            return redirect('/');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'uname' => 'required | email',
            'pass' => 'required'
        ]);

        if (auth()->attempt(['email' => $request->uname, 'password' => $request->pass]) && Auth::guard()->user()->role == "user") {
            $user = Auth::guard()->user();
            if ($user->user_status == 'verified') {
                $request->session()->put('customer', $user);
                session()->put('message', 'Logged In Successfully');
                return redirect('/');
            } else {
                session()->put('id', $user->id);
                return view('otpverify');
            }
        } else {
            $request->session()->put('logerror', 'Incorrect Username or Password!');
            return redirect('/customerAdd');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
