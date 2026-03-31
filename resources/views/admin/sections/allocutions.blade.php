<section id="section-allocutions" class="admin-section {{ $activeTab == 'section-allocutions' ? 'active' : '' }}">
    <div class="mb-2 text-uppercase fw-bold text-muted" style="font-size: 0.75rem; letter-spacing: 1px;">Gestion des contenus</div>
    <h2 class="h4 mb-4 fw-bold" style="color:#003366">Gérer les <span style="color:#007fff">Allocutions</span></h2>
    
    <div class="admin-card mb-4">
        <div class="admin-card-header">
            <i class="fas fa-microphone-alt fa-lg text-primary"></i>
            <h3>Liste des allocutions</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="cursor:pointer" onclick="window.location.href='{{ request()->fullUrlWithQuery(['sort' => 'date_allocution', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}'">
                            Date {!! request('sort') == 'date_allocution' ? (request('direction') == 'asc' ? '<i class="fas fa-sort-up ms-1"></i>' : '<i class="fas fa-sort-down ms-1"></i>') : '<i class="fas fa-sort ms-1 opacity-25"></i>' !!}
                        </th>
                        <th style="cursor:pointer" onclick="window.location.href='{{ request()->fullUrlWithQuery(['sort' => 'titre', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}'">
                            Titre {!! request('sort') == 'titre' ? (request('direction') == 'asc' ? '<i class="fas fa-sort-up ms-1"></i>' : '<i class="fas fa-sort-down ms-1"></i>') : '<i class="fas fa-sort ms-1 opacity-25"></i>' !!}
                        </th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allocutions as $allocution)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($allocution->date_allocution)->translatedFormat('d M Y') }}</td>
                            <td class="fw-bold text-dark">{{ $allocution->titre }}</td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                        <li><a class="dropdown-item text-dark" href="javascript:void(0)" onclick="openViewModal('allocution', {{ $allocution->id }})"><i class="fas fa-eye me-2 text-primary"></i> Voir</a></li>
                                        <li><a class="dropdown-item text-dark" href="javascript:void(0)" onclick="openEditModal('allocution', {{ $allocution->id }})"><i class="fas fa-edit me-2 text-warning"></i> Modifier</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('allocutions.destroy', $allocution->id) }}" method="POST" onsubmit="confirmDelete(event, this)">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger"><i class="fas fa-trash me-2"></i> Supprimer</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center py-4 text-muted">Aucune allocution trouvée.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4 px-3">
            {{ $allocutions->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card-header">
            <i class="fas fa-plus-circle fa-lg text-primary"></i>
            <h3>Nouvelle Allocution</h3>
        </div>
        <form action="{{ route('allocutions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Titre</label>
                    <input type="text" name="titre" class="form-control" required placeholder="Titre de l'allocution...">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Date</label>
                    <input type="date" name="date_allocution" class="form-control" required value="{{ date('Y-m-d') }}">
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label">Document (PDF, DOC)</label>
                <input type="file" name="document" class="form-control" accept=".pdf,.doc,.docx">
            </div>

            <div class="mt-3">
                <label class="form-label fw-bold">Description / Contexte</label>
                <textarea id="allocution-editor" name="description" class="form-control" rows="3" placeholder="Informations complémentaires sur cette intervention...">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn px-4 py-2 fw-bold text-white mt-4" style="background: #003366; border-radius: 8px;">
                <i class="fas fa-paper-plane me-2"></i> Ajouter l'allocution
            </button>
        </form>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialisation pour l'allocution
        const allocElement = document.querySelector('#allocution-editor');
        if (allocElement) {
            ClassicEditor
                .create(allocElement, {
                    toolbar: ['bold', 'italic', 'link', 'bulletedList', 'undo', 'redo']
                })
                .catch(error => console.error('Erreur CKEditor Allocution:', error));
        }
    });
</script>