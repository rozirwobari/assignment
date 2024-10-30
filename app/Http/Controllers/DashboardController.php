<?php

namespace App\Http\Controllers;

use App\Models\WebSettingModels;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $site = WebSettingModels::all()->first();
        $JsonGambar = json_decode($site->img);
        $banner = [];
        foreach ($JsonGambar as $key => $value) {
            $banner[] = [
                'id' => $key,
                'img' => $value->img,
            ];
        }
        return view('dashboard.content.dashboard', compact('site', 'banner'));
    }

    public function berita()
    {
        $site = WebSettingModels::all()->first();
        return view('dashboard.content.berita', compact('site'));
    }

    public function namedesk(Request $request)
    {
        $site = WebSettingModels::all()->first();
        $site->update([
            'name' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'sejarah' => $request->sejarah,
        ]);
        return redirect()->back()->with('alert', [
            'type' => 'success',
            'message' => 'Nama, Deskripsi, dan Sejarah Berhasil Diubah',
            'title' => 'Berhasil'
        ]);
    }

    public function visimisi(Request $request)
    {
        $site = WebSettingModels::all()->first();
        $site->update([
            'visi' => $request->visi,
            'misi' => $request->misi
        ]);
        return redirect()->back()->with('alert', [
            'type' => 'success',
            'message' => 'Visi Dan Misi Berhasil Diubah',
            'title' => 'Berhasil'
        ]);
    }

    public function addbanner(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'banner' => 'required|image|mimes:jpg,jpeg,png',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => 'Gagal menambahkan banner',
                'title' => 'Error'
            ]);
        }
        $site = WebSettingModels::all()->first();
        $dataGambar = json_decode($site->img);
        $dataBanner = [];
        foreach ($dataGambar as $key => $value) {
            $dataBanner[] = [
                'id' => $key,
                'img' => $value->img,
            ];
        }
        $count = count($dataBanner);
        
        $banner = $request->file('banner');
        $bannerName = Str::random(10) . '.' . $banner->getClientOriginalExtension();
        $banner->move(public_path('home/img/banner'), $bannerName);

        $dataBanner[] = [
            'id' => ($count + 1),
            'img' => 'home/img/banner/' . $bannerName,
        ];

        $dataGambar = json_encode($dataBanner);
        $site->update([
            'img' => $dataGambar
        ]);
        return redirect()->back()->with('alert', [
            'type' => 'success',
            'message' => 'Banner Berhasil Ditambah',
            'title' => 'Berhasil'
        ]);
    }

    public function deletebanner(Request $request)
    {
        $id = $request->id;
        $site = WebSettingModels::all()->first();
        $dataGambar = json_decode($site->img);

        foreach ($dataGambar as $key => $value) {
            if ($key == $id) {
                if (file_exists(public_path($value->img))) {
                    unlink(public_path($value->img));
                }
                unset($dataGambar[$id]);
            }
        }

        $dataBanner = [];
        foreach ($dataGambar as $key => $value) {
            $dataBanner[] = [
                'id' => $key,
                'img' => $value->img,
            ];
        }
        $dataGambar = json_encode($dataBanner);
        $site->update([
            'img' => $dataGambar
        ]);
        return redirect()->back()->with('alert', [
            'type' => 'success',
            'message' => 'Banner Berhasil Dihapus',
            'title' => 'Berhasil'
        ]);
    }
}
