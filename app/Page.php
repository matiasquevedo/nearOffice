<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Page extends Model
{
    //
    use Sluggable,SluggableScopeHelpers;
    protected $table = "pages";

    protected $fillable = ['id','state','nav','home','title','slug','descripcion','user_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    } 

    public function user(){
      return $this->belongsTo('App\User');
    }


}

