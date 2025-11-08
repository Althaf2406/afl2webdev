<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function galeri(Request $request)
    {
        if ($request->has('search')) {
            $galeriList = Galeri::where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('deskripsi', 'like', '%' . $request->search . '%')->paginate(6);
            return view('gallery', compact('galeriList'));
        } else {
            $galeriList = Galeri::paginate(6);
            return view('gallery', compact('galeriList'));
        }
    }

    public function store(Request $request)
    {

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->file('gambar')->store('gambargaleri', 'public')
        ]);

        return redirect('/galeri');
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $galeri->judul = $request->judul;
        $galeri->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('gallery', 'public');
            $galeri->gambar = $path;
        }

        $galeri->save();

        return redirect('/galeri');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        if ($galeri->gambar && file_exists(storage_path('app/public/storage/gambargaleri/' . $galeri->gambar))) {
            unlink(storage_path('app/public/storage/gambargaleri/' . $galeri->gambar));
        }

        $galeri->delete();

        return redirect("/galeri");
    }
}
