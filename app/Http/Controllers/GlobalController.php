<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GlobalController extends Controller
{
    public function Home()
    {
        return view('home');
    }

    public function Registration(Request $request)
    {

        return view('registration')->with("name", $request->id);
    }

    public function Test()
    {
        $name = gethostname();
        return view('test')->with("name", $name);
    }

    public function TestSub(Request $r)
    {
        $g = '$2y$10$BKHHIzvISXP3Kx4giFCj9eGSOQuODbLHcawx4urDf93AfXVuRQptG';
        $var = Hash::make($r->pass);
        $len = Str::length($g);
        $or = Hash::check($r->pass, $g);
        dd($r->pass, $var, $or, $len);
    }
}
