<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Event extends Model
{
    //
    use Sluggable,SluggableScopeHelpers;
    protected $table = "events";

    protected $fillable = ['id','state','title','date','time','place','descripcion','price','user_id'];

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

