<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'link' => [
                'source' => 'name'
            ]
        ];
    }
}
