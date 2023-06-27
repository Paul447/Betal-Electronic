<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\admin\User;
use Exception;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
// use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;

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
        $request->validate([
            'password' => 'required|min:7|confirmed',
            'password_confirmation' => 'required',
            'email' => 'required|unique:users|email',
            'user_name' => ['required'],
            'contact' => 'required|numeric|unique:users|digits:10',
            'province' => 'required',
            'district' => 'required',
            'municipality' => 'required',
            'ward' => 'required',
        ]);

        $email = $request->email;
        $contact = $request->contact;
        $sql_email = User::select()->pluck('email');
        $sql_contact = User::select()->pluck('contact');

        if (in_array($email, $sql_email->toArray())) {
            session()->put('errormessage', 'Username Or Previously Exist');
            return redirect('/customerAdd/create');
        } elseif (in_array($contact, $sql_contact->toArray())) {
            session()->put('errormessage', 'Phone Number already Exist');
            return redirect('/customerAdd/create');
        }

        $password = Hash::make($request->password);

        $rand = mt_rand(10000, 99999);
        $insert = User::create(array_merge($request->all(), ['image' => 'avatar.svg', 'password' => $password, 'role' => 'user', 'user_status' => 'unverified', 'otp' => $rand]))->id;
        if ($insert) {
            try {
                $ismailsended = Mail::send('otp', ['name' => $request->user_name, 'otp' => $rand], function ($message) use ($request) {
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
            $ismailsended = Mail::send('otp', ['name' => $request->user_name, 'otp' => $rand], function ($message) use ($request) {
                $message->to($request->email);

                $message->subject('Login Credintial');
            });
            if ($ismailsended) {
                session()->put('id', $insert);
                session()->put('otpSend', 'Please Check The Gmail And Enter OTP!');
                return view('otpVerify');
            }
        }
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
            $image = $userDataObj['profile_imagee'];
            

            $sql_email = User::select()->pluck('email');

            if (in_array($email, $sql_email->toArray())) {
                $user = User::where(['email' => $email])
                    ->get()
                    ->first();
                $request->session()->put('customer', $user);
                session()->put('message', 'Logged In Successfully');
                return redirect('/');
            } else {
                $insert = User::create([
                    'user_name' => $name,
                    'email' => $email,
                    'password' => '',
                    'contact' => '',
                    'image' => $image,
                    'role' => 'user',
                    'user_status' => 'verified',
                    'province' => '1',
                    'district' => '1',
                    'municipality' => '1',
                    'ward' => '1',
                ])->id;
                $user = User::where(['id' => $insert])
                    ->get()
                    ->first();
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
        $user = User::where('id', '=', $id)
            ->get()
            ->first();

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
            'pass' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->uname, 'password' => $request->pass]) && Auth::guard()->user()->role == 'user') {
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

    public function forgot()
    {
        return view('resetpassword');
    }

    function generateOTP(Request $request)
    {


        $request->validate([
            // this will check if the input email exist in the data base

            // 'email' => 'email | required | exists:users',


            // this method will validate of all the email belongs to role user only.
            'email' => [
                'required',
                'email',
                Rule::exists('users')->where(function ($query) {
                    $query->where('role', 'user');
                }),
            ]
        ]);


        $user = User::where('email', $request->email)->get()->first();
        $user_id = $user->id;
        $name = $user->user_name;

        $rand = mt_rand(10000, 99999);
        try {
            Mail::send('forgot_password_otp', ['name' => $name, 'otp' => $rand], function ($message) use ($request) {
                $message->to($request->email)->subject('Verify Your Email');
            });

            $user->reset_password_otp = $rand;
            $user->save();

            // $user->update(['reset_password_otp'=>$rand]);

            return view('otpverifyfochangepass')->with(compact('user_id'));
            // return redirect('/customerLogin/verify');
        } catch (Exception $e) {
            echo "something went wrong, mail can't be sent";
        }
    }

    public function changepassconfirm(Request $request)
    {
        $user = User::find($request->user_id);

        $user_id = $user->id;

        if ($user->reset_password_otp == $request->otp) {
            $user->reset_password_otp = null;
            $user->retry = 3;
            $user->save();
            return view('changepassconfirm')->with(compact('user_id'));
        } else {
            session()->put('errormessage', 'Invalid OTP');
            $retry = $user->retry - 1;
            $user->retry = $retry;
            $user->save();
            if ($user->retry >= 0) {
                return view('otpverifyfochangepass')->with(compact('user_id', 'retry'));
            } else {
                $user->retry = 3;
                $user->save();
                return redirect('/customerLogin/forgot')->with(compact('user_id'));
            }
        }
    }

    function resetPassword(Request $request)
    {
        if ($request->password == $request->password_confirmation) {
            $user = User::find($request->user_id);
            $user->password = Hash::make($request->password);
            $user->save();

            try {
                Mail::send('password_reset', ['name' => $user->username], function ($message) use ($user) {
                    $message->to($user->email)->subject('Password Reset Successfully');
                });
            } catch (Exception $e) {
                echo "something went wrong, mail can't be sent";
            }

            session()->put('errormessage', "Password Reset Successfully");
            return redirect('/customerAdd');
        }
    }
}
