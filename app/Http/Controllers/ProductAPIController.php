<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductAPIController extends Controller
{
    public function list()
    {
        $products = product::all();
        return $products;
    }
}
