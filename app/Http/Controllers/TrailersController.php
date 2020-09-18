<?php

namespace App\Http\Controllers;

use App\Trailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrailersController extends Controller
{

    public function index()
    {
        $trailer = Trailer::all();
        return $trailer;
    }

    public function store(Request $request)
    {
        $trailer = new Trailer();
        $trailer->nombre = $request->nombre;
        $trailer->sinopsis = $request->sinopsis;
        $trailer->estreno = $request->estreno;
        $trailer->director = $request->director;
        $trailer->musica = $request->musica;
        $trailer->protagonistas = $request->protagonistas;
        $trailer->genero = $request->genero;

        if ($request->hasFile('imagen')) $trailer->imagen = $request->file('imagen')->move('storage/images');
        else $trailer->imagen = $request->imagen;

        if ($request->hasFile('video')) $trailer->video = $request->file('video')->move('storage/videos');
        else $trailer->video = $request->video;

        $trailer->save();
        return $trailer;
    }

    public function show($id)
    {
        $trailer = Trailer::findOrFail($id);
        return $trailer;
    }

    public function destroy($id)
    {
        $trailer = Trailer::find($id);
        $trailer->delete();
    }
}