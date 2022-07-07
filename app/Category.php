<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{

    public function shirts()
    {
        return $this->hasMany(Shirt::class);
    }
    use Sluggable;

    public function  sluggable(): array
    {
        return [
            'slug'=> [
                'source'=>'name',
                'onUpdate'=>true
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
