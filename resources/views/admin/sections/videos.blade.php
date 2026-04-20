<section id="section-videos" class="admin-section {{ (isset($activeTab) && $activeTab == 'section-videos') ? 'active' : '' }}">
    <div class="mb-2 text-uppercase fw-bold text-muted" style="font-size: 0.75rem; letter-spacing: 1px;">Gestion multimédia</div>
    <h2 class="h4 mb-4 fw-bold" style="color:#003366">Gérer les <span style="color:#007fff">Vidéos</span></h2>
    
    <div class="admin-card mb-4">
        <div class="admin-card-header">
            <i class="fas fa-video fa-lg text-primary"></i>
            <h3>Galerie Vidéo</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle admin-table-mobile">
                <thead class="table-light">
                    <tr>
                        <th style="cursor:pointer" onclick="window.location.href='{{ request()->fullUrlWithQuery(['sort' => 'title', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}'">
                            Miniature / Titre {!! request('sort') == 'title' ? (request('direction') == 'asc' ? '<i class="fas fa-sort-up ms-1"></i>' : '<i class="fas fa-sort-down ms-1"></i>') : '<i class="fas fa-sort ms-1 opacity-25"></i>' !!}
                        </th>
                        <th class="d-none d-md-table-cell">Lien / Source</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($videos as $video)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-dark rounded me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 40px; flex-shrink: 0;">
                                        <i class="fas fa-play text-white fa-xs"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-dark" style="display: block; line-height: 1.3;">{{ $video->title }}</span>
                                        <div class="d-md-none mt-1">
                                            <a href="{{ $video->url }}" target="_blank" class="text-primary text-decoration-none small">
                                                <i class="fas fa-external-link-alt me-1"></i> Voir la source
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <a href="{{ $video->url }}" target="_blank" class="text-primary text-decoration-none small">
                                    <i class="fas fa-external-link-alt me-1"></i> Voir la source
                                </a>
                            </td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-link text-muted p-0" type="button" id="dropdownMenuVideo{{ $video->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="dropdownMenuVideo{{ $video->id }}">
                                        <li><a class="dropdown-item text-dark" href="javascript:void(0)" onclick="openViewModal('video', {{ $video->id }})"><i class="fas fa-eye me-2 text-primary"></i> Voir</a></li>
                                        <li><a class="dropdown-item text-dark" href="javascript:void(0)" onclick="openEditModal('video', {{ $video->id }})"><i class="fas fa-edit me-2 text-warning"></i> Modifier</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('videos.destroy', $video->id) }}" method="POST" onsubmit="confirmDelete(event, this)">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger"><i class="fas fa-trash me-2"></i> Supprimer</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center py-4 text-muted">Aucune vidéo dans la galerie.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4 px-3">
            {{ $videos->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card-header">
            <i class="fas fa-plus-circle fa-lg text-primary"></i>
            <h3>Ajouter une vidéo</h3>
        </div>
        <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label">Titre de la vidéo</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                </div>
            </div>
            <div class="row g-3 mt-1">
                <div class="col-md-6">
                    <label class="form-label">URL de la vidéo (YouTube, etc.)</label>
                    <input type="url" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}" placeholder="https://www.youtube.com/watch?v=...">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Ou Upload (Max 50Mo)</label>
                    <input type="file" name="video_file" class="form-control @error('video_file') is-invalid @enderror">
                </div>
            </div>
            <div class="mt-3">
                <label class="form-label fw-bold">Description (Optionnelle)</label>
                <textarea id="video-editor" name="description" class="form-control" rows="2">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn px-4 py-2 fw-bold text-white mt-4" style="background: #003366; border-radius: 8px;">
                <i class="fas fa-cloud-upload-alt me-2"></i> Publier la vidéo
            </button>
        </form>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const videoElement = document.querySelector('#video-editor');
        if (videoElement) {
            ClassicEditor
                .create(videoElement, {
                    toolbar: ['bold', 'italic', 'link', 'bulletedList', 'undo', 'redo'],
                    placeholder: 'Ajoutez une brève description ou le contexte de cette vidéo...'
                })
                .catch(error => console.error('Erreur CKEditor Vidéo:', error));
        }
    });
</script>