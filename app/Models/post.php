<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(buyer::class, 'buyer_id', 'id');
    }

    public function bid()
    {
        return $this->hasMany(bid::class, 'post_id', 'id');
    }
}
