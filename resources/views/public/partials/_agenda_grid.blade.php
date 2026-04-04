<div id="agenda-results">
    @forelse($evenements as $item)
        @php
            $dateObj = \Carbon\Carbon::parse($item->date);
        @endphp
        
        <div class="agenda-item reveal">
            <div class="agenda-date-box">
                <div class="day">{{ $dateObj->format('d') }}</div>
                <div class="month">{{ $dateObj->translatedFormat('M') }}</div>
            </div>

            <div class="agenda-info">
                <h4>{{ $item->title }}</h4>
                <p>{{ $item->summary }}</p>
                
                <div class="a-meta">
                    @if($item->lieu)
                        <span><i class="fas fa-map-marker-alt"></i> {{ $item->lieu }}</span>
                    @endif
                    
                    @if($item->heure)
                        <span><i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($item->heure)->format('H\hi') }}</span>
                    @else
                        <span><i class="fas fa-clock"></i> Heure à définir</span>
                    @endif
                </div>
                <div class="mt-3">
                    <a href="{{ route('agenda.show', $item->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                        <i class="fas fa-eye me-2"></i>Voir les détails
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <p class="text-muted">Aucun événement ne correspond à votre recherche.</p>
        </div>
    @endforelse
</div>
