@forelse($pengaduanBaru as $pengaduan)
<div class="dropdown-item d-flex align-items-center pengaduan-item" data-id="{{ $pengaduan->id }}">
    <div class="dropdown-list-image mr-3">
        <img class="rounded-circle" src="{{ $pengaduan->user->foto ?? asset('img/default-profile.png') }}"
             alt="Profile" style="width:40px;height:40px;object-fit:cover;">
        <div class="status-indicator bg-{{ $pengaduan->is_read ? 'secondary' : 'success' }}"></div>
    </div>
    <div class="w-100">
        <div class="d-flex justify-content-between">
            <span class="font-weight-bold text-truncate mr-2">{{ $pengaduan->judul_laporan }}</span>
            <span class="badge badge-{{ $pengaduan->status_badge }} badge-pill">{{ $pengaduan->status_text }}</span>
        </div>
        <div class="small text-gray-500 text-truncate">{{ $pengaduan->nama_pelapor }}</div>
        <div class="small text-muted">
            <i class="far fa-clock mr-1"></i>{{ $pengaduan->created_at->diffForHumans() }}
        </div>
    </div>
</div>
@empty
<div class="dropdown-item text-center py-3">
    <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
    <p class="small text-muted mb-0">Tidak ada pengaduan baru</p>
</div>
@endforelse
