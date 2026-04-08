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
  <div class="container">
    <div class="row g-5">
      <!-- Colonne principale : documents -->
      <div class="col-lg-8">
        <div class="s-tag">Documents officiels</div>
        <h2 class="s-title">Cadre <span>juridique</span></h2>
        <div class="mt-4">
          <!-- Doc 1 -->
          <div class="doc-card reveal">
            <div class="doc-icon"><i class="fas fa-file-pdf"></i></div>
            <div class="doc-meta">
              <span class="doc-tag">Constitution</span>
              <h4>Constitution de la RDC du 18 février 2006 — Articles 208, 209 & 210 relatifs au CES</h4>
              <div class="doc-date"><i class="fas fa-calendar"></i> 18 Février 2006</div>
              <a href="https://ik.imagekit.io/ces/documents/Constitution%20de%20la%203me%20Republique.%2018%20Fev%202006.pdf" target="blank" class="doc-link"><i class="fas fa-download"></i> Télécharger</a>
            </div>
          </div>
          <!-- Doc 2 -->
          <div class="doc-card reveal">
            <div class="doc-icon"><i class="fas fa-gavel"></i></div>
            <div class="doc-meta">
              <span class="doc-tag">Loi organique</span>
              <h4>Loi organique n° 13/027 du 30 octobre 2013 portant organisation et fonctionnement du CES </h4>
              <div class="doc-date"><i class="fas fa-calendar"></i> 3O Octobre 2013</div>
              <a href="https://ik.imagekit.io/ces/documents/LOI%20ORGANIQUE%20n%C2%B0%2013-027%20portant%20organisation%20et%20fonctionnement%20du%20Conseil%20%C3%A9conomique%20et%20social%20(J.O.RDC.,%209%20novembre%202013,%20n%C2%B0%20sp%C3%A9cial,%20col.%201).pdf?updatedAt=1774195742804" target="blank" class="doc-link"><i class="fas fa-download"></i> Télécharger</a>
            </div>
          </div>
          <!-- Doc 3 -->
          <div class="doc-card reveal">
            <div class="doc-icon"><i class="fas fa-book"></i></div>
            <div class="doc-meta">
              <span class="doc-tag">Règlement</span>
              <h4>Règlement intérieur du CES — Dispositions relatives aux séances plénières et délibérations</h4>
              <div class="doc-date"><i class="fas fa-calendar"></i> 2020</div>
              <a href="{{ url('textes') }}" target="blank" class="doc-link"><i class="fas fa-download"></i> Télécharger</a>
            </div>
          </div>
          <!-- Doc 4 -->
          <div class="doc-card reveal">
            <div class="doc-icon"><i class="fas fa-earth-africa"></i></div>
            <div class="doc-meta">
              <span class="doc-tag">Charte internationale</span>
              <h4>Charte de l'UCESA pour la durabilité du développement de l'Afrique — Engagement du CES-RDC</h4>
              <div class="doc-date"><i class="fas fa-calendar"></i> 2022</div>
              <a href="https://ik.imagekit.io/ces/documents/CHARTE%20DE%20L_UCESA%20POUR%20LA%20DURABILITE%20DU%20DEVELOPPEMENT%20DE%20L_AFRIQUE.pdf?updatedAt=1774195749498" target="blank" class="doc-link"><i class="fas fa-download"></i> Télécharger</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar droite -->
      <aside class="col-lg-4">
        <div class="sidebar-highlight">
          <h4><i class="fas fa-shield-halved"></i> Textes protégés</h4>
          <p>Les documents mis à disposition sont officiels et protégés. Tout usage doit mentionner la source CES-RDC.</p>
          <a href="{{ url('contact') }}">Demande officielle</a>
        </div>
        <div class="sidebar-box">
          <h4><i class="fas fa-link"></i> Liens utiles</h4>
          <ul>
            <li><i class="fas fa-external-link-alt"></i> <a href="https://journalofficiel.cd" target="_blank">Journal Officiel RDC</a></li>
            <li><i class="fas fa-external-link-alt"></i> <a href="https://www.senat.cd" target="_blank">Sénat — Textes législatifs</a></li>
            <li><i class="fas fa-arrow-right"></i> <a href="{{ url('missions') }}">Missions du CES</a></li>
            <li><i class="fas fa-arrow-right"></i> <a href="{{ url('fonctionnement') }}">Fonctionnement</a></li>
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