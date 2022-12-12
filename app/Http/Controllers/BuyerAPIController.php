<?php

namespace App\Http\Controllers;

use App\Models\buyer;
use Illuminate\Http\Request;

class BuyerAPIController extends Controller
{
    public function list()
    {
        $buyers = buyer::all();
        return $buyers;
    }
}
