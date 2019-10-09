<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersProfil extends Model
{
    // protected $primaryKey = 'up_id';
    protected $fillable = [
        'up_type'
    ];
    protected $dates = ['up_created_at', 'up_updated_at'];
    const CREATED_AT = 'up_created_at';
    const UPDATED_AT = 'up_updated_at';

    public function users()
    {
        return $this->belongsToMany(User::class,'users_settings');
    }
}
