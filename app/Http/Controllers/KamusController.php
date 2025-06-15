<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamus;

class KamusController extends Controller
{
    public function index(Request $request)
    {
        $auth = $request->header('Authorization');
        if ($auth) {
            $data = Kamus::where('Authorization', $auth)->get();
        } else {
            $data = Kamus::all();
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bahasaIndonesia' => 'required|string|max:255',
            'bahasaInggris' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('kamus_images', 'public');
        }

        Kamus::create([
            'Authorization' => $request->header('Authorization'),
            'bahasaIndonesia' => $request->bahasaIndonesia,
            'bahasaInggris' => $request->bahasaInggris,
            'gambar' => isset($gambarPath) ? $gambarPath : null,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Item berhasil ditambahkan.',
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bahasaIndonesia' => 'required|string|max:255',
            'bahasaInggris' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $kamus = Kamus::findOrFail($id);
        $kamus->bahasaIndonesia = $request->bahasaIndonesia;
        $kamus->bahasaInggris = $request->bahasaInggris;

        if ($request->hasFile('gambar')) {
            $kamus->gambar = $request->file('gambar')->store('kamus_images', 'public');
        }

        $kamus->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Item berhasil diperbarui.',
        ], 200);
    }

    public function destroy($id)
    {
        $kamus = Kamus::findOrFail($id);
        $kamus->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Item berhasil dihapus.',
        ], 200);
    }
}
