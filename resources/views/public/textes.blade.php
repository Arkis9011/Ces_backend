@extends('layouts.public')

@section('title', 'Textes Légaux | Conseil Économique et Social - RDC')

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Le CES <i class="fas fa-chevron-right"></i><span>Textes Légaux et Réglementaires</span>
    </div>
    <div class="hero-tag"><i class="fas fa-gavel"></i> Cadre légal</div>
    <h1>Textes <em>fondateurs</em> et Lois</h1>
    <p>L'ensemble des textes législatifs et réglementaires qui organisent et encadrent le fonctionnement du CES.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="container py-5">
    <div class="row g-5">
      <!-- Colonne principale : documents -->
      <div class="col-lg-8">
        <div class="s-tag">Documents officiels</div>
        <h2 class="s-title">Cadre <span>juridique</span></h2>
        <div class="mt-4">
          <!-- Doc 1 -->
          <div class="doc-card reveal mb-4 p-4 border rounded bg-white shadow-sm d-flex gap-4 align-items-center">
            <div class="doc-icon h1 text-primary mb-0"><i class="fas fa-file-pdf"></i></div>
            <div class="doc-meta flex-grow-1">
              <span class="badge bg-primary mb-2">Constitution</span>
              <h4 class="h5 mb-1">Constitution de la RDC du 18 février 2006 — Articles 208, 209 & 210</h4>
              <div class="small text-muted mb-2"><i class="fas fa-calendar me-1"></i> 18 Février 2006</div>
              <a href="https://ik.imagekit.io/ces/documents/Constitution%20de%20la%203me%20Republique.%2018%20Fev%202006.pdf" target="blank" class="btn btn-sm btn-outline-primary"><i class="fas fa-download me-1"></i> Télécharger</a>
            </div>
          </div>
          <!-- Doc 2 -->
          <div class="doc-card reveal mb-4 p-4 border rounded bg-white shadow-sm d-flex gap-4 align-items-center">
            <div class="doc-icon h1 text-success mb-0"><i class="fas fa-gavel"></i></div>
            <div class="doc-meta flex-grow-1">
              <span class="badge bg-success mb-2">Loi organique</span>
              <h4 class="h5 mb-1">Loi organique n° 13/027 du 30 octobre 2013</h4>
              <div class="small text-muted mb-2"><i class="fas fa-calendar me-1"></i> 30 Octobre 2013</div>
              <a href="https://ik.imagekit.io/ces/documents/LOI%20ORGANIQUE%20n%C2%B0%2013-027%20portant%20organisation%20et%20fonctionnement%20du%20Conseil%20%C3%A9conomique%20et%20social%20(J.O.RDC.,%209%20novembre%202013,%20n%C2%B0%20sp%C3%A9cial,%20col.%201).pdf" target="blank" class="btn btn-sm btn-outline-success"><i class="fas fa-download me-1"></i> Télécharger</a>
            </div>
          </div>
          <!-- Doc 3 -->
          <div class="doc-card reveal mb-4 p-4 border rounded bg-white shadow-sm d-flex gap-4 align-items-center">
            <div class="doc-icon h1 text-info mb-0"><i class="fas fa-book"></i></div>
            <div class="doc-meta flex-grow-1">
              <span class="badge bg-info mb-2">Règlement</span>
              <h4 class="h5 mb-1">Règlement intérieur du CES</h4>
              <div class="small text-muted mb-2"><i class="fas fa-calendar me-1"></i> 2020</div>
              <a href="#" class="btn btn-sm btn-outline-info"><i class="fas fa-download me-1"></i> Télécharger</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar droite -->
      <aside class="col-lg-4">
        <div class="sidebar-highlight p-4 rounded text-white bg-dark mb-4">
          <h4><i class="fas fa-shield-halved me-2"></i> Textes protégés</h4>
          <p class="small">Les documents mis à disposition sont officiels et protégés. Tout usage doit mentionner la source CES-RDC.</p>
          <a href="{{ url('contact') }}" class="btn btn-sm btn-outline-light">Demande officielle</a>
        </div>
        <div class="sidebar-box p-4 border rounded bg-light">
          <h4><i class="fas fa-link me-2"></i> Liens utiles</h4>
          <ul class="list-unstyled small">
            <li class="mb-2"><a href="https://journalofficiel.cd" target="_blank" class="text-decoration-none"><i class="fas fa-external-link-alt me-2"></i> Journal Officiel RDC</a></li>
            <li class="mb-2"><a href="https://www.senat.cd" target="_blank" class="text-decoration-none"><i class="fas fa-external-link-alt me-2"></i> Sénat — Lois</a></li>
            <li class="mb-2"><a href="{{ url('missions') }}" class="text-decoration-none"><i class="fas fa-arrow-right me-2"></i> Missions du CES</a></li>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
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
  });
</script>
@endsection