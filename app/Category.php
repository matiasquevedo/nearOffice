<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Model
{
    //
    use Sluggable,SluggableScopeHelpers;
    protected $table = "categories";

    protected $fillable = ['id','name','slug'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    } 

    public function entries(){
      return $this->hasMany('App\Entry');
    }
}


