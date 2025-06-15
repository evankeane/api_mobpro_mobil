<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    public function index(Request $request){
        $auth = $request->header('Authorization');
        if ($auth) {
            $data = Mobil::where('Authorization', $auth)->get();
        } else {
            $data = Mobil::all();
        }

        return response()->json($data);
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Mobil::create([
            'Authorization' => $request->header('Authorization'),
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'image' => $request->file('image')->store('mobil_images', 'public'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Mobil berhasil ditambahkan.',
        ], 200);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $mobil = Mobil::findOrFail($id);
        $mobil->nama = $request->nama;
        $mobil->deskripsi = $request->deskripsi;

        if ($request->hasFile('image')) {
            $mobil->image = $request->file('image')->store('mobil_images', 'public');
        }

        $mobil->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Mobil berhasil diperbarui.',
        ], 200);
    }

    public function destroy($id){
        $mobil = Mobil::findOrFail($id);
        $mobil->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Mobil berhasil dihapus.',
        ], 200);
    }
}
