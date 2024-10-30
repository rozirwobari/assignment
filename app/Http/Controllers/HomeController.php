<?php

namespace App\Http\Controllers;

use App\Models\BeritaModels;
use App\Models\WebSettingModels;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = BeritaModels::all();
        $site = WebSettingModels::all()->first();
        $JsonGambar = json_decode($site->img);
        $banner = [];
        foreach ($JsonGambar as $key => $value) {
            $banner[] = [
                'id' => $key,
                'img' => $value->img,
            ];
        }
        return view('home.content.home', compact('berita', 'site', 'banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function berita()
    {
        $berita = BeritaModels::all();
        $site = WebSettingModels::all()->first();
        return view('home.content.berita', compact('berita', 'site'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pengumuman()
    {
        $pengumuman = BeritaModels::all();
        $site = WebSettingModels::all()->first();
        return view('home.content.pengumuman', compact('pengumuman', 'site'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function galeri()
    {
        $galeri = BeritaModels::all();
        $site = WebSettingModels::all()->first();
        return view('home.content.galeri', compact('galeri', 'site'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sejarah()
    {
        $sejarah = BeritaModels::all();
        $site = WebSettingModels::all()->first();
        return view('home.content.sejarah', compact('sejarah', 'site'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function visimisi()
    {
        $site = WebSettingModels::all()->first();
        return view('home.content.visimisi', compact('site'));
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