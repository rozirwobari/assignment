<?php

namespace App\Http\Controllers;

use App\Models\BeritaModels;
use App\Models\WebSettingModels;
use App\Models\KontakModels;
use App\Models\GaleriModels;
use App\Models\User;
use App\Mail\KontakKami;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = BeritaModels::orderBy('created_at', 'desc')->get();
        $users = User::where('superadmin', 0)->get();
        $site = WebSettingModels::all()->first();
        $kontak = KontakModels::all()->first();
        $galeri = GaleriModels::orderBy('created_at', 'desc')->get();
        $JsonGambar = json_decode($site->img);
        $banner = [];
        if ($JsonGambar) {
            foreach ($JsonGambar as $key => $value) {
                $banner[] = [
                    'id' => $key,
                    'img' => $value->img,
                ];
            }
        }
        return view('home.content.home', compact('berita', 'site', 'banner', 'kontak', 'galeri', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function berita()
    {
        $berita = BeritaModels::orderBy('created_at', 'desc')->get();
        $site = WebSettingModels::all()->first();
        $kontak = KontakModels::all()->first();
        return view('home.content.berita', compact('berita', 'site', 'kontak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pengumuman()
    {
        $pengumuman = BeritaModels::all();
        $site = WebSettingModels::all()->first();
        $kontak = KontakModels::all()->first();
        return view('home.content.pengumuman', compact('pengumuman', 'site', 'kontak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function galeri()
    {
        $galeri = GaleriModels::orderBy('created_at', 'desc')->get();
        $site = WebSettingModels::all()->first();
        $kontak = KontakModels::all()->first();
        return view('home.content.galeri', compact('galeri', 'site', 'kontak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sejarah()
    {
        $sejarah = BeritaModels::all();
        $site = WebSettingModels::all()->first();
        $kontak = KontakModels::all()->first();
        return view('home.content.sejarah', compact('sejarah', 'site', 'kontak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function visimisi()
    {
        $site = WebSettingModels::all()->first();
        $kontak = KontakModels::all()->first();
        return view('home.content.visimisi', compact('site', 'kontak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function kontak()
    {
        $site = WebSettingModels::all()->first();
        $kontak = KontakModels::all()->first();
        return view('home.content.kontak', compact('site', 'kontak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function kirimpesan(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        }

        Mail::to('1rozirwobari@gmail.com')->send(new KontakKami($request->all()));

        return back()->with('alert', [
            'type' => 'success',
            'message' => 'Pesan Berhasil Dikirim',
            'title' => 'Berhasil'
        ]);
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
        //
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
    public function destroy(string $id)
    {
        //
    }
}