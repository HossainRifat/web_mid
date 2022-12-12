<?php

namespace App\Http\Controllers;

use App\Models\all_user;
use App\Models\bid;
use App\Models\buyer;
use App\Models\login;
use App\Models\order;
use App\Models\post;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function ConfirmBid(Request $request)
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

                        $bid = bid::where("id", $request->id)->first();
                        $bid->buyer_id = $buyer->id;
                        $bid->save();

                        $post = post::where("id", $bid->post->id)->first();
                        $post->status = "done";
                        $post->save();

                        $order = new order();
                        $order->title = $post->title;
                        $order->description = $post->description;
                        $order->quantity = $bid->quantity;
                        $order->price = $bid->price;
                        $order->order_date = date('h:i:s A d-m-Y', strtotime(date('h:i:s A d-m-Y')));
                        $order->delivery_date = $bid->delivery_date;
                        $order->seller_id = $bid->seller_id;
                        $order->buyer_id = $buyer->id;
                        $order->status = "1";
                        // dd($order);
                        $order->save();
                        return response("order placed", 200);
                    } else {
                        return response("Invalid Buyer", 401);
                    }
                }
            }
        }
    }
}
