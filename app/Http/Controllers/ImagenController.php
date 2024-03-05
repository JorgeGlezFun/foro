<?php

namespace App\Http\Controllers;


use App\Models\Imagen;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('imagenes.index', ['imagenes'=>Imagen::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('imagenes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Esto en teoria es un copia y pega, pero recuerda hacer el siguiente comando:
        // composer require intervention/image
        // Tambien hay que hacer el php artisan storage:link

        $image = $request->file('url');
        $name = hash('sha256', time() . $image->getClientOriginalName()) . ".png";
        $image->storeAs('uploads/url', $name, 'public');

        $manager = new ImageManager(new Driver());
        $imageR = $manager->read(Storage::disk('public')->get('uploads/url/' . $name));
        $imageR->scaleDown(200); //cambiar esto para ajustar el reescalado de la imagen
        $rute = Storage::path('public/uploads/url/' . $name);
        $imageR->save($rute);

        Imagen::create([
            'nombre' => $request->nombre,
            'url' => 'storage/uploads/url/' . $name,
        ]);
        return redirect()->route('imagenes.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Imagen $imagen)
    {
        return view('imagenes.show', ['imagen'=>$imagen]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imagen $imagen)
    {
        return view('imagenes.edit', ['imagen' => $imagen]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imagen $imagen)
    {
        $image = $request->file('url');
        $name = hash('sha256', time() . $image->getClientOriginalName()) . ".png";
        $image->storeAs('uploads/url', $name, 'public');

        $manager = new ImageManager(new Driver());
        $imageR = $manager->read(Storage::disk('public')->get('uploads/url/' . $name));
        $imageR->scaleDown(200); //cambiar esto para ajustar el reescalado de la imagen
        $rute = Storage::path('public/uploads/url/' . $name);
        $imageR->save($rute);

        $imagen->update([
            'nombre' =>$request->nombre,
            'url' => 'storage/uploads/url/' . $name,
        ]);
        return redirect()->route('imagenes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imagen $imagen)
    {
        Imagen::destroy([$imagen->id]);
        return redirect()->route('imagenes.index');
    }
}
