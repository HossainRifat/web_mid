<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class all_user extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;

    public function logged_session()
    {
        return $this->hasMany(login::class, 'all_users_id', 'id');
    }
}
