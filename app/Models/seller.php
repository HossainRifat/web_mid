<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function company()
    {
        return $this->hasOne(company::class, 'seller_id', 'id');
    }
}
