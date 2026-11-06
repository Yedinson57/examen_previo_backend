<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modulo;

class ModuloController extends Controller
{
    public function index(){

        $modulos = Modulo::all();
        return response()->json($modulos);

    }

    public function store(Request $request){

        $modulos = Modulo::create($request->all());
        return response()->json($modulos);

    }

    public function show ($id){

        $modulos = Modulo::findOrFail($id);
        return response()->json($modulos);
        
    }

    public function update(Request $request, Modulo $modulo){

        $modulo->update($request->all());
        return response()->json($modulo);

    }

    public function destroy(Modulo $modulo)
    {
        $modulo->delete();
        return response()->json($modulo);
    }
}
