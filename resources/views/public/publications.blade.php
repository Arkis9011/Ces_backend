@extends('layouts.public')

@section('title', 'Nos Publications | Conseil Économique et Social - RDC')

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Travaux <i class="fas fa-chevron-right"></i><span>Publications</span>
    </div>
    <div class="hero-tag"><i class="fas fa-book-open"></i> Bibliothèque documentaire</div>
    <h1>Nos <em>Publications</em></h1>
    <p>Documents officiels, rapports, lois organiques, chartes et contributions publiés par le Conseil Économique et Social.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="container py-5">
    <div class="row">
      <div class="col-12">
        <div class="s-tag">Documents officiels</div>
        <h2 class="s-title">Bibliothèque <span>documentaire</span></h2>
        <div class="mt-4">
          <!-- Publication 1 -->
          <div class="doc-card reveal mb-4 p-4 border rounded bg-white shadow-sm d-flex gap-4 align-items-center">
            <div class="doc-icon h1 text-primary mb-0"><i class="fas fa-file-pdf"></i></div>
            <div class="doc-meta flex-grow-1">
              <span class="badge bg-primary mb-2">Publication</span>
              <h4 class="h5 mb-1">Exposé du Président National de la FEC</h4>
              <div class="small text-muted mb-2"><i class="fas fa-calendar me-1"></i> 2024</div>
              <a href="https://ik.imagekit.io/ces/documents/Expos%C3%A9%20du%20Pr%C3%A9sident%20National%20de%20F%C3%A9d%C3%A9ration%20des%20Entreprises%20du%20Congo%20et%20Pr%C3%A9sident%20du%20Conseil%20d_Administration%20de%20GECAMINES.pdf" target="blank" class="btn btn-sm btn-outline-primary"><i class="fas fa-download me-1"></i> Télécharger</a>
            </div>
          </div>
          <!-- Publication 2 -->
          <div class="doc-card reveal mb-4 p-4 border rounded bg-white shadow-sm d-flex gap-4 align-items-center">
            <div class="doc-icon h1 text-success mb-0"><i class="fas fa-gavel"></i></div>
            <div class="doc-meta flex-grow-1">
              <span class="badge bg-success mb-2">Loi organique</span>
              <h4 class="h5 mb-1">Loi organique n° 13-027 (J.O.RDC., 9 novembre 2013)</h4>
              <div class="small text-muted mb-2"><i class="fas fa-calendar me-1"></i> 9 Novembre 2013</div>
              <a href="https://ik.imagekit.io/ces/documents/LOI%20ORGANIQUE%20n%C2%B0%2013-027%20portant%20organisation%20et%20fonctionnement%20du%20Conseil%20%C3%A9conomique%20et%20social%20(J.O.RDC.,%209%20novembre%202013,%20n%C2%B0%20sp%C3%A9cial,%20col.%201).pdf" target="blank" class="btn btn-sm btn-outline-success"><i class="fas fa-download me-1"></i> Télécharger</a>
            </div>
          </div>
          <!-- Publication 3 -->
          <div class="doc-card reveal mb-4 p-4 border rounded bg-white shadow-sm d-flex gap-4 align-items-center">
            <div class="doc-icon h1 text-info mb-0"><i class="fas fa-earth-africa"></i></div>
            <div class="doc-meta flex-grow-1">
              <span class="badge bg-info mb-2">Charte</span>
              <h4 class="h5 mb-1">Charte de l'UCESA pour la durabilité du développement de l'Afrique</h4>
              <div class="small text-muted mb-2"><i class="fas fa-calendar me-1"></i> 2022</div>
              <a href="https://ik.imagekit.io/ces/documents/CHARTE%20DE%20L_UCESA%20POUR%20LA%20DURABILITE%20DU%20DEVELOPPEMENT%20DE%20L_AFRIQUE.pdf" target="blank" class="btn btn-sm btn-outline-info"><i class="fas fa-download me-1"></i> Télécharger</a>
            </div>
          </div>
          <!-- Publication 4 -->
          <div class="doc-card reveal mb-4 p-4 border rounded bg-white shadow-sm d-flex gap-4 align-items-center">
            <div class="doc-icon h1 text-warning mb-0"><i class="fas fa-users-gear"></i></div>
            <div class="doc-meta flex-grow-1">
              <span class="badge bg-warning text-dark mb-2">Rapport</span>
              <h4 class="h5 mb-1">Réunion du Groupe de travail sur la Charte de l'UCESA</h4>
              <div class="small text-muted mb-2"><i class="fas fa-calendar me-1"></i> 2022</div>
              <a href="https://ik.imagekit.io/ces/documents/R%C3%A9union%20du%20Groupe%20de%20travail%20sur%20la%20Charte%20de%20l_UCESA%20pour%20la%20durabilit%C3%A9%20du%20d%C3%A9veloppement%20l_Afrique.pdf" target="blank" class="btn btn-sm btn-outline-warning"><i class="fas fa-download me-1"></i> Télécharger</a>
            </div>
          </div>
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