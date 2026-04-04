@extends('layouts.public')

@section('title', 'Nos Partenaires | Conseil Économique et Social - RDC')

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Le CES <i class="fas fa-chevron-right"></i><span>Partenaires</span>
    </div>
    <div class="hero-tag"><i class="fas fa-handshake"></i> Réseau international</div>
    <h1>Nos <em>Partenaires</em></h1>
    <p>Le CES-RDC entretient des partenariats solides avec les principales organisations internationales de dialogue économique et social.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="container py-5">
    <!-- Titre de section -->
    <div class="s-tag">Partenariats internationaux</div>
    <h2 class="s-title">Coopération <span>internationale</span></h2>

    <!-- Grille des partenaires internationaux -->
    <div class="row g-4 mt-4">
      <div class="col-lg-4">
        <div class="info-card reveal h-100 p-4 border rounded bg-white shadow-sm">
          <h3 style="font-size:1.1rem;color:var(--bleu-fonce)" class="mb-3">
            <span class="d-inline-flex align-items-center justify-content-center bg-dark text-warning rounded-circle me-2" style="width:32px;height:32px"><i class="fas fa-globe small"></i></span> 
            AICESIS
          </h3>
          <div class="prose small">
            <p>L'AICESIS est une organisation mondiale qui regroupe les institutions dédiées au dialogue social et à la consultation citoyenne. Elle réunit environ 70 membres provenant d'Afrique, d'Europe, d'Amérique Latine, d'Asie et du Moyen-Orient.</p>
            <p>Le CES RDC joue un rôle moteur et stratégique au sein de l’AICESIS.</p>
          </div>
          <a href="https://aicesis.org" target="_blank" class="btn btn-sm btn-link ps-0 mt-2"><i class="fas fa-external-link-alt me-1"></i> Visiter le site</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="info-card reveal h-100 p-4 border rounded bg-white shadow-sm">
          <h3 style="font-size:1.1rem;color:var(--bleu-fonce)" class="mb-3">
            <span class="d-inline-flex align-items-center justify-content-center bg-dark text-warning rounded-circle me-2" style="width:32px;height:32px"><i class="fas fa-earth-europe small"></i></span> 
            UCESIF
          </h3>
          <div class="prose small">
            <p>L'UCESIF regroupe les institutions de dialogue social des pays ayant en partage l'usage du français. Elle compte environ 23 institutions membres.</p>
            <p>Le CES de la RD Congo est un membre très actif de l'UCESIF.</p>
          </div>
          <a href="https://ucesif.fr" target="_blank" class="btn btn-sm btn-link ps-0 mt-2"><i class="fas fa-external-link-alt me-1"></i> Visiter le site</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="info-card reveal h-100 p-4 border rounded bg-white shadow-sm">
          <h3 style="font-size:1.1rem;color:var(--bleu-fonce)" class="mb-3">
            <span class="d-inline-flex align-items-center justify-content-center bg-dark text-warning rounded-circle me-2" style="width:32px;height:32px"><i class="fas fa-earth-africa small"></i></span> 
            UCESA
          </h3>
          <div class="prose small">
            <p>L’UCESA fédère les institutions de dialogue social sur l'ensemble du continent africain. Elle regroupe environ 20 institutions nationales.</p>
            <p>Le CES de la RDC est un membre stratégique au sein de l'UCESA.</p>
          </div>
          <a href="https://ucesa.africa" target="_blank" class="btn btn-sm btn-link ps-0 mt-2"><i class="fas fa-external-link-alt me-1"></i> Visiter le site</a>
        </div>
      </div>
    </div>

    <!-- Institutions nationales -->
    <div class="mt-5 pt-4">
      <div class="s-tag">Institutions nationales</div>
      <h2 class="s-title">Institutions de <span>la République</span></h2>
      
      <div class="row g-3 mt-4 text-center">
        <div class="col-lg col-md-4 col-6">
          <a href="https://presidence.cd" target="_blank" class="info-card reveal d-block p-4 border rounded bg-white shadow-sm text-decoration-none">
            <i class="fas fa-star h3 text-primary mb-2"></i>
            <div class="fw-bold text-dark small">Présidence</div>
          </a>
        </div>
        <div class="col-lg col-md-4 col-6">
          <a href="https://www.senat.cd" target="_blank" class="info-card reveal d-block p-4 border rounded bg-white shadow-sm text-decoration-none">
            <i class="fas fa-landmark h3 text-primary mb-2"></i>
            <div class="fw-bold text-dark small">Sénat</div>
          </a>
        </div>
        <div class="col-lg col-md-4 col-6">
          <a href="https://assemblee-nationale.cd" target="_blank" class="info-card reveal d-block p-4 border rounded bg-white shadow-sm text-decoration-none">
            <i class="fas fa-building-columns h3 text-primary mb-2"></i>
            <div class="fw-bold text-dark small">Assemblée Nationale</div>
          </a>
        </div>
        <div class="col-lg col-md-4 col-6">
          <a href="https://www.primature.gouv.cd" target="_blank" class="info-card reveal d-block p-4 border rounded bg-white shadow-sm text-decoration-none">
            <i class="fas fa-flag h3 text-primary mb-2"></i>
            <div class="fw-bold text-dark small">Primature</div>
          </a>
        </div>
      </div>
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