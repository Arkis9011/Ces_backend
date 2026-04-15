@extends('layouts.public')

@section('title', 'Nos Avis | CES RDC')

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Travaux <i class="fas fa-chevron-right"></i><span>Nos Avis</span>
    </div>
    <h1>Nos <em>Avis</em> &amp; Recommandations</h1>
    <p>Ensemble des avis produits par le Conseil Économique et Social sur les grandes questions économiques, sociales et environnementales.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-8">
        <!-- Barre de filtrage AJAX -->
        <div class="filter-toolbar mb-4">
            <form action="{{ url('avis') }}" method="get" class="w-100 d-flex flex-wrap gap-3" id="filterForm">
                <div class="filter-group filter-search">
                    <label for="q">Rechercher un avis</label>
                    <div class="position-relative">
                        <input type="text" name="q" id="q" class="filter-control" placeholder="Mots-clés..." value="{{ request('q') }}">
                        <i class="fas fa-search position-absolute" style="right: 15px; top: 50%; transform: translateY(-50%); color: #ccc;"></i>
                    </div>
                </div>
                <div class="filter-group">
                    <label for="commission">Commission</label>
                    <select name="commission" id="commission" class="filter-control">
                        <option value="all">Toutes les commissions</option>
                        @foreach(['ECOFIN', 'CERNAT', 'CSAC', 'CEFE', 'CIAT', 'REX', 'AGRIDEV', 'AD-HOC'] as $comm)
                            <option value="{{ $comm }}" {{ request('commission') == $comm ? 'selected' : '' }}>{{ $comm }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-group">
                    <label for="sort">Trier par</label>
                    <select name="sort" id="sort" class="filter-control">
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Plus récent</option>
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Plus ancien</option>
                    </select>
                </div>
            </form>
        </div>

        <div id="ajax-results" class="position-relative">
            <div id="avis-tous" class="tab-panel active" data-group="avis">
                @include('public.partials._avis_grid')
            </div>
            <!-- Overlay de chargement -->
            <div class="loading-overlay d-none position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(255,255,255,0.7); z-index: 10;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Chargement...</span>
                </div>
            </div>
        </div>

      </div>

      <aside class="col-lg-4">
        <div class="sidebar-box p-4 bg-white shadow-sm rounded-4 mb-4">
          <h4 class="h5 fw-bold mb-4 border-bottom pb-2"><i class="fas fa-filter text-primary me-2"></i>Rôle consultatif</h4>
          <p class="small text-muted">Les avis du CES sont le fruit de délibérations rigoureuses au sein des commissions spécialisées, visant à éclairer les décisions publiques.</p>
          <ul class="list-unstyled mt-3">
            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Études d'impact</li>
            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Rapports annuels</li>
            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Recommandations stratégiques</li>
          </ul>
        </div>
        
        <div class="sidebar-highlight p-4 text-white rounded-4 shadow-lg" style="background: linear-gradient(135deg, var(--bleu), #003366);">
          <h4 class="h5 fw-bold mb-3"><i class="fas fa-paper-plane me-2"></i>Saisine du Conseil</h4>
          <p class="small opacity-75">Le CES peut être saisi par le Président de la République, le Gouvernement ou le Parlement.</p>
          <a href="{{ url('contact') }}" class="btn btn-warning w-100 fw-bold mt-2">Nous contacter</a>
        </div>
      </aside>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  // Animation reveal
  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.style.opacity = '1';
        e.target.style.transform = 'translateY(0)';
      }
    });
  }, { threshold: .08 });

  document.querySelectorAll('.reveal').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(18px)';
    el.style.transition = 'opacity .5s ease, transform .5s ease';
    obs.observe(el);
  });
</script>
@endsection