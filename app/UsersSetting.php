<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersSetting extends Model
{
    protected $primaryKey = 'us_id';
    protected $fillable = [
        'us_user_id','us_profil_id'
    ];
    protected $dates = ['us_created_at', 'us_updated_at'];
    const CREATED_AT = 'us_created_at';
    const UPDATED_AT = 'us_updated_at';
}
