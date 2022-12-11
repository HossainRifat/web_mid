<?php

namespace App\Http\Controllers;

use App\Models\bid;
use App\Models\seller;
use App\Models\Token;
use App\Models\order;
use App\Models\post;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class SellerAPIController extends Controller
{
    public function APIRegister(Request $request)
    {
        $seller = new seller();
        $seller->first_name = $request->first_name;
        $seller->last_name = $request->last_name;
        $seller->email = $request->email;
        $seller->phone = $request->phone;
        $seller->address = $request->address;
        $seller->gender = $request->gender;
        $seller->dob = $request->dob;
        $seller->status = "registered";
        $seller->password = $request->password;

        if ($request->hasFile('nid')) {
            $imageName = time() . '_nid_' . $seller->email . '_' . $request->file('nid')->getClientOriginalName();
            $request->nid->move(base_path('public\assets\uploads'), $imageName);
            $seller->nid = $imageName;
        }


        if ($request->hasFile('passport')) {
            $imageName = time() . '_passport_' . $seller->email . '_' . $request->file('passport')->getClientOriginalName();
            $request->passport->move(base_path('public\assets\uploads'), $imageName);
            $seller->passport = $imageName;
        }


        if ($request->hasFile('bin')) {
            $imageName = time() . '_bin_' . $seller->email . '_' . $request->file('bin')->getClientOriginalName();

            $request->bin->move(base_path('public\assets\uploads'), $imageName);
            $seller->documents = $imageName;
        }

        if ($request->hasFile('account')) {
            $imageName = time() . '_account_' . $seller->email . '_' . $request->file('account')->getClientOriginalName();

            $request->account->move(base_path('public\assets\uploads'), $imageName);
            $seller->account = $imageName;
        }

        if ($request->hasFile('photo')) {
            $imageName = time() . '_profile_' . $seller->email . '_' . $request->file('photo')->getClientOriginalName();
            $request->photo->move(base_path('public\assets\uploads'), $imageName);
            $seller->photo = $imageName;
        }
        echo "<pre>";

        $seller->save();
        $code = Route('/sendmail');
        return $code;
    }

    public function APILogin(Request $r)
    {

        $user = Seller::where('email', $r->email)->where('password', $r->password)->first();

        if ($user) {
            session()->put('user', $user->email);
            $api_token = Str::random(64);
            $token = Token::find($user->id);
            if (!$token) {
                $token = new Token();
                //return "not token";
            }
            $token->id = $user->id;
            $token->token = $api_token;
            $token->created_at = date('h:i:s A m/d/Y', strtotime(date('h:i:s A m/d/Y')));
            $token->save();
            return $token;
        }
        return "No user found";
    }
    public function APILogout(Request $request)
    {

        $token = Token::where('token', $request->token)->first();
        if ($token) {
            $token->expired_at = date('h:i:s A m/d/Y', strtotime(date('h:i:s A m/d/Y')));
            $token->save();
            return $token;
        }
    }

    public function APIOrders($id)
    {

        $seller = Seller::where('id', $id)->first();


        // $email = session()->get('user');
        $seller = Seller::where('email', $seller->email)->first();
        $orders = order::where('seller_id', $seller->id)->get();
        //echo "<pre>";
        //print_r($orders);
        return $orders;
    }
    public function APIProfile(Request $request)
    {
        $token = $request->header("Authorization");
        $token = json_decode($token);
        $seller = Seller::where('id', $token->sellerId)->first();


        return $seller;
    }

    public function APIBids($id)
    {

        $bids = Bid::where('seller_id', $id)->get();
        return $bids;
    }

    public function APIDashboard($id)
    {

        $seller = Seller::where('id', $id)->first();
        $bids = Bid::where('seller_id', $seller->id)->get();
        $orders = Order::where('seller_id', $seller->id)->get();
        $posts = post::all();
        $total = count($orders);
        $total2 = count($posts);
        $total3 = count($bids);
        $data = ["orders" => $total, "posts" => $total2, "bids" => $total3];
        return response()->json($data);
    }
}
