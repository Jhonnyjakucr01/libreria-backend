<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\libros;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    public function index()
    {
        try {
            $libross = libros::all();
            return response()->json([
                'status' => 'success',
                'data' => $libross,
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
            $libros = libros::find($id);
            return response()->json([
                'status' => 'success',
                'data' => $libros,
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
            $libros = libros::create($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $libros,
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
            $libros = libros::findOrFail($id);
            $libros->update($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $libros,
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
