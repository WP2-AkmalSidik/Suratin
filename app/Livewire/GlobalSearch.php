<?php

namespace App\Livewire;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Livewire\Component;

class GlobalSearch extends Component
{
    public $searchTerm = '';

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $suratMasukResults = SuratMasuk::where('nomor_surat', 'like', $searchTerm)
            ->orWhere('pengirim', 'like', $searchTerm)
            ->orWhere('perihal', 'like', $searchTerm)
            ->get();

        $suratKeluarResults = SuratKeluar::where('nomor_surat', 'like', $searchTerm)
            ->orWhere('penerima', 'like', $searchTerm)
            ->orWhere('perihal', 'like', $searchTerm)
            ->get();

        // Cek apakah data sudah benar
        // dd($suratMasukResults, $suratKeluarResults);

        return view('livewire.global-search', [
            'suratMasukResults' => $suratMasukResults,
            'suratKeluarResults' => $suratKeluarResults,
        ]);
    }
}
