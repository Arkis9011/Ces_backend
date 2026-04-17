@extends('layouts.public')

@section('title', 'Nos Publications | Conseil Économique et Social - RDC')

@section('og_title', 'Nos Publications et Rapports | Conseil Économique et Social - RDC')
@section('og_description', 'Téléchargez les rapports annuels, les études thématiques et les documents officiels produits par le Conseil Économique et Social.')
@section('og_image', asset('assets/images/logo_header.png'))

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
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="s-tag">Documents officiels</div>
        <h2 class="s-title">Bibliothèque <span>documentaire</span></h2>
        <div class="mt-4">
          <!-- Publication 1 -->
          <div class="doc-card reveal">
            <div class="doc-icon"><i class="fas fa-file-pdf"></i></div>
            <div class="doc-meta">
              <span class="doc-tag">Publication</span>
              <h4>Exposé du Président National de la Fédération des Entreprises du Congo (FEC) et Président du Conseil d'Administration de GECAMINES</h4>
              <div class="doc-date"><i class="fas fa-calendar"></i> 2024</div>
              <a href="https://ik.imagekit.io/ces/documents/Expos%C3%A9%20du%20Pr%C3%A9sident%20National%20de%20F%C3%A9d%C3%A9ration%20des%20Entreprises%20du%20Congo%20et%20Pr%C3%A9sident%20du%20Conseil%20d_Administration%20de%20GECAMINES.pdf?updatedAt=1774195744577" target="_blank" class="doc-link"><i class="fas fa-download"></i> Télécharger le document</a>
            </div>
          </div>
          <!-- Publication 2 -->
          <div class="doc-card reveal">
            <div class="doc-icon"><i class="fas fa-gavel"></i></div>
            <div class="doc-meta">
              <span class="doc-tag">Loi organique</span>
              <h4>LOI ORGANIQUE n° 13-027 portant organisation et fonctionnement du Conseil Économique et Social (J.O.RDC., 9 novembre 2013, n° spécial, col. 1)</h4>
              <div class="doc-date"><i class="fas fa-calendar"></i> 9 novembre 2013</div>
              <a href="https://ik.imagekit.io/ces/documents/LOI%20ORGANIQUE%20n%C2%B0%2013-027%20portant%20organisation%20et%20fonctionnement%20du%20Conseil%20%C3%A9conomique%20et%20social%20(J.O.RDC.,%209%20novembre%202013,%20n%C2%B0%20sp%C3%A9cial,%20col.%201).pdf?updatedAt=1774195742804" target="_blank" class="doc-link"><i class="fas fa-download"></i> Télécharger le document</a>
            </div>
          </div>
          <!-- Publication 3 -->
          <div class="doc-card reveal">
            <div class="doc-icon"><i class="fas fa-earth-africa"></i></div>
            <div class="doc-meta">
              <span class="doc-tag">Charte</span>
              <h4>CHARTE DE L'UCESA POUR LA DURABILITÉ DU DÉVELOPPEMENT DE L'AFRIQUE — Engagement du CES-RDC</h4>
              <div class="doc-date"><i class="fas fa-calendar"></i> 2022</div>
              <a href="https://ik.imagekit.io/ces/documents/CHARTE%20DE%20L_UCESA%20POUR%20LA%20DURABILITE%20DU%20DEVELOPPEMENT%20DE%20L_AFRIQUE.pdf?updatedAt=1774195749498" target="_blank" class="doc-link"><i class="fas fa-download"></i> Télécharger le document</a>
            </div>
          </div>
          <!-- Publication 4 -->
          <div class="doc-card reveal">
            <div class="doc-icon"><i class="fas fa-users-gear"></i></div>
            <div class="doc-meta">
              <span class="doc-tag">Rapport</span>
              <h4>Réunion du Groupe de travail sur la Charte de l'UCESA pour la durabilité du développement de l'Afrique</h4>
              <div class="doc-date"><i class="fas fa-calendar"></i> 2022</div>
              <a href="https://ik.imagekit.io/ces/documents/R%C3%A9union%20du%20Groupe%20de%20travail%20sur%20la%20Charte%20de%20l_UCESA%20pour%20la%20durabilit%C3%A9%20du%20d%C3%A9veloppement%20l_Afrique.pdf?updatedAt=1774195745390" target="_blank" class="doc-link"><i class="fas fa-download"></i> Télécharger le document</a>
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