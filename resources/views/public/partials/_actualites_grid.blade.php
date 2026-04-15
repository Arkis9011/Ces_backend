<div class="row g-4">
    @forelse($actualites as $post)
        <div class="col-md-4">
            <div class="actu-card h-100 position-relative shadow-sm border-0" style="overflow:hidden; border-radius:15px; transition: transform 0.3s ease;">
                
                {{-- Badge "NOUVEAU" si publié aujourd'hui --}}
                @if(\Carbon\Carbon::parse($post->date_publication)->isToday())
                    <span class="badge bg-danger position-absolute top-0 start-0 m-3 z-3 animate-pulse shadow-sm">
                        <i class="fas fa-bolt"></i> NOUVEAU
                    </span>
                @endif

                {{-- Image avec gestion d'erreur --}}
                <div class="actu-img-wrapper" style="height: 220px; overflow: hidden; background: #f0f0f0;">
                    @if($post->image_url)
                        <img src="{{ $post->image_url }}" alt="{{ $post->titre }}" class="w-100 h-100 img-fit-contain" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    @endif
                    <div class="actu-img-ph w-100 h-100 d-flex align-items-center justify-content-center bg-light text-muted" style="{{ $post->image_url ? 'display:none' : 'display:flex' }}">
                        <i class="fas fa-newspaper fa-3x opacity-25"></i>
                    </div>
                </div>

                <div class="actu-body p-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="actu-date text-primary small fw-bold">
                            <i class="fas fa-calendar-alt me-1"></i> 
                            {{ \Carbon\Carbon::parse($post->date_publication)->translatedFormat('d F Y') }}
                        </div>
                        <div class="actu-time text-muted small">
                            <i class="far fa-clock me-1"></i>
                            {{ \Carbon\Carbon::parse($post->created_at)->format('H:i') }}
                        </div>
                    </div>

                    <span class="badge bg-primary-subtle text-primary mb-2 text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                        {{ $post->categorie ?? 'Actualité' }}
                    </span>

                    <h3 class="h5 fw-bold mb-3" style="font-family: 'Playfair Display', serif; line-height: 1.4; height: 3em; overflow: hidden;">
                        {{ $post->titre }}
                    </h3>

                    <p class="small text-muted mb-4">
                        {{ Str::limit($post->resume, 110) }}
                    </p>

                    <a href="{{ route('actualites.show', $post->id) }}" class="btn btn-link p-0 text-decoration-none fw-bold text-primary">
                        Lire la suite <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div class="p-5 bg-light rounded-4">
                <i class="fas fa-info-circle fa-3x mb-3 text-muted opacity-50"></i>
                <p class="fs-5 text-muted">Aucune actualité ne correspond à votre recherche.</p>
            </div>
        </div>
    @endforelse
</div>

{{-- Pagination AJAX-friendly --}}
<div class="d-flex justify-content-center mt-5 pagination-wrapper" id="pagination-links">
    {{ $actualites->appends(request()->query())->links() }}
</div>
