<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Album extends Model
{
    //
    use Sluggable,SluggableScopeHelpers;
    protected $table = "albums";

    protected $fillable = ['id','titulo','state','slug','descripcion','portada'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    } 

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function images(){
        return $this->morphMany('App\Imagem', 'imagetable');
    }
}

