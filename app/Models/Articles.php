<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    /*public function getRouteKeyName()
    {
        return parent::getRouteKeyName();
    }*/
    protected  $guarded =[];

    public function path()
    {
        return route('articles.show',$this);
    }
    //use HasFactory;
}
