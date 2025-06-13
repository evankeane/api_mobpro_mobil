<?php

namespace App\Http\Controllers;
use App\Models\Crypto;


use Illuminate\Http\Request;

class CryptoApi extends Controller
{
    public function index(Request $request)
    {
        $auth = $request->header('Authorization');

        $data = Crypto::all();

        return response()->json($data);
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
            'message' => 'Crypto API store method called'
        ]);
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
            'message' => "Crypto API update method called for ID: $id"
        ]);
    }

    public function destroy($id)
    {
        $crypto = Crypto::findOrFail($id);
        $crypto->delete();

        return response()->json([
            'status' => 'success',
            'message' => "Crypto API destroy method called for ID: $id"
        ]);
    }
}
