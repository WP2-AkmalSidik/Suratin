<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $surat_keluars = SuratKeluar::all();
        return view('surat-keluar', compact('surat_keluars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|unique:surat_keluars',
            'penerima' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required|date',
            'foto_surat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload foto surat
        if ($request->hasFile('foto_surat')) {
            $file = $request->file('foto_surat');
            $path = $file->store('surat_keluar', 'public');
        }

        // Simpan data
        SuratKeluar::create([
            'nomor_surat' => $request->nomor_surat,
            'penerima' => $request->penerima,
            'perihal' => $request->perihal,
            'tanggal_surat' => $request->tanggal_surat,
            'keterangan' => $request->keterangan,
            'foto_surat' => $path ?? null,
        ]);

        return redirect()->back()->with('success', 'Surat keluar berhasil ditambahkan!');
    }
}