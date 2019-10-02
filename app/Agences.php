<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agences extends Model
{
    protected $primaryKey = 'ag_id';
    protected $fillable = [
        'ag_nom','ag_cp'
    ];
    protected $dates = ['ag_created_at', 'ag_updated_at'];
    const CREATED_AT = 'ag_created_at';
    const UPDATED_AT = 'ag_updated_at';
}
