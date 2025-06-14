<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index(Request $request){
        $auth = $request->header('Authorization');
        if ($auth) {
            $data = Berita::where('Authorization', $auth)->get();
        } else {
            $data = Berita::all();
        }

        return response()->json($data);
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Berita::create([
            'Authorization' => $request->header('Authorization'),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $request->file('image')->store('berita_images', 'public'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berita berhasil ditambahkan.',
        ], 200);
    }

    public function update(Request $request, $id){
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $berita = Berita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($berita->image) {
                \Storage::disk('public')->delete($berita->image);
            }
            $berita->image = $request->file('image')->store('berita_images', 'public');
        }
        $berita->save();

        return response()->json([
            'status' => 'success',
            'message' => "Berita berhasil diperbarui untuk ID: $id"
        ], 200);

    }

    public function destroy($id){
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return response()->json([
            'status' => 'success',
            'message' => "Berita berhasil dihapus untuk ID: $id"
        ], 200);
    }
}
