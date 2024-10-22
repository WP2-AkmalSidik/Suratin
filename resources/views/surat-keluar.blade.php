@extends('layouts.app')
@section('title', 'Surat Keluar')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- List Surat Keluar -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">List Surat Keluar</h5>
                        <!-- Minimalist Add Button -->
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#tambahSuratModal">
                            + Tambah
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Surat</th>
                                    <th>Penerima</th>
                                    <th>Perihal</th>
                                    <th>Tanggal Surat</th>
                                    <th>Foto Surat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($surat_keluars as $surat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $surat->nomor_surat }}</td>
                                    <td>{{ $surat->penerima }}</td>
                                    <td>{{ $surat->perihal }}</td>
                                    <td>{{ $surat->tanggal_surat }}</td>
                                    <td>
                                        @if($surat->foto_surat)
                                        <img src="{{ asset('storage/' . $surat->foto_surat) }}" alt="Foto Surat"
                                            width="50">
                                        @else
                                        Tidak ada foto
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Detail Button -->
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detailSuratModal{{ $surat->id }}">
                                            Detail
                                        </button>
                                    </td>
                                </tr>

                                <!-- Detail Modal -->
                                <div class="modal fade" id="detailSuratModal{{ $surat->id }}" tabindex="-1"
                                    aria-labelledby="detailSuratModalLabel{{ $surat->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailSuratModalLabel{{ $surat->id }}">
                                                    Detail Surat Keluar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Nomor Surat:</strong> {{ $surat->nomor_surat }}</p>
                                                <p><strong>Penerima:</strong> {{ $surat->penerima }}</p>
                                                <p><strong>Perihal:</strong> {{ $surat->perihal }}</p>
                                                <p><strong>Tanggal Surat:</strong> {{ $surat->tanggal_surat }}</p>
                                                <p><strong>Keterangan:</strong> {{ $surat->keterangan }}</p>
                                                @if($surat->foto_surat)
                                                <p><strong>Foto Surat:</strong></p>
                                                <img src="{{ asset('storage/' . $surat->foto_surat) }}" alt="Foto Surat"
                                                    class="img-fluid">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Surat -->
    <div class="modal fade" id="tambahSuratModal" tabindex="-1" aria-labelledby="tambahSuratModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('surat-keluar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahSuratModalLabel">Tambah Surat Keluar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nomor_surat" class="form-label">Nomor Surat</label>
                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required>
                        </div>
                        <div class="mb-3">
                            <label for="penerima" class="form-label">Penerima</label>
                            <input type="text" class="form-control" id="penerima" name="penerima" required>
                        </div>
                        <div class="mb-3">
                            <label for="perihal" class="form-label">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto_surat" class="form-label">Foto Surat (optional)</label>
                            <input type="file" class="form-control" id="foto_surat" name="foto_surat" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Surat</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
@endsection