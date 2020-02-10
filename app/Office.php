<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    //
    protected $table = 'offices';

    protected $fillable = ['name','state','mp','descripcion','capacidad','ubicacion','latitude','longitude','locality','subAdministrativeArea'];

}

