<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersProfil extends Model
{
    protected $primaryKey = 'up_id';
    protected $fillable = [
        'up_type'
    ];
    protected $dates = ['up_created_at', 'up_updated_at'];
    const CREATED_AT = 'up_created_at';
    const UPDATED_AT = 'up_updated_at';

    public function users()
    {
        // Paramètre : public function belongsToMany($related, $table = null, $foreignKey = null, $otherKey = null, $relation = null)
        return $this->belongsToMany(User::class,'users_settings','us_user_id','us_profil_id')->withTimestamps('us_created_at','us_updated_at');
    }
}
