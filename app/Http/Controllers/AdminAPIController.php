<?php

namespace App\Http\Controllers;

use App\Mail\success;
use App\Models\ad_token;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class AdminAPIController extends Controller
{
    public function adminLogin(Request $request)
    {


        $user = admin::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $api_token = Str::random(64);

                $token = new ad_token();
                $token->user_id = $user->id;
                $token->token_ad = $api_token;
                $token->created_at = date('h:i:s A m/d/Y', strtotime(date('h:i:s A m/d/Y')));
                //return $token;
                $token->save();
                return $token;
            }
            return "No user found";
        }
    }


    public function profile(Request $request)
    {
        // $admin = Admin::all();
        // return $admin;

        $token = $request->header("Authorization");

        $token = json_decode($token);

        if ($token) {

            $check_token = ad_token::where('token_ad', $token->access_token)->where("expired_at", NULL)->first();
            // return $check_token;
            if ($check_token) {
                $admin = admin::where('id', $check_token->user_id)->first();


                if ($admin) {

                    return $admin;
                }
            }
        }
    }
    public function adminRegistration(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'gender' => 'required',

            'phone' => 'required',
            'nid' => 'required',
            'passport' => 'required',
            'dob' => 'required',
            'password' => 'required|min:5|max:12',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // return response($request, 200);

        $admin = new admin();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->address = $request->address;
        $admin->dob = $request->dob;
        $admin->phone = $request->phone;
        $admin->gender = $request->gender;
        $admin->passport = $request->passport;
        $admin->nid = $request->nid;

        $admin->password = Hash::make($request->password);
        $admin->photo = "none";

        $admin->save();
        // Mail::to($request->email)->send(new ValidationEmail($details));
        Mail::to($request->email)->send(new success($request->first_name));
        return response("done", 200);
    }

    public  function email(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email|unique:admins',
                'password' => 'required|min:5|max:12',
                'first_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'gender' => 'required',

                'phone' => 'required',
                'nid' => 'required',
                'passport' => 'required',
                'dob' => 'required',
                'password' => 'required|min:5|max:12',
                'photo' => 'required',
            ],
            []
        );



        $user = new Admin();
        $user->first_name = $request->first_name;
        if ($user) {
            Mail::to($request->email)->send(new success("adminRegistration", $request->first_name));
            return back();
        }
    }






    // public function loginSubmit(Request $request)
    // {
    //     $admins = Admin::where('email', $request->email)->where('password', $request->password)->first();
    //     if ($admins) {
    //         session()->put('LoginId', $admins->email);
    //         if ($request->remember) {
    //             setcookie('remember', $request->email, time() + 36000);
    //             Cookie::queue('name', $admins->email, time() + 60);
    //         }
    //         return redirect()->route('profile');
    //     }
    //     return redirect()->route('adminlogin');
    // }


    public function logout(Request $request)
    {
        $admintoken = $request->header("Authorization");

        $admintoken = json_decode($admintoken);

        $token = ad_token::where('token_ad', $admintoken->access_token)->first();

        if ($token) {
            $token->expired_at = date('h:i:s A m/d/Y', strtotime(date('h:i:s A m/d/Y')));
            $token->save();
            return "Logout";
        }
    }
}
