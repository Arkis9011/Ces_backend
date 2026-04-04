@extends('layouts.public')

@section('title', 'Aperçu du CES | Conseil Économique et Social - RDC')

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Le CES <i class="fas fa-chevron-right"></i><span>Aperçu du CES</span>
    </div>
    <div class="hero-tag"><i class="fas fa-info-circle"></i> L'institution</div>
    <h1>Aperçu du <em>Conseil Économique et Social</em></h1>
    <p>Organe consultatif constitutionnel au service de l'intérêt général de la République Démocratique du Congo.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="container py-5">
    <div class="row g-5">
      <!-- Colonne principale -->
      <div class="col-lg-8">
        <div class="s-tag">Présentation</div>
        <h2 class="s-title">Qu'est-ce que le <span>CES</span> ?</h2>
        <div class="prose">
          <div class="texte_justifie">
            <p>Le Conseil Économique et Social (CES) est une Assemblée Consultative dotée de la personnalité juridique, instituée par la Constitution de la République Démocratique du Congo (RDC). Il est un cadre de concertation structuré entre différents acteurs socio-économiques du pays. Il traduit la volonté du Constituant de voir tous ces acteurs de la vie socio-économique partager la responsabilité du développement national dans le cadre de la démocratie économique et sociale.</p>
            
            <div class="s-tag mt-5">Historique</div>
            <h2 class="s-title">Historique du <span>CES</span></h2>
            <p>La volonté politique de créer le CES en République Démocratique du Congo (RDC) remonte à quelques années seulement après l'accession du pays à l'indépendance. La première tentative formelle en ce sens date en effet de l'année 1964 avec la Constitution du 1er août 1964, dite "Constitution de Luluabourg", qui avait prévu, en ses articles 131 à 135, la mise en place des conseils économiques et sociaux au niveau national et dans les provinces.</p>
            <p>Plus tard, il y a eu l'Ordonnance n° 89-029 du 26 janvier 1989 portant création d'un Conseil Consultatif Permanent pour le Développement (CCPD) et puis le Décret n° 008/01 du 23 février 2001 portant création et organisation du cadre Permanent de Concertation Économique, en sigle CPCE.</p>
            <p>Depuis lors, il a fallu attendre l'année 2006 pour voir le CES être de nouveau institué par la Constitution du 18 février 2006. Et cette volonté du Constituant a été matérialisée par la promulgation de la Loi organique n°13/027 du 30 octobre 2013 portant organisation et fonctionnement du Conseil Économique et Social.</p>
          </div>
        </div>

        <!-- Timeline -->
        <div class="mt-5">
          <h2 class="s-title">Évolution <span>institutionnelle</span></h2>
          <div class="timeline mt-4" style="max-width:680px">
            <div class="texte_justifie">
              <div class="timeline-item reveal">
                <div class="timeline-year">2006</div>
                <h4>Fondation constitutionnelle</h4>
                <p>La Constitution du 18 février 2006 consacre le CES comme organe consultatif de la République.</p>
              </div>
              <div class="timeline-item reveal">
                <div class="timeline-year">2013</div>
                <h4>Loi organique de fonctionnement</h4>
                <p>La Loi organique n° 13/027 fixe l'organisation et le fonctionnement du CES.</p>
              </div>
              <div class="timeline-item reveal">
                <div class="timeline-year">2014</div>
                <h4>Première mandature du CES</h4>
                <p>Début de la première mandature convoquée le 16 décembre 2014 suite à l'Investiture des membres.</p>
              </div>
              <div class="timeline-item reveal">
                <div class="timeline-year">2020</div>
                <h4>Deuxième mandature</h4>
                <p>Investiture des membres de la deuxième mandature consacrée par l'Ordonnance n° 20/031 du 25 avril 2020.</p>
              </div>
              <div class="timeline-item reveal">
                <div class="timeline-year">2025</div>
                <h4>Troisième mandature</h4>
                <p>Début de la troisième mandature sous la présidence de Jean-Pierre KIWAKANA KIMAYALA.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar droite -->
      <aside class="col-lg-4">
        <div class="sidebar-highlight mb-4">
          <h4><i class="fas fa-star"></i> Institution constitutionnelle</h4>
          <p>Créé par la Constitution du 18 février 2006, le CES est un pilier de la démocratie participative en RDC.</p>
          <a href="#" class="btn btn-sm btn-outline-light mt-2">Voir les textes fondateurs</a>
        </div>
        
        <div class="sidebar-box mb-4">
          <h4><i class="fas fa-chart-bar"></i> Chiffres clés</h4>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="fas fa-users me-2"></i> 68 Conseillers de la République</li>
            <li class="mb-2"><i class="fas fa-project-diagram me-2"></i> 7 commissions permanentes</li>
            <li class="mb-2"><i class="fas fa-file-alt me-2"></i> Plus de 100 avis rendus</li>
            <li class="mb-2"><i class="fas fa-globe me-2"></i> Membre de l'AICESIS</li>
          </ul>
        </div>

        <div class="sidebar-box">
          <h4><i class="fas fa-link"></i> Navigation rapide</h4>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="{{ url('missions') }}"><i class="fas fa-arrow-right me-2"></i> Missions</a></li>
            <li class="mb-2"><a href="{{ url('bureau') }}"><i class="fas fa-arrow-right me-2"></i> Le Bureau</a></li>
            <li class="mb-2"><a href="{{ url('commissions') }}"><i class="fas fa-arrow-right me-2"></i> Les Commissions</a></li>
            <li class="mb-2"><a href="{{ url('textes') }}"><i class="fas fa-arrow-right me-2"></i> Textes Légaux</a></li>
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

    document.querySelectorAll('.reveal, .timeline-item').forEach(el => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      observer.observe(el);
    });
  });
</script>
@endsection