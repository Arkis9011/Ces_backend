<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tableau de Bord | Administration CES</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo_header.png') }}">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v=1.5">

  <style>
    body { background: #f4f7fa; min-height: 100vh; display: flex; font-family: 'Inter', sans-serif; overflow-x: hidden; }
    html { overflow-x: hidden; }
    .admin-sidebar { width: 280px; background: #003366; color: #fff; display: flex; flex-direction: column; position: fixed; top: 0; bottom: 0; left: 0; z-index: 100; transition: all 0.3s; }
    .admin-brand { padding: 24px; border-bottom: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; gap: 15px; }
    .admin-brand img { width: 65px; background: #fff; padding: 6px; border-radius: 10px; transition: all 0.3s; }
    @media (max-width: 991px) { .admin-brand img { width: 75px; } }
    .admin-brand span { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.1rem; line-height: 1.2; white-space: nowrap; }
    .admin-nav { flex: 1; padding: 20px 0; overflow-y: auto; }
    .admin-nav a, .admin-nav button { display: flex; align-items: center; gap: 12px; padding: 12px 24px; color: rgba(255,255,255,0.7); text-decoration: none; transition: all 0.2s; font-weight: 500; font-size: 0.95rem; border: none; background: none; width: 100%; text-align: left; }
    .admin-nav a:hover, .admin-nav a.active { color: #ffcc00; background: rgba(255,255,255,0.05); border-left: 4px solid #ffcc00; }
    .admin-main { flex: 1; margin-left: 280px; display: flex; flex-direction: column; min-height: 100vh; width: 100%; overflow-x: hidden; }
    .admin-topbar { height: 70px; background: #fff; border-bottom: 1px solid #e5ebf4; display: flex; align-items: center; justify-content: space-between; padding: 0 30px; position: sticky; top: 0; z-index: 90; }
    .admin-user { display: flex; align-items: center; gap: 10px; font-weight: 600; color: #333; }
    .admin-content { padding: 30px; flex: 1; }
    .admin-card { background: #fff; border-radius: 12px; border: 1px solid #e5ebf4; padding: 24px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); margin-bottom: 24px; overflow: hidden; }
    .admin-card-header { display: flex; align-items: center; gap: 10px; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #e5ebf4; }
    .admin-card-header h3 { font-family: 'Playfair Display', serif; font-size: 1.3rem; color: #003366; margin: 0; }
    .admin-section { display: none; animation: fadeIn 0.3s ease-in; }
    .admin-section.active { display: block; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    @media (max-width: 991px) { 
      body { display: block; overflow-x: hidden; position: relative; width: 100%; }
      .admin-sidebar { transform: translateX(-100%); width: 260px; } 
      .admin-sidebar.show { transform: translateX(0); box-shadow: 10px 0 30px rgba(0,0,0,0.2); } 
      .admin-main { margin-left: 0; transition: margin-left 0.3s; width: 100%; max-width: 100%; overflow-x: hidden; display: block; } 
      .mobile-menu-btn { display: flex !important; }  
      .admin-content { padding: 15px; width: 100%; max-width: 100%; box-sizing: border-box; overflow-x: hidden; }
      .admin-topbar { padding: 0 15px; width: 100%; max-width: 100%; box-sizing: border-box; overflow-x: hidden; }
      .admin-card { padding: 12px; width: 100%; max-width: 100% !important; margin-left: 0 !important; margin-right: 0 !important; box-sizing: border-box; overflow-wrap: break-word; overflow-x: hidden; }
      .admin-card .row { margin-left: 0 !important; margin-right: 0 !important; }
      .admin-card .col-md-6, .admin-card .col-md-3 { padding-left: 0 !important; padding-right: 0 !important; }
      .admin-user span { max-width: 90px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: inline-block; vertical-align: middle; }
    }
    .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 95; }
    .sidebar-overlay.show { display: block; }
    .mobile-menu-btn { display: none; background: #f0f2f5; border: 1px solid #e5ebf4; border-radius: 8px; width: 40px; height: 40px; font-size: 1.2rem; color: #003366; align-items: center; justify-content: center; }
    /* Style pour le menu trois points */
.dropdown-item {
    font-size: 0.9rem;
    padding: 8px 16px;
    font-weight: 500;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
}

    .btn-link:focus {
        box-shadow: none;
    }
    
    @media (max-width: 767.98px) {
        .admin-table-mobile tr {
            display: block;
            background: #fff;
            border: 1px solid #e5ebf4;
            border-radius: 12px;
            margin-bottom: 15px;
            padding: 15px;
            position: relative;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
            width: 100% !important;
        }
        .admin-table-mobile thead { display: none; }
        .table-responsive { overflow-x: hidden !important; }
        .admin-table-mobile td {
            display: block;
            width: 100% !important;
            border: none;
            padding: 5px 0;
            text-align: left !important;
            word-break: break-word;
            overflow-wrap: anywhere;
        }
        .admin-table-mobile td.text-end {
            position: absolute;
            top: 10px;
            right: 10px;
            width: auto !important;
            padding: 0;
        }
        .mobile-label {
            display: inline-block;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #999;
            margin-right: 5px;
        }
        .admin-table-mobile .img-cover {
            width: 50px !important;
            height: 50px !important;
        }
    }
  </style>
</head>
<body>

  <!-- Overlay pour mobile -->
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <aside class="admin-sidebar" id="sidebar">
    <div class="admin-brand">
      <img src="{{ asset('assets/images/LOGO.png') }}" alt="Logo CES">
      <span>Dashboard<br>Administrateur</span>
    </div>
    <nav class="admin-nav">
      @php
          $activeTab = 'section-actus';
          if(request()->has('agendas')) $activeTab = 'section-events';
          elseif(request()->has('videos')) $activeTab = 'section-videos';
          elseif(request()->has('avis')) $activeTab = 'section-avis';
          elseif(request()->has('allocutions')) $activeTab = 'section-allocutions';
      @endphp
      <a href="#actus" class="nav-btn {{ $activeTab == 'section-actus' ? 'active' : '' }}" data-target="section-actus"><i class="fas fa-newspaper"></i> Actualités</a>
      <a href="#events" class="nav-btn {{ $activeTab == 'section-events' ? 'active' : '' }}" data-target="section-events"><i class="fas fa-calendar-alt"></i> Agenda</a>
      <a href="#videos" class="nav-btn {{ $activeTab == 'section-videos' ? 'active' : '' }}" data-target="section-videos"><i class="fas fa-video"></i> Vidéos</a>
      <a href="#avis" class="nav-btn {{ $activeTab == 'section-avis' ? 'active' : '' }}" data-target="section-avis"><i class="fas fa-balance-scale"></i> Avis rendus</a>
      <a href="#allocutions" class="nav-btn {{ $activeTab == 'section-allocutions' ? 'active' : '' }}" data-target="section-allocutions"><i class="fas fa-microphone-alt"></i> Allocutions</a>
      
      <a href="{{ route('profile.edit') }}"><i class="fas fa-user-cog"></i> Mon Profil</a>
      <a href="{{ url('/') }}" style="margin-top: 30px;"><i class="fas fa-globe"></i> Retour au site</a>
      
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-danger">
          <i class="fas fa-sign-out-alt"></i> Déconnexion
        </button>
      </form>
    </nav>
  </aside>

  <main class="admin-main">
    <header class="admin-topbar">
      <div class="ms-auto admin-user me-3">
        <i class="fas fa-user-circle fs-4" style="color:#007fff"></i>
        <span>{{ Auth::user()->name }}</span>
      </div>
      <button class="mobile-menu-btn" id="menuToggle"><i class="fas fa-bars"></i></button>
    </header>

    <div class="admin-content">
      
      <section id="section-actus" class="admin-section {{ $activeTab == 'section-actus' ? 'active' : '' }}">
        <div class="mb-2 text-uppercase fw-bold text-muted" style="font-size: 0.75rem; letter-spacing: 1px;">Gestion des contenus</div>


        @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: "{{ session('success') }}",
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>
        @endif

        @if(session('js_error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: "{!! session('js_error') !!}",
                });
            </script>
        @endif

        @if($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Validation',
                    html: '<ul class="text-start">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                });
            </script>
        @endif


        <h2 class="h4 mb-4 fw-bold" style="color:#003366">Gérer les <span style="color:#007fff">Actualités</span></h2>
        
        <div class="admin-card mb-4">
          <div class="admin-card-header">
            <i class="fas fa-list fa-lg text-primary"></i>
            <h3>Liste des publications récentes</h3>
          </div>
          <div class="table-responsive">
            <table class="table table-hover align-middle admin-table-mobile">
              <thead class="table-light">
                <tr>
                  <th class="d-none d-md-table-cell" style="cursor:pointer" onclick="window.location.href='{{ request()->fullUrlWithQuery(['sort' => 'date_publication', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}'">
                    Date {!! request('sort') == 'date_publication' ? (request('direction') == 'asc' ? '<i class="fas fa-sort-up ms-1"></i>' : '<i class="fas fa-sort-down ms-1"></i>') : '<i class="fas fa-sort ms-1 opacity-25"></i>' !!}
                  </th>
                  <th style="cursor:pointer" onclick="window.location.href='{{ request()->fullUrlWithQuery(['sort' => 'titre', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}'">
                    Titre {!! request('sort') == 'titre' ? (request('direction') == 'asc' ? '<i class="fas fa-sort-up ms-1"></i>' : '<i class="fas fa-sort-down ms-1"></i>') : '<i class="fas fa-sort ms-1 opacity-25"></i>' !!}
                  </th>
                  <th class="text-end">Actions</th>
                </tr>
              </thead>
        <tbody>
    @forelse ($posts as $post)
        <tr>
            <td class="d-none d-md-table-cell" style="width: 120px;">
                {{ \Carbon\Carbon::parse($post->date_publication)->translatedFormat('d M Y') }}
            </td>
            <td>
                <div class="d-flex align-items-center">
                    @if($post->image_url)
                        <img src="{{ $post->image_url }}" alt="" class="rounded me-3 img-cover" style="width: 45px; height: 45px; flex-shrink: 0;">
                    @endif
                    <div>
                        <div class="d-md-none text-muted small mb-1">
                            <i class="far fa-calendar-alt me-1"></i> {{ \Carbon\Carbon::parse($post->date_publication)->translatedFormat('d M Y') }}
                        </div>
                        <span class="fw-bold text-dark" style="line-height: 1.3; display: block;">{{ $post->titre }}</span>
                        <div class="d-md-none mt-1">
                             <span class="badge bg-light text-primary border" style="font-size: 0.65rem;">{{ $post->categorie }}</span>
                        </div>
                    </div>
                </div>
            </td>
         <td class="text-end">
    <div class="dropdown">
        <button class="btn btn-link text-muted p-0" type="button" id="dropdownMenu{{ $post->id }}" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="dropdownMenu{{ $post->id }}">
            <li>
                <a class="dropdown-item text-dark" href="javascript:void(0)" onclick="openViewModal('post', {{ $post->id }})">
                    <i class="fas fa-eye me-2 text-primary"></i> Voir
                </a>
            </li>
            <li>
                <a class="dropdown-item text-dark" href="javascript:void(0)" onclick="openEditModal('post', {{ $post->id }})">
                    <i class="fas fa-edit me-2 text-warning"></i> Modifier
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="confirmDelete(event, this)">
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
            <td colspan="3" class="text-center py-4 text-muted">
                <i class="fas fa-folder-open fa-2x mb-2"></i><br>
                Aucune actualité publiée pour le moment.
            </td>
        </tr>
    @endforelse
</tbody>
            </table>
          </div>
          <div class="mt-4 px-3">
              {{ $posts->appends(request()->query())->links('pagination::bootstrap-5') }}
          </div>
        </div>
<div class="admin-card">
    <div class="admin-card-header">
        <i class="fas fa-plus-circle fa-lg text-primary"></i>
        <h3>Nouvelle publication</h3>
    </div>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="row g-3">
            <div class="col-md-8">
                <label class="form-label">Titre de l'actualité</label>
                <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}" placeholder="Entrez le titre principal..." required>
                @error('titre') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">Date</label>
                <input type="date" name="date_publication" class="form-control @error('date_publication') is-invalid @enderror" value="{{ old('date_publication', date('Y-m-d')) }}" required>
                @error('date_publication') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label">Image de couverture</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                <small class="text-muted">L'image sera hébergée sur ImageKit</small>
            </div>
            <div class="col-md-6">
                <label class="form-label">Tag / Catégorie</label>
                <select name="categorie" class="form-select">
                    <option value="Séance plénière">Séance plénière</option>
                    <option value="Audience">Audience</option>
                    <option value="Communiqué">Communiqué</option>
                    <option value="Partenariat">Partenariat</option>
                    <option value="Séance académique">Séance académique</option>
                    <option value="Forum">Forum</option>
                    <option value="autre">autre</option>
                </select>
            </div>
        </div>

        <div class="mt-3">
            <label class="form-label">Résumé de l'article</label>
            <textarea name="resume" class="form-control @error('resume') is-invalid @enderror" rows="2" placeholder="Un court résumé pour la liste..." required>{{ old('resume') }}</textarea>
            @error('resume') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mt-3">
            <label class="form-label fw-bold text-primary">Contenu principal (Obligatoire)</label>
            <textarea id="create-editor-main" name="contenu" class="form-control @error('contenu') is-invalid @enderror" rows="6" placeholder="Introduction ou corps principal...">{{ old('contenu') }}</textarea>
        </div>

        <hr class="my-4">
        <h5 class="text-muted mb-3"><i class="fas fa-plus-circle me-2"></i>Sections & Images Supplémentaires (Optionnelles)</h5>

        <div class="row g-3">
            <div class="col-md-6 border-end">
                <label class="form-label fw-bold">Sous-titre / Section 1</label>
                <textarea id="create-editor-s1" name="section_1" class="form-control mb-2" rows="3" placeholder="Texte additionnel...">{{ old('section_1') }}</textarea>
                
                <label class="form-label small text-muted mt-2">Image pour cette section</label>
                <input type="file" name="image_url_2" class="form-control form-control-sm">
            </div>
            
            <div class="col-md-6">
                <label class="form-label fw-bold">Sous-titre / Section 2</label>
                <textarea id="create-editor-s2" name="section_2" class="form-control mb-2" rows="3" placeholder="Texte additionnel...">{{ old('section_2') }}</textarea>
                
                <label class="form-label small text-muted mt-2">Image pour cette section</label>
                <input type="file" name="image_url_3" class="form-control form-control-sm">
            </div>

            <div class="col-md-12 mt-3">
                <label class="form-label fw-bold">Sous-titre / Section 3</label>
                <textarea id="create-editor-s3" name="section_3" class="form-control mb-2" rows="3" placeholder="Texte de conclusion ou autre...">{{ old('section_3') }}</textarea>
                
                <label class="form-label small text-muted mt-2">Dernière image</label>
                <input type="file" name="image_url_4" class="form-control form-control-sm">
            </div>
        </div>

        <button type="submit" class="btn px-4 py-2 fw-bold text-white mt-5" style="background: #003366; border-radius: 8px;">
            <i class="fas fa-paper-plane me-2"></i> Publier l'actualité
        </button>
    </form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editorSelectors = [
            '#create-editor-main', 
            '#create-editor-s1', 
            '#create-editor-s2', 
            '#create-editor-s3'
        ];

        editorSelectors.forEach(selector => {
            const element = document.querySelector(selector);
            if (element) {
                ClassicEditor
                    .create(element, {
                        toolbar: {
                            items: [
                                'heading', '|',
                                'bold', 'italic', 'link', '|',
                                'bulletedList', 'numberedList', '|',
                                'blockQuote', 'undo', 'redo'
                            ]
                        }
                    })
                    .catch(error => {
                        console.error('Erreur CKEditor:', error);
                    });
            }
        });
    });
</script>
      </section>

@include('admin.sections.agenda')
      @include('admin.sections.videos')
      @include('admin.sections.avis')
      @include('admin.sections.allocutions')

    </div>
  </main>

  <!-- Modal de Visualisation -->
  <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-light">
          <h5 class="modal-title fw-bold" id="viewModalLabel">Détails</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="viewModalBody">
          <!-- Contenu injecté par JS -->
        </div>
      </div>
    </div>
  </div>

  <!-- Modal d'Édition -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-light">
          <h5 class="modal-title fw-bold" id="editModalLabel">Modifier le contenu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editModalBody">
          <!-- Formulaire injecté par JS -->
        </div>
      </div>
    </div>
  </div>

  <script>
    // Navigation par onglets
    document.querySelectorAll('.nav-btn').forEach(btn => {
      btn.addEventListener('click', function(e) {
        document.querySelectorAll('.nav-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.admin-section').forEach(s => s.classList.remove('active'));
        
        this.classList.add('active');
        const targetId = this.getAttribute('data-target');
        document.getElementById(targetId).classList.add('active');

        if (window.innerWidth <= 991) {
          document.getElementById('sidebar').classList.remove('show');
          document.getElementById('sidebarOverlay').classList.remove('show');
        }
      });
    });

    // Toggle Mobile Sidebar
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('show');
            sidebarOverlay.classList.toggle('show');
        });
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('show');
        });
    }

    // Confirmation de suppression SweetAlert
    function confirmDelete(event, form) {
        event.preventDefault();
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "Cette action est irréversible !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimer !',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }

    // --- Fonctions utilitaires pour les Modals ---

    function openViewModal(type, id) {
        const body = document.getElementById('viewModalBody');
        body.innerHTML = '<div class="text-center py-5"><div class="spinner-border text-primary" role="status"></div></div>';
        const modal = new bootstrap.Modal(document.getElementById('viewModal'));
        modal.show();

        fetch(`/api/${type}s?id=${id}`) // On peut aussi faire une route dédiée show
            .then(response => response.json())
            .then(data => {
                const item = Array.isArray(data) ? data.find(i => i.id == id) : data;
                let html = '';
                if (type === 'post') {
                    html = `
                        <div class="text-center mb-4">
                            ${item.image_url ? `<img src="${item.image_url}" class="rounded shadow-sm mb-3 img-cover" style="max-height: 300px; width: 100%;">` : ''}
                            <h4 class="fw-bold">${item.titre}</h4>
                            <span class="badge bg-primary mb-2">${item.categorie}</span>
                            <div class="text-muted small">${item.date_publication}</div>
                        </div>
                        <div class="p-3 bg-light rounded mb-3"><strong>Résumé :</strong> ${item.resume}</div>
                        <div>${item.contenu}</div>
                    `;
                } else if (type === 'agenda') {
                    html = `
                        <h4 class="fw-bold mb-3">${item.title}</h4>
                        <div class="mb-3">
                            <i class="fas fa-calendar me-2"></i> ${item.date} | <i class="fas fa-clock me-2"></i> ${item.heure || '--:--'}
                        </div>
                        <div class="mb-3"><i class="fas fa-map-marker-alt me-2"></i> ${item.lieu || 'Non spécifié'}</div>
                        <div class="p-3 bg-light rounded">${item.summary}</div>
                    `;
                } else if (type === 'video') {
                    html = `
                        <h4 class="fw-bold mb-3">${item.title}</h4>
                        <div class="ratio ratio-16x9 mb-3">
                           <iframe src="${item.url.replace('watch?v=', 'embed/')}" allowfullscreen></iframe>
                        </div>
                        <p>${item.description || 'Aucune description'}</p>
                    `;
                } else if (type === 'avi') {
                    html = `
    <h4 class="fw-bold mb-1">${item.titre}</h4>
    <div class="mb-3">
        <span class="badge bg-primary me-2">${item.commission}</span>
        <span class="text-muted small">
            <i class="far fa-calendar-alt me-1"></i> 
            Publié le : ${item.date_publication ? new Date(item.date_publication).toLocaleDateString('fr-FR') : 'Date non définie'}
        </span>
    </div>

    <div class="p-3 bg-light rounded mb-3">
        <div class="fw-bold mb-1 small text-uppercase text-muted">Résumé :</div>
        ${item.resume || '<i class="text-muted">Aucun résumé disponible.</i>'}
    </div>

    ${item.pdf_url 
        ? `<a href="${item.pdf_url}" target="_blank" class="btn btn-danger">
                <i class="fas fa-file-pdf me-2"></i> Consulter le document PDF
           </a>`
        : `<div class="alert alert-warning py-2 small">
                <i class="fas fa-info-circle me-2"></i> Aucun document PDF n'est rattaché à cet avis.
           </div>`
    }
`;
                } else if (type === 'allocution') {
                    html = `
                        <h4 class="fw-bold mb-3">${item.titre}</h4>
                        <div class="mb-3 text-muted">Date : ${item.date_allocution}</div>
                        ${item.document_url ? `<a href="${item.document_url}" target="_blank" class="btn btn-danger"><i class="fas fa-file-pdf me-2"></i> Voir le document</a>` : '<p class="text-muted">Aucun document joint</p>'}
                    `;
                }
                body.innerHTML = html;
            });
    }

    function openEditModal(type, id) {
    const body = document.getElementById('editModalBody');
    // 1. Afficher le loader
    body.innerHTML = '<div class="text-center py-5"><div class="spinner-border text-primary" role="status"></div></div>';
    
    const modalElement = document.getElementById('editModal');
    const modal = new bootstrap.Modal(modalElement);
    modal.show();

    // 2. Récupérer les données
    fetch(`/api/${type}s?id=${id}`)
        .then(response => response.json())
        .then(data => {
            const item = Array.isArray(data) ? data.find(i => i.id == id) : data;
            let formHtml = '';
            
            // --- CAS DES ACTUALITÉS (POSTS) ---
            if (type === 'post') {
                formHtml = `
                <form action="/admin/posts/${item.id}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
                    
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label class="form-label fw-bold">Titre</label>
                            <input type="text" name="titre" class="form-control" value="${item.titre || ''}" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Date de publication</label>
                            <input type="date" name="date_publication" class="form-control" value="${item.date_publication || ''}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Catégorie</label>
                            <select name="categorie" class="form-select">
                                <option value="Séance plénière" ${item.categorie == 'Séance plénière' ? 'selected' : ''}>Séance plénière</option>
                                <option value="Audience" ${item.categorie == 'Audience' ? 'selected' : ''}>Audience</option>
                                <option value="Communiqué" ${item.categorie == 'Communiqué' ? 'selected' : ''}>Communiqué</option>
                                <option value="Partenariat" ${item.categorie == 'Partenariat' ? 'selected' : ''}>Partenariat</option>
                                <option value="autre" ${item.categorie == 'autre' ? 'selected' : ''}>autre</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Résumé (Texte court)</label>
                        <textarea name="resume" class="form-control" rows="2">${item.resume || ''}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-primary">Contenu Principal</label>
                        <textarea id="editor-main" name="contenu" class="form-control">${item.contenu || ''}</textarea>
                    </div>

                    <div class="p-3 border rounded bg-light mb-3">
                        <h6 class="fw-bold border-bottom pb-2"><i class="fas fa-plus-circle me-2"></i>Sections Additionnelles</h6>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Section 1 & Image 2</label>
                            <textarea id="editor-s1" name="section_1" class="form-control mb-1">${item.section_1 || ''}</textarea>
                            <input type="file" name="image_url_2" class="form-control form-control-sm mt-2">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Section 2 & Image 3</label>
                            <textarea id="editor-s2" name="section_2" class="form-control mb-1">${item.section_2 || ''}</textarea>
                            <input type="file" name="image_url_3" class="form-control form-control-sm mt-2">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Section 3 & Image 4</label>
                            <textarea id="editor-s3" name="section_3" class="form-control mb-1">${item.section_3 || ''}</textarea>
                            <input type="file" name="image_url_4" class="form-control form-control-sm mt-2">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Remplacer l'image de couverture (Principale)</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                        <i class="fas fa-save me-2"></i>Mettre à jour l'actualité
                    </button>
                </form>`;

            // --- CAS DES AGENDAS ---
            } else if (type === 'agenda') {
                formHtml = `
                    <form action="/admin/agendas/${item.id}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="mb-3">
                            <label class="form-label">Titre</label>
                            <input type="text" name="title" class="form-control" value="${item.title}" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Date</label>
                                <input type="date" name="date" class="form-control" value="${item.date}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Heure</label>
                                <input type="time" name="heure" class="form-control" value="${item.heure}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lieu</label>
                            <input type="text" name="lieu" class="form-control" value="${item.lieu}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Résumé</label>
                            <textarea name="summary" class="form-control" rows="3">${item.summary || ''}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
                    </form>`;

            // --- CAS DES VIDÉOS ---
            } else if (type === 'video') {
                formHtml = `
                    <form action="/admin/videos/${item.id}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="mb-3">
                            <label class="form-label">Titre</label>
                            <input type="text" name="title" class="form-control" value="${item.title}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL Vidéo (YouTube)</label>
                            <input type="url" name="url" class="form-control" value="${item.url}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3">${item.description || ''}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
                    </form>`;

            // --- CAS DES AVIS ---
            } else if (type === 'avi') {
                formHtml = `
                  <form action="/admin/avis/${item.id}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
        
        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" value="${item.titre}" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Commission</label>
                <select name="commission" class="form-select">
                    <option value="CERNAT" ${item.commission == 'CERNAT' ? 'selected' : ''}>CERNAT</option>
                    <option value="ECOFIN" ${item.commission == 'ECOFIN' ? 'selected' : ''}>ECOFIN</option>
                    <option value="REX" ${item.commission == 'REX' ? 'selected' : ''}>REX</option>
                    <option value="CSAC" ${item.commission == 'CSAC' ? 'selected' : ''}>CSAC</option>
                    <option value="CEFE" ${item.commission == 'CEFE' ? 'selected' : ''}>CEFE</option>
                    <option value="AGRIDEV" ${item.commission == 'AGRIDEV' ? 'selected' : ''}>AGRIDEV</option>
                    <option value="CIAT" ${item.commission == 'CIAT' ? 'selected' : ''}>CIAT</option>
                    <option value="AD-HOC" ${item.commission == 'AD-HOC' ? 'selected' : ''}>AD-HOC</option>

                </select>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label">Date de publication</label>
                <input type="date" name="date_publication" class="form-control" 
                       value="${item.date_publication ? item.date_publication.substring(0, 10) : ''}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Résumé</label>
            <textarea name="resume" class="form-control" rows="2">${item.resume || ''}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Changer le PDF (Optionnel)</label>
                <input type="file" name="pdf_file" class="form-control" accept=".pdf">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Changer l'image (Optionnel)</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <i class="fas fa-save me-2"></i> Enregistrer les modifications
        </button>
    </form>`;
            // --- CAS DES ALLOCUTIONS ---
            } else if (type === 'allocution') {
                formHtml = `
                    <form action="/admin/allocutions/${item.id}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="mb-3">
                            <label class="form-label">Titre</label>
                            <input type="text" name="titre" class="form-control" value="${item.titre}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date_allocution" class="form-control" value="${item.date_allocution}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Changer le document (PDF, DOC)</label>
                            <input type="file" name="document" class="form-control" accept=".pdf,.doc,.docx">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                    </form>`;
            }

            // 3. Injection du HTML dans le DOM
            body.innerHTML = formHtml;

            // 4. Initialisation des éditeurs CKEditor si c'est un "post"
            if (type === 'post') {
                const editors = ['#editor-main', '#editor-s1', '#editor-s2', '#editor-s3'];
                
                editors.forEach(selector => {
                    const el = document.querySelector(selector);
                    if (el) {
                        ClassicEditor
                            .create(el, {
                                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
                            })
                            .catch(error => console.error('Erreur CKEditor sur ' + selector, error));
                    }
                });
            }
        })
        .catch(error => {
            console.error('Erreur Fetch:', error);
            body.innerHTML = '<div class="alert alert-danger">Une erreur est survenue lors du chargement des données.</div>';
        });
}
    
  </script>



@if(session('js_error'))
<script>
    // Affiche une alerte Windows
    alert("{!! session('js_error') !!}");
    
    // Affiche l'erreur en rouge dans la console (F12)
    console.error("DEBUG LARAVEL : {!! session('js_error') !!}");
</script>
@endif

@if(session('success'))
<script>
    console.log("SUCCÈS : {!! session('success') !!}");
</script>
@endif
</body>
</html>