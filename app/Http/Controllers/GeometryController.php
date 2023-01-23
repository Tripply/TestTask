<?php

namespace App\Http\Controllers;

use App\Models\Geometry;
use Illuminate\Http\Request;

class GeometryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $geometry = Geometry::select(["geometry__of__objects__of__evaluation.id","object_id", "Cadastral_Number", Geometry::raw("ST_AsGeoJSON(geometry__of__object__of__evaluation) AS geom")])->
        join('object__of__evaluations','object__of__evaluations.id', '=', 'geometry__of__objects__of__evaluation.object_id')->get();


        return view('geometry.index',compact('geometry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ObjId=$_GET['id'];
        return view('geometry.create',compact('ObjId'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Geometry::insert([
            'object_id' => $request->object_id,
            'geometry__of__object__of__evaluation' => Geometry::raw('st_point('.$request->geometry__of__object__of__evaluation.')')
        ]);

        return redirect('geometry');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $geometry = Geometry::select(["geometry__of__objects__of__evaluation.id", "Cadastral_Number", Geometry::raw("ST_AsGeoJSON(geometry__of__object__of__evaluation) AS geom")])->
        join('object__of__evaluations','object__of__evaluations.id', '=', 'geometry__of__objects__of__evaluation.object_id')->where('geometry__of__objects__of__evaluation.id','=',$id)->get();


        return view('geometry.show',compact('geometry'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $geometry = Geometry::select(["geometry__of__objects__of__evaluation.id","object_id", "Cadastral_Number", Geometry::raw("ST_AsGeoJSON(geometry__of__object__of__evaluation) AS geom")])->
        join('object__of__evaluations','object__of__evaluations.id', '=', 'geometry__of__objects__of__evaluation.object_id')->where('object_id','=',$id)->get();

        return view('geometry.edit')->with('geometry', $geometry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $geometry = Geometry::find($id);
        $input = $request->all();

        Geometry::where('id', $geometry->id)->update([
            'object_id'=> $_GET['id'],
            'geometry__of__object__of__evaluation' =>Geometry::raw('st_point('.$request->geometry__of__object__of__evaluation.')')
    ]);

        return redirect('geometry')->with('flash_message', 'geometry Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Geometry::destroy($id);
        return redirect('geometry');
    }
}
