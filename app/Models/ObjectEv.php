<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectEv extends Model
{
    use HasFactory;
    protected $table = "object__of__evaluations";
    protected $guarded = false;
    public $timestamps = false;
}
