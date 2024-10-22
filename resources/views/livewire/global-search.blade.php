<div>
    <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
            <!-- <i class="ri-search-line ri-22px me-2"></i>
            <input type="text" wire:model="searchTerm" class="form-control border-0 shadow-none" placeholder="Search..."
                aria-label="Search..." /> -->
        </div>

        @if($searchTerm)
        <div class="list-group mt-2">
            <!-- Tampilkan hasil pencarian surat masuk -->
            @if($suratMasukResults->isNotEmpty())
            <div class="list-group-item">
                <strong>Surat Masuk</strong>
                @foreach($suratMasukResults as $result)
                <a href="{{ route('surat-masuk.show', $result->id) }}" class="list-group-item list-group-item-action">
                    {{ $result->nomor_surat }} - {{ $result->pengirim }}
                </a>
                @endforeach
            </div>
            @endif

            <!-- Tampilkan hasil pencarian surat keluar -->
            @if($suratKeluarResults->isNotEmpty())
            <div class="list-group-item">
                <strong>Surat Keluar</strong>
                @foreach($suratKeluarResults as $result)
                <a href="{{ route('surat-keluar.show', $result->id) }}" class="list-group-item list-group-item-action">
                    {{ $result->nomor_surat }} - {{ $result->penerima }}
                </a>
                @endforeach
            </div>
            @endif

            <!-- Jika tidak ada hasil -->
            @if($suratMasukResults->isEmpty() && $suratKeluarResults->isEmpty())
            <div class="list-group-item">
                Tidak ada hasil yang ditemukan.
            </div>
            @endif
        </div>
        @endif
    </div>
</div>