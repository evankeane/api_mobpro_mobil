<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanaman;
use Illuminate\Support\Facades\Log;

class TanamanController extends Controller
{
    public function index(Request $request)
    {
        $auth = $request->header('Authorization');
        // Tambahkan field 'mine' pada setiap data jika Authorization cocok
        $data = Tanaman::all()->map(function ($item) use ($auth) {
            $item->mine = ($item->Authorization === $auth) ? 1 : 0;
            return $item;
        });
        // return response()->json($data);
        // $data = Tanaman::all();
        return response()->json($data);
    }


    public function store(Request $request)
    {

        Log::info('Request all :', $request->all());
        $auth = $request->header('Authorization');
        $request->validate([
            'nama_tanaman' => 'required|string|max:255',
            'nama_latin' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Log::info('Authorization Header: ' . $auth);

        if ($request->hasFile('gambar')){
            $path = $request->file('gambar')->store('images', 'public');
            // $tanaman->gambar = $path;
        }

        Tanaman::create([
            'Authorization' => $auth,
            'nama_tanaman' => $request->nama_tanaman,
            'nama_latin' => $request->nama_latin,
            'gambar' => $path ?? null, // Use the path if it exists
        ]);
        // $tanaman = new Tanaman();
        // $tanaman->Authorization = $auth;
        // $tanaman->nama_tanaman = $request->nama_tanaman;
        // $tanaman->nama_latin;

        // $tanaman->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Tanaman berhasil ditambahkan',
        ], 200);
    }

    public function update(Request $request, $id)
    {
        Log::info('Update Request all :', $request->all());
        $tanaman = Tanaman::find($id);
        if (!$tanaman) {
            return response()->json(['message' => 'Tanaman tidak ditemukan'], 404);
        }

        $request->validate([
            'nama_tanaman' => 'sometimes|required|string|max:255',
            'nama_latin' => 'sometimes|required|string|max:255',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->has('nama_tanaman')) {
            $tanaman->nama_tanaman = $request->nama_tanaman;
        }
        if ($request->has('nama_latin')) {
            $tanaman->nama_latin = $request->nama_latin;
        }
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $tanaman->gambar = $path;
        }
        $tanaman->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Tanaman berhasil diperbarui',
        ], 200);
    }

    public function destroy($id)
    {
        $tanaman = Tanaman::find($id);
        if (!$tanaman) {
            return response()->json(['message' => 'Tanaman tidak ditemukan'], 404);
        }

        $tanaman->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Tanaman berhasil dihapus',
        ], 200);
    }
}
