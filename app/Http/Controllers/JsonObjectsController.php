<?php

namespace App\Http\Controllers;

use App\Models\ObjectEv;
use Illuminate\Http\Request;

class JsonObjectsController extends Controller
{
    public function index(){
        return ObjectEv::all();
    }
}
