<?php

namespace App\Http\Controllers;

use App\Models\BeritaModels;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = BeritaModels::all();
        return view('home.content.home', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function berita()
    {
        $berita = BeritaModels::all();
        return view('home.content.berita', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pengumuman()
    {
        $pengumuman = BeritaModels::all();
        return view('home.content.pengumuman', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function galeri()
    {
        $galeri = BeritaModels::all();
        return view('home.content.galeri', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sejarah()
    {
        $sejarah = BeritaModels::all();
        return view('home.content.sejarah', compact('sejarah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function visimisi()
    {
        $visimisi = BeritaModels::all();
        return view('home.content.visimisi', compact('visimisi'));
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