<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gunung;
use Illuminate\Support\Facades\Log;

class GunungController extends Controller
{
    public function index(Request $request){
        // Log::info('requst all', $request->all());
        $auth = $request->header('Authorization');

        Log::info('Authorization header', ['auth' => $auth]);
        if ($auth) {
            $data = Gunung::where('Authorization', $auth)->get();
        } else {
            $data = Gunung::all();
        }

        // Log::info('data', $data);


        return response()->json($data);
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255',
            'ketinggian' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Gunung::create([
            'Authorization' => $request->header('Authorization'),
            'nama' => $request->nama,
            'ketinggian' => $request->ketinggian,
            'foto' => $request->file('foto')->store('gunung_images', 'public'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Item berhasil ditambahkan.',
        ], 200);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required|string|max:255',
            'ketinggian' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gunung = Gunung::findOrFail($id);
        $gunung->nama = $request->nama;
        $gunung->ketinggian = $request->ketinggian;

        if ($request->hasFile('foto')) {
            $gunung->foto = $request->file('foto')->store('gunung_images', 'public');
        }

        $gunung->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Item berhasil diperbarui.',
        ], 200);
    }

    public function destroy($id){
        Gunung::destroy($id);
        return response()->json([
            'status' => 'success',
            'message' => 'Item berhasil dihapus.',
        ], 200);
    }
}
