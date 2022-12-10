<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostAPIController extends Controller
{
    public function APIList()
    {
        return post::all();
    }
    public function APIDetails($id)
    {
        return post::find($id);
    }
    public function APIPostBid($id)
    {
    }
}
