<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationMail;
use App\Mail\SellerHistoryMail;
use App\Mail\TestMail;
use App\Models\bid;
use App\Models\seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SellerEmailController extends Controller
{
    public function sendMail()
    {
        $mail = session()->get('user');
        $code = "2761";
        $details = [
            'title' => 'Confirmation Mail',
            'url' => 'https://www.mail.google.com',
            'code' => $code

        ];

        //return $details;
        Mail::to($mail)->send(new RegistrationMail($details));

        return $code;
    }
    public function sendConfirmation()
    {
        $mail = session()->get('user');
    }
    public function historyMail()
    {
        $email = session()->get('user');
        $seller = seller::where('email', $email)->first();
        $orders = bid::where('seller_id', $seller->id)->get();
        //echo "<pre>";
        //print_r($orders);
        return view('seller.orders')->with('orders', $orders);

        //return $details;
        Mail::to($email)->send(new SellerHistoryMail($orders));

        return view('seller.orders')->with('orders', $orders);
    }
}
