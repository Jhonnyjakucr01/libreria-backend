<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Miembros;
use Illuminate\Http\Request;

class MiembrosController extends Controller
{
    public function index()
    {
        try {
            $miembros = Miembros::all();
            return response()->json([
                'status' => 'success',
                'data' => $miembros,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $miembro = Miembros::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $miembro,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'correo' => 'required|email|unique:miembros,correo',
            ]);

            $miembro = Miembros::create($request->only(['nombre', 'correo']));
            return response()->json([
                'status' => 'success',
                'data' => $miembro,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $miembro = Miembros::findOrFail($id);

            $request->validate([
                'nombre' => 'sometimes|string|max:255',
                'correo' => "sometimes|email|unique:miembros,correo,{$id}",
            ]);

            $miembro->update($request->only(['nombre', 'correo']));
            return response()->json([
                'status' => 'success',
                'data' => $miembro,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $miembro = Miembros::findOrFail($id);
            $miembro->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Miembro eliminado correctamente',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    }
}
