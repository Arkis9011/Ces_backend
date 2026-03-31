<section id="section-events" class="admin-section {{ (isset($activeTab) && $activeTab == 'section-events') ? 'active' : '' }}">
    <div class="mb-2 text-uppercase fw-bold text-muted" style="font-size: 0.75rem; letter-spacing: 1px;">Gestion de l'agenda</div>
    <h2 class="h4 mb-4 fw-bold" style="color:#003366">Gérer l'<span style="color:#007fff">Agenda</span></h2>
    
    <div class="admin-card mb-4">
        <div class="admin-card-header">
            <i class="fas fa-calendar-alt fa-lg text-primary"></i>
            <h3>Événements à venir</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="cursor:pointer" onclick="window.location.href='{{ request()->fullUrlWithQuery(['sort' => 'date', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}'">
                            Date & Heure {!! request('sort') == 'date' ? (request('direction') == 'asc' ? '<i class="fas fa-sort-up ms-1"></i>' : '<i class="fas fa-sort-down ms-1"></i>') : '<i class="fas fa-sort ms-1 opacity-25"></i>' !!}
                        </th>
                        <th style="cursor:pointer" onclick="window.location.href='{{ request()->fullUrlWithQuery(['sort' => 'title', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}'">
                            Titre / Lieu {!! request('sort') == 'title' ? (request('direction') == 'asc' ? '<i class="fas fa-sort-up ms-1"></i>' : '<i class="fas fa-sort-down ms-1"></i>') : '<i class="fas fa-sort ms-1 opacity-25"></i>' !!}
                        </th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($agendas as $event)
                        <tr>
                            <td style="width: 180px;">
                                <div class="fw-bold text-dark">{{ \Carbon\Carbon::parse($event->date)->translatedFormat('d M Y') }}</div>
                                <small class="text-muted">{{ $event->heure ?? '--:--' }}</small>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $event->title }}</div>
                                <small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i> {{ $event->lieu ?? 'Non spécifié' }}</small>
                            </td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-link text-muted p-0" type="button" id="dropdownMenuAgenda{{ $event->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="dropdownMenuAgenda{{ $event->id }}">
                                        <li>
                                            <a class="dropdown-item text-dark" href="javascript:void(0)" onclick="openViewModal('agenda', {{ $event->id }})">
                                                <i class="fas fa-eye me-2 text-primary"></i> Voir
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-dark" href="javascript:void(0)" onclick="openEditModal('agenda', {{ $event->id }})">
                                                <i class="fas fa-edit me-2 text-warning"></i> Modifier
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('agendas.destroy', $event->id) }}" method="POST" onsubmit="confirmDelete(event, this)">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">
                                                    <i class="fas fa-trash me-2"></i> Supprimer
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted">Aucun événement prévu.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4 px-3">
            {{ $agendas->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card-header">
            <i class="fas fa-plus-circle fa-lg text-primary"></i>
            <h3>Nouvel événement</h3>
        </div>
        <form action="{{ route('agendas.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Titre de l'événement</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', date('Y-m-d')) }}" required>
                </div>
            </div>
            <div class="row g-3 mt-1">
                <div class="col-md-4">
                    <label class="form-label">Heure</label>
                    <input type="time" name="heure" class="form-control" value="{{ old('heure') }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Lieu</label>
                    <input type="text" name="lieu" class="form-control" value="{{ old('lieu') }}" placeholder="Ex: Salle de conférence...">
                </div>
            </div>
            <div class="mt-3">
                <label class="form-label fw-bold">Résumé / Description</label>
                <textarea id="agenda-editor" name="summary" class="form-control @error('summary') is-invalid @enderror" rows="3">{{ old('summary') }}</textarea>
            </div>
            <button type="submit" class="btn px-4 py-2 fw-bold text-white mt-4" style="background: #003366; border-radius: 8px;">
                <i class="fas fa-save me-2"></i> Enregistrer l'événement
            </button>
        </form>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialisation de CKEditor pour l'agenda
        const agendaElement = document.querySelector('#agenda-editor');
        if (agendaElement) {
            ClassicEditor
                .create(agendaElement, {
                    toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'undo', 'redo']
                })
                .catch(error => {
                    console.error('Erreur CKEditor Agenda:', error);
                });
        }
    });
</script>