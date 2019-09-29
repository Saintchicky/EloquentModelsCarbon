<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agences extends Model
{
    protected $primaryKey = 'ag_id';
    protected $fillable = [
        'ag_nom','ag_cp'
    ];
}
