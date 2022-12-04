<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function my_checkout()
    {
        return $this->hasMany(checkout::class, 'order_id', 'id');
    }
}
