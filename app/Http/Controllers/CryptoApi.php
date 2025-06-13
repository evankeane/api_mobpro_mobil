<?php

namespace App\Http\Controllers;
use App\Models\Crypto;


use Illuminate\Http\Request;

class CryptoApi extends Controller
{
    public function index(Request $request)
    {
        $auth = $request->header('Authorization');
        if ($auth) {
            $data = Crypto::where('Authorization', $auth)->get();
        } else {
            $data = Crypto::all();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Item berhasil ditampilkan.',
            'data' => $data
        ], 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Crypto::create([
            'Authorization' => $request->header('Authorization'),
            'nama' => $request->nama,
            'harga' => $request->harga,
            'foto' => $request->file('foto')->store('crypto_images', 'public'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Item berhasil ditambahkan.',
            'data' => 'success',
        ], 200);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $crypto = Crypto::findOrFail($id);
        $crypto->nama = $request->nama;
        $crypto->harga = $request->harga;
        if ($request->hasFile('foto')) {
            $crypto->foto = $request->file('foto')->store('crypto_images', 'public');
        }
        $crypto->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Item berhasil diperbarui.',
            // 'data' => $item
        ], 200);
    }

    public function destroy($id)
    {
        $crypto = Crypto::findOrFail($id);
        $crypto->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Semua item berhasil dimuat.',
            'data' => $items
        ], 200);
    }
}
