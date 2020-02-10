<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Month extends Model
{
    //
    use Sluggable,SluggableScopeHelpers;
    protected $table = "months";

    protected $fillable = ['titulo','state','slug','descripcion'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }

}

