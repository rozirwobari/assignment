<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WebSettingModels;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $site = WebSettingModels::first();
        return view('dashboard.content.profile', compact('user', 'site'));
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
    public function photoprofile(Request $request)
    {
        try {
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'gambar.required' => 'Gambar harus diisi.',
                'gambar.image' => 'Gambar harus berupa gambar.',
                'gambar.mimes' => 'Gambar harus berupa JPEG, PNG, JPG, GIF, atau SVG.',
                'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        }

        $user = Auth::user();
        $gambar = $request->file('gambar');
        $gambarName = Str::random(10) . '.' . $gambar->getClientOriginalExtension();
        $gambar->move('home/img/profile', $gambarName);
        $GambarNew = 'home/img/profile/' . $gambarName;
        if (file_exists($user->image)) {
            unlink($user->image);
        }

        
        $user->image = $GambarNew;
        $user->save();

        return back()->with('alert', [
            'type' => 'success',
            'message' => 'Gambar Berhasil Diubah',
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
    public function editprofile(Request $request)
    {

        try {
            $request->validate([
                'nama' => 'required',
                'email' => 'required|email',
            ], [
                'nama.required' => 'Nama harus diisi.',
                'email.required' => 'Email harus diisi.',
                'email.email' => 'Email tidak valid.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        }

        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;
        $password_baru = $request->password_baru;
        $user = Auth::user();

        if ($password) {
            try {
                $request->validate([
                    'password' => 'required|min:8',
                    'password_baru' => 'required|min:8',
                ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                return back()->withErrors($e->validator)->withInput();
            }

            if (!Hash::check($password, $user->password)) {
                return back()->withErrors(['password' => 'Password lama tidak cocok.'])->withInput();
            }

            $user->password = Hash::make($password_baru);
            $user->save();
        }

        $user->name = $nama;
        $user->email = $email;
        $user->save();

        return back()->with('alert', [
            'type' => 'success',
            'message' => 'Data Berhasil Diubah',
            'title' => 'Berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
