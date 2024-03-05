<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('publicaciones.index', ['publicaciones'=>Publicacion::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publicaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Publicacion::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
        ]);
        return redirect()->route('publicaciones.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Publicacion $publicacion)
    {
        return view('publicaciones.show', ['publicacion'=>$publicacion]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publicacion $publicacion)
    {
        return view('publicaciones.edit', ['publicacion' => $publicacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publicacion $publicacion)
    {
        $publicacion->update([
            'titulo' =>$request->titulo,
            'contenido' => $request->contenido
        ]);
        return redirect()->route('publicaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicacion $publicacion)
    {
        Publicacion::destroy([$publicacion->id]);
        return redirect()->route('publicaciones.index');
    }
}
