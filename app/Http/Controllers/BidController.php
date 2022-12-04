<?php

namespace App\Http\Controllers;

use App\Models\bid;
use App\Models\order;
use App\Models\post;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function ConfirmBid(Request $request)
    {
        $bid = bid::where("id", $request->id)->first();
        $bid->buyer_id = session()->get("id");
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
        $order->buyer_id = session()->get("id");
        $order->status = "1";
        // dd($order);
        $order->save();

        return redirect()->route("BuyerDashboard");
    }
}
