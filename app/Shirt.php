<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Shirt extends Model
{
    use Sluggable;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function  sluggable(): array
    {
        return [
            'slug'=> [
                'source'=>'shirt_name',
                'onUpdate'=>true
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
