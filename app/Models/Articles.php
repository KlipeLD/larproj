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
    use HasFactory;
    protected  $guarded =[];

    public function path()
    {
        return route('articles.show',$this);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class)->withTimestamps();
    }
}
