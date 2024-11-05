<?php

namespace App\Http\Controllers;

use App\Models\WebSettingModels;
use App\Models\KontakModels;
use App\Models\BeritaModels;
use App\Models\GaleriModels;
use App\Models\User;
use App\Models\LogsModels;
use App\Http\Controllers\LogsController;
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
            $file->move('home/img/berita', $gambarName);
            $DataGambar[] = [
                'id' => rand(1000, 9999),
                'img' => 'home/img/berita/' . $gambarName,
            ];
        }

        // Add To Logs
        $logs = new LogsController();
        $logs->store('add', "Berita Dengan Judul $request->judul Ditambahkan", [
            [
                'label' => 'Judul',
                'value' => $request->judul,
            ],
            [
                'label' => 'Deskripsi',
                'value' => $request->deskripsi,
            ],
            [
                'label' => 'Gambar',
                'value' => $DataGambar,
            ],
        ]);

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
                $value->move('home/img/berita', $gambarName);
                $GambarBaru[] = [
                    'id' => rand(1000, 9999),
                    'img' => 'home/img/berita/' . $gambarName,
                ];
            }
        }
        $DataGambar = array_merge($Gambar, $GambarBaru);
        

        // Add To Logs
        $logs = new LogsController();
        $logs->store('update', "Berita Dengan ID $id ($request->judul) Diperbarui", [
            [
                'label' => 'Sebelumnya',
                'hr' => true,
            ],
            [
                'label' => 'Judul',
                'value' => $berita->judul,
            ],
            [
                'label' => 'Deskripsi',
                'value' => $berita->deskripsi,
            ],
            [
                'label' => 'Gambar',
                'value' => $dataGambar,
            ],
            [
                'label' => 'Sekarang',
                'hr' => true,
            ],
            [
                'label' => 'Judul',
                'value' => $request->judul,
            ],
            [
                'label' => 'Deskripsi',
                'value' => $request->deskripsi,
            ],
            [
                'label' => 'Gambar',
                'value' => $DataGambar,
            ],
        ]);

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
            if (file_exists($value->img)) {
                unlink($value->img);
            }
        }

        // Add To Logs
        $logs = new LogsController();
        $logs->store('delete', "Berita Dengan ID $id ($berita->judul) Dihapus", [
            [
                'label' => 'ID',
                'value' => $id,
            ],
            [
                'label' => 'Judul',
                'value' => $berita->judul,
            ],
            [
                'label' => 'Gambar',
                'value' => $dataGambar,
            ],
        ]);

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
                if (file_exists($value->img)) {
                    unlink($value->img);
                }
                unset($gambar[$key]);
            } else {
                $GambarBaru[] = [
                    'id' => $value->id,
                    'img' => $value->img,
                ];
            }
        }


        // Add To Logs
        $logs = new LogsController();
        $logs->store('delete', "Gambar Berita Dengan ID $id_berita Dihapus", [
            [
                'label' => 'Sebelumnya',
                'hr' => true,
            ],
            [
                'label' => 'ID Berita',
                'value' => $id_berita,
            ],
            [
                'label' => 'ID Gambar',
                'value' => $gambar,
            ],
            [
                'label' => 'Sekarang',
                'hr' => true,
            ],
            [
                'label' => 'ID Gambar',
                'value' => $GambarBaru,
            ],
        ]);



        $berita->update([
            'img' => json_encode($GambarBaru),
        ]);

        

        return response()->json(['success' => true]);
    }

    public function namedesk(Request $request)
    {
        $site = WebSettingModels::all()->first();

        // Add To Logs
        $logs = new LogsController();
        $logs->store('update', "Nama, Deskripsi, dan Sejarah Diperbarui", [
            [
                'label' => 'Sebelumnya',
                'hr' => true,
            ],
            [
                'label' => 'Nama',
                'value' => $site->name,
            ],
            [
                'label' => 'Deskripsi',
                'value' => $site->deskripsi,
            ],
            [
                'label' => 'Sejarah',
                'value' => $site->sejarah,
            ],
            [
                'label' => 'Sekarang',
                'hr' => true,
            ],
            [
                'label' => 'Nama',
                'value' => $request->nama,
            ],
            [
                'label' => 'Deskripsi',
                'value' => $request->deskripsi,
            ],
            [
                'label' => 'Sejarah',
                'value' => $request->sejarah,
            ],
        ]);

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

        // Add To Logs
        $logs = new LogsController();
        $logs->store('update', "Visi Dan Misi Diperbarui", [
            [
                'label' => 'Sebelumnya',
                'hr' => true,
            ],
            [
                'label' => 'Visi',
                'value' => $site->visi,
            ],
            [
                'label' => 'Misi',
                'value' => $site->misi,
            ],
            [
                'label' => 'Sekarang',
                'hr' => true,
            ],
            [
                'label' => 'Visi',
                'value' => $request->visi,
            ],
            [
                'label' => 'Misi',
                'value' => $request->misi,
            ],
        ]);

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

    public function favicon(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'favicon' => 'required|image|mimes:jpg,jpeg,png',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => 'Gagal menambahkan favicon',
                'title' => 'Error'
            ]);
        }

        $site = WebSettingModels::all()->first();
        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $faviconName = Str::random(10) . '.' . $favicon->getClientOriginalExtension();
            $favicon->move('home/img/favicon', $faviconName);
            if (file_exists($site->favicon)) {
                unlink($site->favicon);
            }

            // Add To Logs
            $logs = new LogsController();
            $logs->store('update', "Favicon Diperbarui", [
                [
                    'label' => 'Sebelumnya',
                    'hr' => true,
                ],
                [
                    'label' => 'Favicon',
                    'value' => $site->favicon,
                ],
                [
                    'label' => 'Sekarang',
                    'hr' => true,
                ],
                [
                    'label' => 'Favicon',
                    'value' => 'home/img/favicon/' . $faviconName,
                ],
            ]);

            $site->update([
                'favicon' => 'home/img/favicon/' . $faviconName,
            ]);

            return redirect()->back()->with('alert', [
                'type' => 'success',
                'message' => 'Favicon Berhasil Diubah',
                'title' => 'Berhasil'
            ]);
        }

        return redirect()->back()->with('alert', [
            'type' => 'warning',
            'message' => 'Tidak Ada Perubahan Di Favicon',
            'title' => 'Warning'
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
        $banner->move('home/img/banner', $bannerName);

        $dataBanner[] = [
            'id' => rand(1000, 9999),
            'img' => 'home/img/banner/' . $bannerName,
        ];

        $dataGambar = json_encode($dataBanner);

        // Add To Logs
        $logs = new LogsController();
        $logs->store('add', "Banner Ditambahkan", [
            [
                'label' => 'Jumlah Banner',
                'value' => count($dataBanner),
            ],
        ]);

        
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
                if (file_exists($value->img)) {
                    unlink($value->img);
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

        // Add To Logs
        $logs = new LogsController();
        $logs->store('delete', "Banner Dengan Banner ID $id Dihapus", [
            [
                'label' => 'ID',
                'value' => $id,
            ],
        ]);

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
        $oldData = $kontak;

        // Add To Logs
        $logs = new LogsController();
        $logs->store('update', "Kontak Diperbarui", [
            [
                'label' => 'Sebelumnya',
                'hr' => true,
            ],
            [
                'label' => 'Telepon',
                'value' => $oldData->telepon,
            ],
            [
                'label' => 'Whatsapp',
                'value' => $oldData->whatsapp,
            ],
            [
                'label' => 'Alamat',
                'value' => $oldData->alamat,
            ],
            [
                'label' => 'Email',
                'value' => $oldData->email,
            ],
            [
                'label' => 'Maps',
                'value' => $oldData->maps,
            ],
            [
                'label' => 'Sekarang',
                'hr' => true,
            ],
            [
                'label' => 'Telepon',
                'value' => $request->telepon,
            ],
            [
                'label' => 'Whatsapp',
                'value' => $request->whatsapp,
            ],
            [
                'label' => 'Alamat',
                'value' => $request->alamat,
            ],
            [
                'label' => 'Email',
                'value' => $request->email,
            ],
            [
                'label' => 'Maps',
                'value' => $src,
            ],
        ]);
        
        
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


    public function galeri()
    {
        $site = WebSettingModels::all()->first();
        $galeri = GaleriModels::orderBy('created_at', 'desc')->get();
        return view('dashboard.content.galeri', compact('site', 'galeri'));
    }

    public function addgaleri()
    {
        $site = WebSettingModels::all()->first();
        return view('dashboard.content.addgaleri', compact('site'));
    }

    public function addedgaleri(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'deskripsi' => 'required',
                'gambar' => 'required|file|mimes:jpeg,png,jpg,gif,svg,mp4,avi|max:204800',
            ], [
                'deskripsi.required' => 'Deskripsi harus diisi.',
                'gambar.required' => 'Gambar harus diisi.',
                'gambar.file' => 'Gambar harus berupa file.',
                'gambar.mimes' => 'Gambar harus berupa JPEG, PNG, JPG, GIF, SVG, MP4, atau AVI.',
                'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 200 MB.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
        
        $gambar = $request->file('gambar');
        $gambarName = Str::random(10) . '.' . $gambar->getClientOriginalExtension();
        $gambar->move('home/img/galeri', $gambarName);
        $deskripsi = $request->deskripsi;

        // Add To Logs
        $logs = new LogsController();
        $logs->store('add', "Galeri Dengan Deskripsi ($deskripsi) Ditambahkan", [
            [
                'label' => 'Deskripsi',
                'value' => $deskripsi,
            ],
            [
                'label' => 'Gambar',
                'value' => 'home/img/galeri/' . $gambarName,
            ],
        ]);

        GaleriModels::create([
            'deskripsi' => $deskripsi,
            'img' => 'home/img/galeri/' . $gambarName,
        ]);
        return redirect()->route('dashboard.galeri')->with('alert', [
            'type' => 'success',
            'message' => 'Gambar Berhasil Ditambah',
            'title' => 'Berhasil'
        ]);
    }

    public function editgaleri($id)
    {
        $site = WebSettingModels::all()->first();
        $galeri = GaleriModels::find($id);
        return view('dashboard.content.editgaleri', compact('site', 'galeri'));
    }

    public function updategaleri(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'deskripsi' => 'required',
            ], [
                'deskripsi.required' => 'Deskripsi harus diisi.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $id_galeri = $request->id_galeri;
        $DataGaleri = GaleriModels::find($id_galeri);
        $oldData = $DataGaleri;
        $GambarNew = $DataGaleri->img;

        $gambar = $request->file('gambar');
        if ($gambar) {
            try {
                $validatedData = $request->validate([
                    'gambar' => 'required|file|mimes:jpeg,png,jpg,gif,svg,mp4,avi|max:204800',
                ], [
                    'gambar.required' => 'Gambar harus diisi.',
                    'gambar.file' => 'Gambar harus berupa file.',
                    'gambar.image' => 'Gambar harus berupa gambar/video.',
                    'gambar.mimes' => 'Gambar harus berupa JPEG, PNG, JPG, GIF, SVG, MP4, atau AVI.',
                    'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 200 MB.',
                ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                return redirect()->back()->withErrors($e->errors())->withInput();
            }

            $gambarName = Str::random(10) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('home/img/galeri', $gambarName);
            $GambarNew = 'home/img/galeri/' . $gambarName;
            if (file_exists($DataGaleri->img)) {
                unlink($DataGaleri->img);
            }
        }
        
        // Add To Logs
        $logs = new LogsController();
        $logs->store('update', "Galeri Dengan ID $DataGaleri->id ($DataGaleri->deskripsi) Diperbarui", [
            [
                'label' => 'Sebelumnya',
                'hr' => true,
            ],
            [
                'label' => 'ID',
                'value' => $oldData->id,
            ],
            [
                'label' => 'Deskripsi',
                'value' => $oldData->deskripsi,
            ],
            [
                'label' => 'Gambar',
                'value' => $oldData->img,
            ],
            [
                'label' => 'Sekarang',
                'hr' => true,
            ],
            [
                'label' => 'ID',
                'value' => $DataGaleri->id,
            ],
            [
                'label' => 'Deskripsi',
                'value' => $request->deskripsi,
            ],
            [
                'label' => 'Gambar',
                'value' => $GambarNew,
            ],
        ]);

        $DataGaleri->update([
            'deskripsi' => $request->deskripsi,
            'img' => $GambarNew,
        ]);
        return redirect()->route('dashboard.galeri')->with('alert', [
            'type' => 'success',
            'message' => 'Gambar Berhasil Diubah',
            'title' => 'Berhasil'
        ]);
    }

    public function deletegaleri(Request $request)
    {
        $id = $request->id;
        $DataGaleri = GaleriModels::find($id);
        if (file_exists($DataGaleri->img)) {
            unlink($DataGaleri->img);
        }

        // Add To Logs
        $logs = new LogsController();
        $logs->store('delete', "Galeri Dengan ID $DataGaleri->id ($DataGaleri->deskripsi) Dihapus", [
            [
                'label' => 'ID',
                'value' => $DataGaleri->id,
            ],
            [
                'label' => 'Deskripsi',
                'value' => $DataGaleri->deskripsi,
            ],
        ]);

        $DataGaleri->delete();
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Galeri Berhasil Dihapus',
            'title' => 'Berhasil'
        ]);
        return response()->json(['success' => true]);
    }

    public function account()
    {
        $site = WebSettingModels::all()->first();
        $accounts = User::orderBy('created_at', 'desc')->get();
        return view('dashboard.content.account', compact('site', 'accounts'));
    }

    public function editaccount($id)
    {
        $site = WebSettingModels::all()->first();
        $account = User::find($id);
        return view('dashboard.content.editaccount', compact('site', 'account'));
    }

    public function updateaccount(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
            ], [
                'name.required' => 'Nama harus diisi.',
                'email.required' => 'Email harus diisi.',
                'email.email' => 'Email tidak valid.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $id_account = $request->id;
        $DataAccount = User::find($id_account);
        $oldData = $DataAccount;
        $GambarNew = $DataAccount->image;
        $role = $DataAccount->superadmin;

        if (!empty($request->role) || $request->role != '') {
            $role = $request->role;
        }

        $gambar = $request->file('gambar');
        if ($gambar) {
            try {
                $validatedData = $request->validate([
                    'gambar' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:20480',
                ], [
                    'gambar.required' => 'Gambar harus diisi.',
                    'gambar.file' => 'Gambar harus berupa file.',
                    'gambar.image' => 'Gambar harus berupa gambar.',
                    'gambar.mimes' => 'Gambar harus berupa JPEG, PNG, JPG, GIF, SVG',
                    'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 200 MB.',
                ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                return redirect()->back()->withErrors($e->errors())->withInput();
            }

            $gambarName = Str::random(10) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('home/img/profile', $gambarName);
            $GambarNew = 'home/img/profile/' . $gambarName;
            if (file_exists($DataAccount->image)) {
                unlink($DataAccount->image);
            }
        }
    

        // Add To Logs
        $logs = new LogsController();
        $logs->store('update', "Akun Dengan Email $DataAccount->email ($DataAccount->name) Diperbarui", [
            [
                'label' => 'Sebelumnya',
                'hr' => true,
            ],
            [
                'label' => 'Nama',
                'value' => $oldData->name,
            ],
            [
                'label' => 'Email',
                'value' => $oldData->email,
            ],
            [
                'label' => 'Role',
                'value' => $oldData->superadmin == 2 ? 'Super Admin' : ($oldData->superadmin == 1 ? 'Admin' : 'User'),
            ],
            [
                'label' => 'Gambar',
                'value' => $oldData->image,
            ],
            [
                'label' => 'Sekarang',
                'hr' => true,
            ],
            [
                'label' => 'Nama',
                'value' => $request->name,
            ],
            [
                'label' => 'Email',
                'value' => $request->email,
            ],
            [
                'label' => 'Role',
                'value' => $role == 2 ? 'Super Admin' : ($role == 1 ? 'Admin' : 'User'),
            ],
            [
                'label' => 'Gambar',
                'value' => $GambarNew,
            ],
        ]);

        $DataAccount->update([
            'name' => $request->name,
            'email' => $request->email,
            'superadmin' => $role,
            'image' => $GambarNew,
        ]);
        return redirect()->route('dashboard.account')->with('alert', [
            'type' => 'success',
            'message' => 'Akun Berhasil Diubah',
            'title' => 'Berhasil'
        ]);
    }

    public function deleteaccount(Request $request)
    {
        $id = $request->id;
        $DataAccount = User::find($id);
        $nama = $DataAccount->name;

        // Add To Logs
        $logs = new LogsController();
        $logs->store('delete', "Akun Dengan Email $DataAccount->email ($DataAccount->name) Dihapus", [
            [
                'label' => 'Email',
                'value' => $DataAccount->email,
            ],
            [
                'label' => 'Nama',
                'value' => $DataAccount->name,
            ]
        ]);

        $DataAccount->delete();
        session()->flash('alert', [
            'type' => 'success',
            'message' => "Akun $nama Berhasil Dihapus",
            'title' => 'Berhasil'
        ]);
        
        return response()->json(['success' => true, 'name' => $nama]);
    }

    public function logs()
    {
        $site = WebSettingModels::all()->first();
        $logs = LogsModels::orderBy('created_at', 'desc')->get();
        $dataLogs = [];
        foreach ($logs as $log) {
            $dataUsers = User::find($log->user_id);
            $dataLogs[] = [
                'id' => $log->id,
                'user_id' => $log->user_id,
                'action' => $log->action,
                'description' => $log->description,
                'data' => $log->data,
                'created_at' => $log->created_at,
                'nama' => $dataUsers->name,
                'email' => $dataUsers->email,
                'image' => $dataUsers->image,
            ];
        }
        return view('dashboard.content.logs', compact('site', 'dataLogs'));
    }

    public function detaillogs($id)
    {
        $site = WebSettingModels::all()->first();
        $logs = LogsModels::find($id);
        return view('dashboard.content.logsdetail', compact('site', 'logs'));
    }
}
