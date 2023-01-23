<?php

namespace App\Http\Controllers;

use App\Models\Geometry;
use Illuminate\Http\Request;

class JsonGeometryController extends Controller
{
    public function index(){
        return Geometry::all();
    }
}
