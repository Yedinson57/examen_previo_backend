<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;

class ProfesorController extends Controller
{
    public function index(){

        $profesores = Profesor::all();
        return response()->json($profesores);

    }

    public function store(Request $request){

        $profesores = Profesor::create($request->all());

        return response()->json($profesores);

    }

    public function show ($id){

        $profesores = Profesor::findOrFail($id);
        return response()->json($profesores);
        
    }

    public function update(Request $request, Profesor $profesor){

        $profesor->update($request->all());
        return response()->json($profesor);

    }

    public function destroy(Profesor $profesor)
    {
        $profesor->delete();
        return response()->json($profesor);
    }
}
