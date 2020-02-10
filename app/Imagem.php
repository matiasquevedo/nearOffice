<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    //
    protected $table = "images";

    protected $fillable = ['id','image','thumb'];

    public function imagetable(){
            return $this->morphTo();
	}
}

