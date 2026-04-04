<div id="avis-results">
    @forelse($avis as $item)
        <div class="doc-card reveal mb-3 p-4 shadow-sm border-start border-4 border-primary bg-white d-flex align-items-center gap-4" style="border-radius: 8px;">
            <div class="doc-icon flex-shrink-0 d-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle" style="width: 60px; height: 60px;">
                @php
                    $icon = 'fa-file-signature';
                    $comm = strtolower($item->commission);
                    if(str_contains($comm, 'eco')) $icon = 'fa-chart-line';
                    elseif(str_contains($comm, 'cer')) $icon = 'fa-leaf';
                    elseif(str_contains($comm, 'rex')) $icon = 'fa-shield-halved';
                    elseif(str_contains($comm, 'agr')) $icon = 'fa-tractor';
                @endphp
                <i class="fas {{ $icon }} fa-lg"></i>
            </div>
            
            <div class="doc-meta flex-grow-1">
                <div class="d-flex justify-content-between align-items-start mb-1">
                    <span class="badge bg-secondary-subtle text-secondary text-uppercase small" style="font-size: 0.65rem;">{{ $item->commission }}</span>
                    <span class="text-muted small"><i class="far fa-clock me-1"></i>{{ $item->created_at->format('H:i') }}</span>
                </div>
                <h4 class="h6 fw-bold mb-2" style="font-family: 'Inter', sans-serif; line-height: 1.5;">{{ $item->titre }}</h4>
                <div class="d-flex align-items-center gap-3">
                    <div class="doc-date text-muted small">
                        <i class="fas fa-calendar-alt me-1 text-primary"></i> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                    </div>
                    <a href="{{ route('avis.detail', $item->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                        <i class="fas fa-eye me-2"></i>Voir les détails
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-5 bg-light rounded-4">
            <i class="fas fa-folder-open fa-3x mb-3 text-muted opacity-25"></i>
            <p class="text-muted">Aucun avis ne correspond à votre recherche.</p>
        </div>
    @endforelse
</div>
