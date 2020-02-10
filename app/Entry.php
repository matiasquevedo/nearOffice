<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Laravelista\Comments\Commentable;

class Entry extends Model
{
    //
    use Sluggable,SluggableScopeHelpers, Commentable;
    protected $table = "entries";

    protected $fillable = ['id','state','title','slug','descripcion','user_id','category_id'];

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

    public function category(){
      return $this->belongsTo('App\Category');
    }
}


