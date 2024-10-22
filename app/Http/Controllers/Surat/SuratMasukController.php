<?php

namespace App\Http\Controllers\Surat;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter pencarian
        $search = $request->get('search');

        // Jika ada pencarian, filter data surat masuk
        if ($search) {
            $suratMasuk = SuratMasuk::where('nomor_surat', 'LIKE', "%{$search}%")
                ->orWhere('pengirim', 'LIKE', "%{$search}%")
                ->get();

            // Jika hanya ada satu hasil pencarian, langsung tampilkan detailnya
            if ($suratMasuk->count() === 1) {
                $surat = $suratMasuk->first(); // Ambil surat pertama (satu-satunya)
                return view('surat-masuk', compact('suratMasuk', 'surat'));
            }

            // Jika banyak hasil pencarian, tampilkan daftar surat
            return view('surat-masuk', compact('suratMasuk'));
        }

        $suratMasuk = SuratMasuk::all();
        return view('surat-masuk', compact('suratMasuk'));
    }

    public function show($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        $suratMasuk = SuratMasuk::all(); // Ambil semua surat untuk ditampilkan di list
        return view('surat-masuk', compact('suratMasuk', 'surat'));
    }

    // Menyimpan data surat masuk baru
    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|unique:surat_masuks',
            'pengirim' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required|date',
            'foto_surat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('foto_surat')) {
            $file = $request->file('foto_surat');
            $path = $file->store('surat_masuk', 'public');
        }

        // Simpan data surat masuk
        SuratMasuk::create([
            'nomor_surat' => $request->nomor_surat,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'tanggal_surat' => $request->tanggal_surat,
            'keterangan' => $request->keterangan,
            'foto_surat' => $path ?? null,
        ]);

        return redirect()->back()->with('success', 'Surat masuk berhasil disimpan.');
    }

    // Hapus surat masuk
    public function destroy($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);

        // Hapus file scan jika ada
        if ($suratMasuk->foto_surat) {
            Storage::delete('public/surat/' . $suratMasuk->foto_surat);
        }

        // Hapus data dari database
        $suratMasuk->delete();

        return redirect()->back()->with('success', 'Surat masuk berhasil dihapus.');
    }
}
