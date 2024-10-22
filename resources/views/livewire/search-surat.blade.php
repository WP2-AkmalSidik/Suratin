<div>
    <!-- Input Pencarian -->
    <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
            <i class="ri-search-line ri-22px me-2"></i>
            <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..."
                wire:model.debounce.500ms="query" />
        </div>
    </div>

    <!-- Hasil Pencarian -->
    <div class="mt-3">
        @if($query)
        @if($results && $results->isNotEmpty())
        <ul class="list-group">
            @foreach($results as $surat)
            <li class="list-group-item">
                <strong>{{ $surat->nomor_surat }}</strong> - {{ $surat->perihal }}
            </li>
            @endforeach
        </ul>
        @else
        <p>No results found for "{{ $query }}"</p>
        @endif
        @endif
    </div>
</div>
