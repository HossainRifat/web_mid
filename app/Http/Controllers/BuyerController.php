<?php

namespace App\Http\Controllers;

use App\Mail\ValidationEmail;
use App\Models\all_user;
use App\Models\bid;
use App\Models\buyer;
use App\Models\login;
use App\Rules\AgeRule;
use App\Rules\ChangePassRule;
use App\Rules\EmailRule;
use App\Rules\FileSaveRule;
use App\Rules\PhoneRule;
use Egulias\EmailValidator\Result\ValidEmail;
use Faker\Core\File;
use Illuminate\Auth\Events\Login as EventsLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


use function PHPUnit\Framework\isNull;
use function Symfony\Component\VarDumper\Dumper\esc;

class dashBoardModel
{
    var $user;
    var $post;
    var $order;
    var $checkout;
    var $money;
    var $activeOrder;
    var $myPost;
}

class securityModel
{
    var $user;
    var $login;
}

class bidModel
{
    var $seller;
    var $postId;
    var $postTitle;
    var $date;
    var $amount;
}

class BuyerController extends Controller
{
    public function RegistrationSubmit(Request $request)
    {

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'email' => $request->email,
            'address' => $request->address,
            // 'password' => $request->password,
            'photo' => "none",
        ];
        $jsonData = json_encode($data);
        session()->put("reg1", $jsonData);
        session()->put("email", $request->email);
        session()->save();

        $validation_id = Str::random(32);
        // session()->forget("validation_id");
        // session()->put("validation_id", $validation_id);
        // session()->save();


        $details = [
            'title' => 'Welcome form RMG SOlution.',
            'url' => 'http://localhost:3000/buyer/registration2/' . $validation_id . '',
            'o_details' => $validation_id
        ];
        // return $details;

        Mail::to($request->email)->send(new ValidationEmail($details));

        // return Redirect::to("https://mail.google.com/mail/");

        return response($validation_id, 200);
    }

    public function Registration02(Request $request)
    {
        //dd($request->id, session()->get('validation_id'));
        if ($request->id == session()->get("validation_id")) {
            return view('buyer.registration02');
        } else {
            return redirect()->route("Home");
        }
    }

    public function Registration02Submit(Request $request)
    {


        if ($request->passport) {
            $data = [
                'nid' => $request->nid,
                'passport' => $request->passport,
                'phone' => $request->phone,
                'account' => "none",
                'documents' => NULL,
            ];
        } else {
            $data = [
                'nid' => $request->nid,
                'phone' => $request->phone,
                'account' => "none",
                'documents' => NULL,
                'passport' => NULL,
            ];
        }

        $jsonData = json_encode($data);
        //         //dd($jsonData);
        session()->put("reg2", $jsonData);
        session()->save();
        return response("data saved", 200);
    }

    // if ($request->account) {
    //     $filename = date("d-m-Y_H-i-s") . '_account_' . session()->get('email') . '.' . $request->account->extension();
    //     $filePath = $request->file('account')->storeAs('uploads', $filename, 'public');
    //     $filePath2 = NULL;
    //     if ($request->documents) {
    //         $filename2 = date("d-m-Y_H-i-s") . '_documents_' . session()->get('email') . '.' . $request->documents->extension();
    //         $filePath2 = $request->file('documents')->storeAs('uploads', $filename2, 'public');
    //     }
    //     if ($filePath) {
    //         if ($filePath2) {

    //             if ($request->passport) {
    //                 $data = [
    //                     'nid' => $request->nid,
    //                     'passport' => $request->passport,
    //                     'phone' => $request->phone,
    //                     'account' => $filename,
    //                     'documents' => $filePath2,
    //                 ];
    //             } else {
    //                 $data = [
    //                     'nid' => $request->nid,
    //                     'phone' => $request->phone,
    //                     'account' => $filename,
    //                     'documents' => $filePath2,
    //                     'passport' => "NULL",
    //                 ];
    //             }
    //         } else {
    //             if ($request->passport) {
    //                 $data = [
    //                     'nid' => $request->nid,
    //                     'passport' => $request->passport,
    //                     'phone' => $request->phone,
    //                     'account' => $filename,
    //                     'documents' => "NULL",
    //                 ];
    //             } else {
    //                 $data = [
    //                     'nid' => $request->nid,
    //                     'phone' => $request->phone,
    //                     'account' => $filename,
    //                     'documents' => "NULL",
    //                     'passport' => "NULL",
    //                 ];
    //             };
    //         }

    //         $jsonData = json_encode($data);
    //         //dd($jsonData);
    //         session()->put("reg2", $jsonData);
    //         session()->save();
    //         //dd(session()->get('reg2'), session()->get('reg1'));

    //         return redirect()->route('Registration03');
    //     } else {
    //         return redirect()->route('Registration02');
    //     }
    // }

    public function Registration03()
    {
        return view('buyer.registration03');
    }

    public function Registration03Submit(Request $data)
    {
        // $jsondata = session()->get('reg1');
        // $data = json_decode($jsondata);
        // //return response($jsondata,200);
        // $jsondata2 = session()->get('reg2');
        // $data2 = json_decode($jsondata2);
        //  return response($data,200);

        $hash_password = Hash::make($data->password);

        $buyer = new buyer();
        $buyer->first_name = $data->first_name;
        $buyer->last_name = $data->last_name;
        $buyer->dob = $data->dob;
        $buyer->gender = $data->gender;
        $buyer->email = $data->email;
        $buyer->address = $data->address;
        $buyer->password = $hash_password;
        $buyer->photo = "none";

        $buyer->nid = $data->nid;
        $buyer->passport = $data->passport;
        $buyer->phone = $data->phone;
        $buyer->account = "none";
        $buyer->documents = "none";
        $buyer->status = "invalid";
        //return response($buyer,200);
        $buyer->save();

        $user = new all_user();
        $user->email = $data->email;
        $user->password = $hash_password;
        $user->entity = "buyer";
        $user->save();

        return response("Data inserted");
    }

    public function BuyerDashboard(Request $request)
    {
        $buyer = buyer::where("email", "rh140035@gmail.com")->first();
        if ($buyer) {
            $d = new dashBoardModel();
            $checkout = 0;
            $money = 0;
            $active_order = 0;
            if ($buyer->my_order) {
                foreach ($buyer->my_order as $item) {
                    $checkout += count($item->my_checkout);
                    $money += (int)$item->price;
                    if ($item->status != "done") {
                        $active_order += 1;
                    }
                }
            }
            $bid_info = array();
            $b = new bidModel();
            $i = 0;
            foreach ($buyer->my_post as $item) {
                if ($item->bid) {
                    foreach ($item->bid as $item2) {
                        if ($item2->status == "post") {
                            $b->seller = $item2->seller->first_name . " " . $item2->seller->last_name;
                            $b->postId = $item->id;
                            $b->postTitle = $item->title;
                            $b->amount = $item2->price;
                            $b->date = $item2->bid_date;
                            $bid_info[$i] = $b;
                            $i++;
                        }
                    }
                }
            }
            $d->user = $buyer;
            $d->post = count($buyer->my_post);
            $d->order = count($buyer->my_order);
            $d->checkout = $checkout;
            $d->money = $money;
            $d->activeOrder = $active_order;
            $d->myPost = $bid_info;
            //dd($buyer);
            $data = json_encode($d);
            return response($data, 200);
        } else {
            return response("Invalid Buyer", 401);
        }
    }

    public function Logout()
    {

        $user = login::where('token', session()->get("token"))->first();
        if ($user) {
            $user->logout_time = date('h:i:s A m/d/Y', strtotime(date('h:i:s A m/d/Y')));
            $user->save();
        }

        session()->forget("token");
        session()->forget("email");
        session()->forget("entity");
        session()->forget("id");
        Cookie::queue(Cookie::forget("token"));

        return redirect()->route("Login");
    }

    public function RemoveAccount()
    {
        $user = login::where('token', session()->get("token"))->first();
        if ($user) {
            $user->logout_time = date('h:i:s A m/d/Y', strtotime(date('h:i:s A m/d/Y')));
            $user->save();

            all_user::where("email", session()->get("email"))->delete();
        }


        session()->forget("token");
        session()->forget("email");
        session()->forget("entity");
        session()->forget("id");
        Cookie::queue(Cookie::forget("token"));

        return redirect()->route("Home");
    }

    public function Profile(Request $request)
    {
        $token = $request->header("Authorization");
        $token = json_decode($token);
        // return response($token,200);
        if ($token) {
            $check_token = login::where('token', $token->access_token)->where("logout_time", NULL)->first();
            if ($check_token) {
                $user = all_user::where("id", $check_token->all_users_id)->first();
                if ($user) {
                    $buyer = buyer::where("email", $user->email)->first();
                    if ($buyer) {
                        return response($buyer, 200);
                    } else {
                        return response("Invalid Buyer", 401);
                    }
                }
            }
        }
    }

    public function ProfileSubmit(Request $data)
    {

        $buyer = buyer::where('email', session()->get("email"))->first();

        if ($data->email == session()->get("email")) {

            $this->validate(
                $data,
                [
                    "first_name" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:1", "max:50"],
                    "last_name" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:1", "max:50"],
                    "dob" => ["required", "date", new AgeRule],

                    "email" => ["required", "email"],
                    "address" => ["required", "regex:/^[#.0-9a-zA-Z\s,-]+$/i", "min:3", "max:1000"],
                    "nid" => ["required", "max:50"],
                    "passport" => ["max:50"],
                    "phone" => ["required", "max:50"],

                ]
            );

            if ($buyer) {
                $buyer->first_name = $data->first_name;
                $buyer->last_name = $data->last_name;
                $buyer->dob = $data->dob;
                $buyer->address = $data->address;
                $buyer->nid = $data->nid;
                $buyer->passport = $data->passport;
                $buyer->phone = $data->phone;
                $buyer->save();
                return redirect()->route("Profile", "get");
            }
        } else {
            $this->validate(
                $data,
                [
                    "first_name" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:1", "max:50"],
                    "last_name" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:1", "max:50"],
                    "dob" => ["required", "date", new AgeRule],

                    "email" => ["required", "email", new EmailRule],
                    "address" => ["required", "regex:/^[#.0-9a-zA-Z\s,-]+$/i", "min:3", "max:1000"],
                    "nid" => ["required", "max:50"],
                    "passport" => ["max:50"],
                    "phone" => ["required", "max:50"],

                ]
            );

            if ($buyer) {
                $buyer->first_name = $data->first_name;
                $buyer->last_name = $data->last_name;
                $buyer->dob = $data->dob;
                $buyer->address = $data->address;
                $buyer->email = $data->email;
                $buyer->nid = $data->nid;
                $buyer->passport = $data->passport;
                $buyer->phone = $data->phone;
                $buyer->save();

                $all_user = all_user::where('email', session()->get("email"))->first();
                $all_user->email = $data->email;
                $all_user->save();

                session()->forget("email");
                session()->put("email", $data->email);
                session()->save();

                return redirect()->route("Profile", "get");
            }
        }
    }

    public function Security(Request $request)
    {
        $token = $request->header("Authorization");
        $token = json_decode($token);
        // return response($token,200);
        if ($token) {
            $check_token = login::where('token', $token->access_token)->where("logout_time", NULL)->first();
            if ($check_token) {
                $user = all_user::where("id", $check_token->all_users_id)->first();

                if ($user) {
                    $user2 = login::where("all_users_id", $user->id)->where("logout_time", NULL)->get();
                    $buyer = buyer::where('email', $user->email)->first();
                    if ($buyer) {
                        $s = new securityModel();
                        $s->user = $buyer;
                        $s->login = $user2;
                        $data = json_encode($s);
                        return response($data, 200);
                    }
                }
            }
        }
    }

    public function SessionLogout(Request $request)
    {
        $user = login::where('token', $request->id)->first();
        if ($user) {
            $user->logout_time = date('h:i:s A m/d/Y', strtotime(date('h:i:s A m/d/Y')));
            $user->save();
            return redirect()->route("Security");
        } else {
            return redirect()->route("Login");
        }
    }

    public function ChangePass(Request $request)
    {
        $token = $request->header("Authorization");
        $token = json_decode($token);
        // return response($token,200);
        if ($token) {
            $check_token = login::where('token', $token->access_token)->where("logout_time", NULL)->first();
            if ($check_token) {
                $user = all_user::where("id", $check_token->all_users_id)->first();

                if ($user) {
                    $buyer = buyer::where('email', $user->email)->first();
                    if ($buyer) {


                        if (Hash::check($request->oldPassword, $buyer->password)) {
                            $buyer->password = Hash::make($request->newPassword);
                            $buyer->save();

                            $user->password = Hash::make($request->newPassword);
                            $user->save();
                            return response("Changed", 200);
                        } else {
                            return response("Password not match", 203);
                        }
                    } else {
                        return response("invalid", 401);
                    }
                } else {
                    return response("invalid", 401);
                }
            } else {
                return response("invalid", 401);
            }

            // $user = buyer::where('email', session()->get("email"))->first();
            // $all_user = all_user::where('email', session()->get("email"))->first();

            // $hash_pass = Hash::make($request->password);
            // if ($user) {
            //     $user->password = $hash_pass;
            //     $user->save();

            //     $all_user->password = $hash_pass;
            //     $all_user->save();
            //     return redirect()->route("BuyerDashboard");
            // } else {
            //     return redirect()->route("Login");
            // }
        }
        return response("nit", 401);
    }

    public function ValidationEmail()
    {
        // dd("here");
        $validation_id = Str::random(32);
        session()->forget("validation_id");
        session()->put("validation_id", $validation_id);
        session()->save();
        $myEmail = session()->get("email");

        $details = [
            'title' => 'Welcome form RMG SOlution.',
            'url' => 'http://127.0.0.1:8000/registration02/buyer/' . $validation_id . '',
            'o_details' => $validation_id
        ];
        // return $details;

        Mail::to($myEmail)->send(new ValidationEmail($details));

        return Redirect::to("https://mail.google.com/mail/");
    }
}
