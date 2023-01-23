<?php

namespace App\Http\Controllers;

use App\Models\Geometry;
use App\Models\ObjectEv;
use Illuminate\Http\Request;

class SelectObjectController extends Controller
{
    public function index()
    {
        $objects=ObjectEv::select()->whereNotExists(function($query){
            $query->select(Geometry::raw(1))
                  ->from('geometry__of__objects__of__evaluation')
                  ->whereRaw('geometry__of__objects__of__evaluation.object_id=object__of__evaluations.id');
        })->get();
        if ($_GET['id'] == "add") {
            return view('geometry.selectcreate', compact('objects'));
        }
        if ($_GET['id'] != null){
            return view('geometry.selectedit', compact('objects'));
        }
    }
}
