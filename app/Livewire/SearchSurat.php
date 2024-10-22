<?php

namespace App\Livewire;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Livewire\Component;

class SearchSurat extends Component
{
    public $query = '';
    public $results = [];

    // Method ini dijalankan saat properti $query diubah
    public function updatedQuery()
    {
        $this->results = [];

        // Jika query kosong, jangan lakukan pencarian
        if (empty($this->query)) {
            return;
        }

        // Cari surat masuk berdasarkan query
        $suratMasuk = SuratMasuk::where('nomor_surat', 'like', '%' . $this->query . '%')
            ->orWhere('pengirim', 'like', '%' . $this->query . '%')
            ->orWhere('perihal', 'like', '%' . $this->query . '%')
            ->get();

        // Cari surat keluar berdasarkan query
        $suratKeluar = SuratKeluar::where('nomor_surat', 'like', '%' . $this->query . '%')
            ->orWhere('penerima', 'like', '%' . $this->query . '%')
            ->orWhere('perihal', 'like', '%' . $this->query . '%')
            ->get();

        // Gabungkan hasil pencarian surat masuk dan keluar
        $this->results = $suratMasuk->merge($suratKeluar);
    }

    public function render()
    {
        return view('livewire.search-surat');
    }
}
