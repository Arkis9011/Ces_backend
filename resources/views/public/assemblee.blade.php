@extends('layouts.public')

@section('title', 'Assemblée Générale | Conseil Économique et Social - RDC')

@section('content')
<!-- PAGE HERO -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Le CES <i class="fas fa-chevron-right"></i><span>Assemblée Générale</span>
    </div>
    <div class="hero-tag"><i class="fas fa-landmark"></i> Organe délibérant</div>
    <h1>Assemblée <em>Générale</em></h1>
    <p>L'Assemblée Générale réunit l'ensemble des Conseillers de la République. Elle constitue l'organe délibérant suprême du CES.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL -->
<div class="content-wrap">
  <div class="container py-5">
    <div class="row g-5">
      <div class="col-lg-8">
        <div class="s-tag">Composition</div>
        <h2 class="s-title">Conseillers de <span>la République</span></h2>
        <p class="prose mb-4">Les 68 conseillers représentent toutes les composantes de la société civile congolaise. Ils sont issus de douze catégories socioprofessionnelles :</p>

        <div class="row g-3 categories-grid">
          @php
            $categories = [
                1 => ['nom' => 'Organisations Employeurs', 'icon' => 'briefcase'],
                2 => ['nom' => 'Syndicats Travailleurs', 'icon' => 'users'],
                3 => ['nom' => 'O.N.G Environnement', 'icon' => 'leaf'],
                4 => ['nom' => 'Confessions Religieuses', 'icon' => 'church'],
                5 => ['nom' => 'Ordres Professionnels', 'icon' => 'gavel'],
                6 => ['nom' => 'Associations Femmes', 'icon' => 'venus'],
                7 => ['nom' => 'Autorités Coutumières', 'icon' => 'crown'],
                8 => ['nom' => 'Monde Scientifique', 'icon' => 'flask'],
                9 => ['nom' => 'Secteur Financier', 'icon' => 'university'],
                10 => ['nom' => 'Personnalités Indépendantes', 'icon' => 'user-tie'],
                11 => ['nom' => 'Diaspora', 'icon' => 'globe-africa'],
                12 => ['nom' => 'Délégués Provinces', 'icon' => 'map-marked-alt'],
            ];
          @endphp

          @foreach($categories as $id => $cat)
            <div class="col-md-4 col-sm-6">
              <div class="categorie-card reveal h-100 p-4 border rounded bg-white shadow-sm text-center cursor-pointer" data-id="{{ $id }}" style="cursor:pointer">
                <div class="cat-icon h2 text-primary mb-3"><i class="fas fa-{{ $cat['icon'] }}"></i></div>
                <h6 class="fw-bold small mb-0">{{ $cat['nom'] }}</h6>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <!-- Sidebar -->
      <aside class="col-lg-4">
        <div class="sidebar-box mb-4 p-4 border rounded bg-white shadow-sm">
          <h5 class="mb-3 fw-bold"><i class="fas fa-calendar-check me-2 text-primary"></i> Prochaine plénière</h5>
          <p class="small text-muted mb-3">Consultez l'agenda pour connaître les dates des prochaines séances plénières du CES.</p>
          <a href="{{ url('agenda') }}" class="btn btn-sm btn-outline-primary">Voir l'agenda</a>
        </div>
        <div class="sidebar-box p-4 border rounded bg-light">
          <h5 class="mb-3 fw-bold theme-color-secondary"><i class="fas fa-info-circle me-2"></i> Fonctionnement</h5>
          <ul class="list-unstyled small text-muted">
            <li class="mb-2"><i class="fas fa-circle-dot me-2 small"></i> 2 sessions ordinaires par an</li>
            <li class="mb-2"><i class="fas fa-circle-dot me-2 small"></i> Sessions extraordinaires</li>
            <li class="mb-2"><i class="fas fa-circle-dot me-2 small"></i> Quorum requis pour délibérer</li>
            <li><i class="fas fa-circle-dot me-2 small"></i> Séances publiques</li>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</div>

<!-- Modal pour les conseillers -->
<div class="modal fade" id="councilorModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title fw-bold" id="modalTitle">Liste des Conseillers</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead class="bg-light">
              <tr>
                <th class="ps-4">Nom & Prénom</th>
                <th>Fonction / Mandat</th>
              </tr>
            </thead>
            <tbody id="modalTableBody">
              <tr>
                <td colspan="2" class="text-center py-4 text-muted small">Données en cours de chargement...</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Intersection Observer
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.style.opacity = '1';
          e.target.style.transform = 'translateY(0)';
        }
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      observer.observe(el);
    });

    // Gestion du modal (simulation de données pour l'exemple)
    const modal = new bootstrap.Modal(document.getElementById('councilorModal'));
    const modalTitle = document.getElementById('modalTitle');
    const tableBody = document.getElementById('modalTableBody');

    document.querySelectorAll('.categorie-card').forEach(card => {
      card.addEventListener('click', () => {
        const catName = card.querySelector('h6').innerText;
        modalTitle.innerText = catName;
        tableBody.innerHTML = `<tr><td colspan="2" class="text-center py-4 text-muted small">Liste des conseillers pour "${catName}" bientôt disponible.</td></tr>`;
        modal.show();
      });
    });
  });
</script>
@endsection