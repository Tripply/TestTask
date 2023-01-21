<?php

namespace App\Http\Controllers;

use App\Models\Object_Of_Evaluation;
use Illuminate\Http\Request;


class ObjectController extends Controller
{
    public function index(){
        $object=Object_Of_Evaluation::find(1);
        dd($object);
       
    }
}
