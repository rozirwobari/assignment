<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StrukturModels;
use App\Models\WebSettingModels;
use App\Models\User;
use App\Models\LogsModels;
use Illuminate\Support\Str;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $site = WebSettingModels::all()->first();
        $struktur = StrukturModels::all();
        return view('dashboard.content.struktur', compact('site', 'struktur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'jabatan' => 'required',
                'foto' => 'required|image',
            ], [
                'nama.required' => 'Nama harus diisi',
                'jabatan.required' => 'Jabatan harus diisi',
                'foto.required' => 'Foto harus diisi',
                'foto.image' => 'Foto harus berupa gambar',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withInput()->withErrors($e->errors());
        }

        $foto = $request->file('foto');
        $namaFoto = Str::random(10) . '.' . $foto->getClientOriginalExtension();
        $foto->move('home/struktur', $namaFoto);

        StrukturModels::create([
            'pid' => $request->parent_id,
            'nama' => $request->nama,
            'title' => $request->jabatan,
            'image' => 'home/struktur/' . $namaFoto,
        ]);

        return redirect()->back()->with('alert', [
            'type' => 'success',
            'message' => 'Data Berhasil Ditambahkan',
            'title' => 'Berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $struktur = StrukturModels::find($id);
        if ($struktur) {
            StrukturModels::where('pid', $struktur->pid)->update(['pid' => null]);
            $struktur->delete();
            session()->flash('alert', [
                'type' => 'success',
                'message' => 'Data Berhasil Dihapus',
                'title' => 'Berhasil'
            ]);
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 404);
        }
    }
}
