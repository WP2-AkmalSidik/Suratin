<!-- modals/tambah-surat.blade.php -->
<div class="modal fade" id="inputSuratModal" tabindex="-1" aria-labelledby="inputSuratLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputSuratLabel">Tambah Surat Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                        <input type="text" name="nomor_surat" class="form-control" placeholder="Masukkan nomor surat">
                    </div>
                    <div class="mb-3">
                        <label for="pengirim" class="form-label">Pengirim</label>
                        <input type="text" name="pengirim" class="form-control" placeholder="Masukkan pengirim">
                    </div>
                    <div class="mb-3">
                        <label for="perihal" class="form-label">Perihal</label>
                        <input type="text" name="perihal" class="form-control" placeholder="Masukkan perihal">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                        <input type="date" name="tanggal_surat" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="foto_surat" class="form-label">Upload Scan Surat</label>
                        <input type="file" name="foto_surat" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Surat</button>
                </form>
            </div>
        </div>
    </div>
</div>