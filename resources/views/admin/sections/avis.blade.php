<section id="section-avis" class="admin-section {{ (isset($activeTab) && $activeTab == 'section-avis') ? 'active' : '' }}">
    <div class="mb-2 text-uppercase fw-bold text-muted" style="font-size: 0.75rem; letter-spacing: 1px;">Rapports et travaux</div>
    <h2 class="h4 mb-4 fw-bold" style="color:#003366">Gérer les <span style="color:#007fff">Avis rendus</span></h2>
    
    <div class="admin-card mb-4">
        <div class="admin-card-header">
            <i class="fas fa-balance-scale fa-lg text-primary"></i>
            <h3>Liste des avis publiés</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="cursor:pointer" onclick="window.location.href='{{ request()->fullUrlWithQuery(['sort' => 'titre', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}'">
                            Titre / Commission {!! request('sort') == 'titre' ? (request('direction') == 'asc' ? '<i class="fas fa-sort-up ms-1"></i>' : '<i class="fas fa-sort-down ms-1"></i>') : '<i class="fas fa-sort ms-1 opacity-25"></i>' !!}
                        </th>
                        <th>Date</th> <th>Document</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($avis as $item)
                        <tr>
                            <td>
                                <div class="fw-bold text-dark">{{ $item->titre }}</div>
                                <small class="text-muted"><i class="fas fa-users me-1"></i> {{ $item->commission }}</small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">
                                    <i class="far fa-calendar-alt me-1"></i> 
                                    {{ $item->date_publication ? $item->date_publication->format('d/m/Y') : 'N/A' }}
                                </span>
                            </td>
                            <td>
                                @if($item->pdf_url)
                                    <a href="{{ $item->pdf_url }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-file-pdf me-1"></i> PDF
                                    </a>
                                @else
                                    <span class="text-muted small italic">Aucun document</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-link text-muted p-0" type="button" id="dropdownMenuAvis{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="dropdownMenuAvis{{ $item->id }}">
                                        <li>
                                            <a class="dropdown-item text-dark" href="javascript:void(0)" onclick="openViewModal('avi', {{ $item->id }})">
                                                <i class="fas fa-eye me-2 text-primary"></i> Voir
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-dark" href="javascript:void(0)" onclick="openEditModal('avi', {{ $item->id }})">
                                                <i class="fas fa-edit me-2 text-warning"></i> Modifier
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('avis.destroy', $item->id) }}" method="POST" onsubmit="confirmDelete(event, this)">
                                                @csrf @method('DELETE')
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
                            <td colspan="4" class="text-center py-4 text-muted">Aucun avis rendu pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4 px-3">
            {{ $avis->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card-header">
            <i class="fas fa-plus-circle fa-lg text-primary"></i>
            <h3>Nouveau rapport / avis</h3>
        </div>
        <form action="{{ route('avis.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Titre de l'avis</label>
                    <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Commission</label>
                    <select name="commission" class="form-select">
                        <option value="CERNAT" {{ old('commission') == 'CERNAT' ? 'selected' : '' }}>CERNAT</option>
                        <option value="ECOFIN" {{ old('commission') == 'ECOFIN' ? 'selected' : '' }}>ECOFIN</option>
                        <option value="REX" {{ old('commission') == 'REX' ? 'selected' : '' }}>REX</option>
                        <option value="CSAC" {{ old('commission') == 'CSAC' ? 'selected' : '' }}>CSAC</option>
                        <option value="CEFE" {{ old('commission') == 'CEFE' ? 'selected' : '' }}>CEFE</option>
                        <option value="AGRIDEV" {{ old('commission') == 'AGRIDEV' ? 'selected' : '' }}>AGRIDEV</option>
                        <option value="CIAT" {{ old('commission') == 'CIAT' ? 'selected' : '' }}>CIAT</option>
                        <option value="AD-HOC" {{ old('commission') == 'AD-HOC' ? 'selected' : '' }}>AD-HOC</option>

                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Date de publication</label>
                    <input type="date" name="date_publication" class="form-control @error('date_publication') is-invalid @enderror" value="{{ old('date_publication', date('Y-m-d')) }}" required>
                </div>
            </div>
            <div class="row g-3 mt-1">
                <div class="col-md-6">
                    <label class="form-label">Fichier PDF (Optionnel)</label>
                    <input type="file" name="pdf_file" class="form-control @error('pdf_file') is-invalid @enderror" accept="application/pdf">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Image d'illustration (Optionnelle)</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                </div>
            </div>
            <div class="mt-3">
                <label class="form-label fw-bold">Résumé succinct</label>
                <textarea id="avis-editor" name="resume" class="form-control @error('resume') is-invalid @enderror" rows="3">{{ old('resume') }}</textarea>
            </div>
            <button type="submit" class="btn px-4 py-2 fw-bold text-white mt-4" style="background: #003366; border-radius: 8px;">
                <i class="fas fa-file-export me-2"></i> Publier l'avis
            </button>
        </form>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const avisElement = document.querySelector('#avis-editor');
        if (avisElement) {
            ClassicEditor
                .create(avisElement, {
                    toolbar: [
                        'heading', '|', 
                        'bold', 'italic', 'link', '|', 
                        'bulletedList', 'numberedList', 'blockQuote', '|', 
                        'undo', 'redo'
                    ]
                })
                .catch(error => {
                    console.error('Erreur CKEditor Avis:', error);
                });
        }
    });
</script>