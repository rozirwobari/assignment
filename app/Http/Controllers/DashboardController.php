<?php

namespace App\Http\Controllers;

use App\Models\WebSettingModels;
use App\Models\KontakModels;
use App\Models\BeritaModels;
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
        if ($JsonGambar) {
            foreach ($JsonGambar as $key => $value) {
                $banner[] = [
                    'id' => $value->id,
                    'img' => $value->img,
                ];
            }
        }
        return view('dashboard.content.dashboard', compact('site', 'banner'));
    }

    public function berita()
    {
        $site = WebSettingModels::all()->first();
        $berita = BeritaModels::orderBy('created_at', 'desc')->get();
        return view('dashboard.content.berita', compact('site', 'berita'));
    }

    public function addberita()
    {
        $site = WebSettingModels::all()->first();
        $berita = BeritaModels::all();
        return view('dashboard.content.addberita', compact('site', 'berita'));
    }

    public function addedberita(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'judul' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'required|array',
                'gambar.*' => 'image',
            ], [
                'judul.required' => 'Judul Wajib di isi',
                'deskripsi.required' => 'Deskripsi Wajib di isi',
                'gambar.required' => 'Gambar Wajib di isi',
                'gambar.*.image' => 'Hanya file gambar yang diperbolehkan',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }

        $gambar = $request->file('gambar');
        $DataGambar = [];
        foreach ($gambar as $key => $file) {
            $gambarName = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('home/img/berita'), $gambarName);
            $DataGambar[] = [
                'id' => rand(1000, 9999),
                'img' => 'home/img/berita/' . $gambarName,
            ];
        }

        // dd($DataGambar);

        BeritaModels::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'img' => json_encode($DataGambar),
        ]);
        return redirect()->route('dashboard.berita')->with('alert', [
            'type' => 'success',
            'message' => 'Berita Berhasil Ditambah',
            'title' => 'Berhasil'
        ]);
    }

    public function updateberita(Request $request)
    {
        $id = $request->id;
        $inputGambar = $request->gambar;
        $berita = BeritaModels::find($id);
        $dataGambar = json_decode($berita->img);
        
        $Gambar = [];
        $GambarBaru = [];
        foreach ($dataGambar as $key => $value) {
            $Gambar[] = [
                'id' => $value->id,
                'img' => $value->img,
            ];
        }

        if ($inputGambar) {
            foreach ($inputGambar as $key => $value) {
                $gambarName = Str::random(10) . '.' . $value->getClientOriginalExtension();
                $value->move(public_path('home/img/berita'), $gambarName);
                $GambarBaru[] = [
                    'id' => rand(1000, 9999),
                    'img' => 'home/img/berita/' . $gambarName,
                ];
            }
        }
        $DataGambar = array_merge($Gambar, $GambarBaru);
        BeritaModels::find($id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'img' => json_encode($DataGambar),
        ]);
        return redirect()->route('dashboard.berita')->with('alert', [
            'type' => 'success',
            'message' => 'Berita Berhasil Diubah',
            'title' => 'Berhasil'
        ]);
    }

    public function deleteberita(Request $request)
    {
        $id = $request->id;
        $berita = BeritaModels::find($id);
        $dataGambar = json_decode($berita->img);
        foreach ($dataGambar as $key => $value) {
            if (file_exists(public_path($value->img))) {
                unlink(public_path($value->img));
            }
        }
        BeritaModels::find($id)->delete();
        return response()->json(['success' => true]);
    }

    public function editberita($id)
    {
        $site = WebSettingModels::all()->first();
        $berita = BeritaModels::find($id);
        $gambar = json_decode($berita->img);
        return view('dashboard.content.editberita', compact('site', 'berita', 'gambar'));
    }

    public function deletegambar(Request $request)
    {
        $id_berita = $request->id_berita;
        $id_gambar = $request->id_gambar;

        $berita = BeritaModels::find($id_berita);
        $gambar = json_decode($berita->img);
        $GambarBaru = [];
        foreach ($gambar as $key => $value) {
            if ($value->id == $id_gambar) {
                if (file_exists(public_path($value->img))) {
                    unlink(public_path($value->img));
                }
                unset($gambar[$key]);
            } else {
                $GambarBaru[] = [
                    'id' => $value->id,
                    'img' => $value->img,
                ];
            }
        }
        $berita->update([
            'img' => json_encode($GambarBaru),
        ]);
        return response()->json(['success' => true]);
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
        if ($dataGambar) {
            foreach ($dataGambar as $key => $value) {
                $dataBanner[] = [
                    'id' => rand(1000, 9999),
                    'img' => $value->img,
                ];
            }
        }
        $count = count($dataBanner);
        
        $banner = $request->file('banner');
        $bannerName = Str::random(10) . '.' . $banner->getClientOriginalExtension();
        $banner->move(public_path('home/img/banner'), $bannerName);

        $dataBanner[] = [
            'id' => rand(1000, 9999),
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
        $id = $request->id_banner;
        $site = WebSettingModels::all()->first();
        $dataGambar = json_decode($site->img);
        foreach ($dataGambar as $key => $value) {
            if ($value->id == $id) {
                if (file_exists(public_path($value->img))) {
                    unlink(public_path($value->img));
                }
                unset($dataGambar[$key]);
            }
        }

        $dataBanner = [];
        foreach ($dataGambar as $key => $value) {
            $dataBanner[] = [
                'id' => $value->id,
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

    public function kontak()
    {
        $site = WebSettingModels::all()->first();
        $kontak = KontakModels::all()->first();
        return view('dashboard.content.kontak', compact('site', 'kontak'));
    }

    public function updatekontak(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'telepon' => 'required',
                'whatsapp' => 'required',
                'alamat' => 'required',
                'email' => 'required|email',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }

        if (strpos($request->maps, '<iframe') !== false) {
            preg_match('/src="([^"]+)"/', $request->maps, $matches);
            $src = $matches[1] ?? null;
        } else {
            $src = $request->maps;
        }
        
        $kontak = KontakModels::all()->first();
        $kontak->update([
            'telepon' => $request->telepon,
            'whatsapp' => $request->whatsapp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'maps' => $src,
        ]);
        return redirect()->back()->with('alert', [
            'type' => 'success',
            'message' => 'Kontak Berhasil Diubah',
            'title' => 'Berhasil'
        ]);
    }
}
