<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Cloudinary\Cloudinary;

class AlumnoController extends Controller
{
    public function index(){

        $alumnos = Alumno::all();
        return response()->json($alumnos);

    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nac' => 'required|date',
            'expediente' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'modulo_id' => 'required|exists:modulos,id',
        ]);

        $file = $request->file('imagen');

        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key' => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => ['secure' => true],
        ]);

        $resultado = $cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder' => 'alumnos',
                'resource_type' => 'image',
            ]
        );

        $alumnos = Alumno::create([
            'expediente' => $request->expediente,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'fecha_nac' => $request->fecha_nac,
            'imagen_url' => $resultado['secure_url'],
            'imagen_public_id' => $resultado['public_id'],
            'modulo_id' => $request->modulo_id,
        ]);

        return response()->json([
            'message' => 'Alumno creado correctamente',
            'data' => $alumnos,
        ], 201);
    }

    public function show ($id){

        $alumnos = Alumno::findOrFail($id);
        return response()->json($alumnos);
    }

    public function update(Request $request, Alumno $alumno){
        $alumno->update($request->all());
        return response()->json($alumno);

    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return response()->json($alumno);
    }
}
