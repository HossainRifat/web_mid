<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bid extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function seller()
    {
        return $this->belongsTo(seller::class, 'seller_id', 'id');
    }

    public function post()
    {
        return $this->belongsTo(post::class, 'post_id', 'id');
    }
}
