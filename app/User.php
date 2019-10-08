<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    
    public function users_profils()
    {
        return $this->belongsToMany(UsersProfil::class)->withPivot('us_profil_id');
    }
}
