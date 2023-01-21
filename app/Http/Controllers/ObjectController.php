<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Object_Of_Evaluation;

class ObjectController extends Controller
{
    public function index(){
        $object=Object_Of_Evaluation::find(2);
        dd($object->Address);
    }
}
