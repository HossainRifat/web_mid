<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buyer extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function my_post()
    {
        return $this->hasMany(post::class, 'buyer_id', 'id');
    }
    public function my_order()
    {
        return $this->hasMany(order::class, 'buyer_id', 'id');
    }
}
