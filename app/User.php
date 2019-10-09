<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  
        /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [

        'name', 'email', 'password',

    ];

 

    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    protected $hidden = [

        'password', 'remember_token',

    ];

 

    /**

     * The roles that belong to the user.

     */

    
    public function users_profils()
    {
        return $this->belongsToMany(UsersProfil::class,'users_settings','user_id','profil_id');
    }
}
