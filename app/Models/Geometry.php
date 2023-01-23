<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geometry extends Model
{
    use HasFactory;
    protected $table = "geometry__of__objects__of__evaluation";
    protected $guarded = false;
    public $timestamps = false;
    protected $casts = [
        'geom' => 'array',
    ];
}
