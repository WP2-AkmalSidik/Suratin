@extends('layouts.app')

@section('title', 'Surat Masuk')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- List Surat Masuk -->
            <div class="col-lg-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="text-primary">List Surat Masuk</h5>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#inputSuratModal">
                        Tambah Surat
                    </button>
                </div>

                <!-- Tombol Pencarian -->
                <div class="mb-3">
                    <form action="{{ route('surat-masuk.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Cari Surat..."
                                aria-label="Cari Surat">
                            <button class="btn btn-outline-primary" type="submit">
                                <i class="ri-search-line ri-22px"></i> <!-- Menambahkan ikon pencarian -->
                            </button>
                        </div>
                    </form>
                </div>

                <div class="list-group shadow-sm rounded">
                    @foreach($suratMasuk as $suratList)
                    <a href="{{ route('surat-masuk.show', $suratList->id) }}"
                        class="list-group-item list-group-item-action {{ isset($surat) && $surat->id === $suratList->id ? 'active' : '' }}">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $suratList->nomor_surat }}</strong><br>
                                <small>{{ $suratList->pengirim }}</small>
                            </div>
                            <small class="text-muted">{{ $suratList->tanggal_surat }}</small>
                        </div>
                        @if($suratList->foto_surat)
                        <span class="badge bg-success mt-2">Ada Lampiran</span>
                        @endif
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Detail Surat Masuk -->
            <div class="col-lg-8 mb-4">
                @if(isset($surat))
                <div class="card shadow-sm" style="min-height: 300px;">
                    <div class="card-header bg-primary text-center">
                        <h5 class="text-white">Detail Surat - {{ $surat->nomor_surat }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="mt-3"><strong>Pengirim:</strong> {{ $surat->pengirim }}</p>
                        <p><strong>Perihal:</strong> {{ $surat->perihal }}</p>
                        <p><strong>Tanggal Surat:</strong> {{ $surat->tanggal_surat }}</p>
                        <p><strong>Keterangan:</strong> {{ $surat->keterangan ?: '-' }}</p>
                        <strong>Foto Surat:</strong>
                        <div class="mt-2">
                            @if($surat->foto_surat)
                            <img src="{{ asset('storage/' . $surat->foto_surat) }}" alt="Foto Surat"
                                class="img-fluid shadow-sm rounded">
                            @else
                            <em>Tidak ada foto</em>
                            @endif
                        </div>
                    </div>
                </div>
                @else
                <div class="card shadow-sm" style="min-height: 300px;">
                    <div class="card-header bg-primary text-center">
                        <h5 class="text-white">Detail Surat</h5>
                    </div>
                    <div class="card-body text-center mt-10">
                        <h6 class="text-muted mt-10">Pilih surat untuk melihat detail.</h6>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Surat -->
@include('tambah-surat')

@endsection
