@extends('layouts.public')

@section('title', 'Nos Commissions | CES RDC')

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Organisation <i class="fas fa-chevron-right"></i><span>Commissions</span>
    </div>
    <h1>Nos <em>Commissions</em> permanentes</h1>
    <p>Les 7 commissions permanentes du CES sont les organes techniques chargés d'examiner les questions relevant de leurs domaines de compétence.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="container py-5">
    <div class="s-tag">Organes techniques</div>
    <h2 class="s-title">Les <span>7 Commissions</span></h2>
    <p class="prose mb-5" style="max-width:700px;">Chaque commission est composée de conseillers spécialisés dans le domaine concerné. Elle désigne en son sein un président, un rapporteur et instruit les questions qui lui sont soumises par l'Assemblée ou dont elle s'autosaisit.</p>

    <!-- Grille des commissions avec Bootstrap -->
    <div class="row g-4">
      <!-- Commission  economic -->
      <div class="col-md-6">
        <div class="comm-card reveal h-100">
          <div class="comm-icon"><i class="fas fa-chart-line"></i></div>
          <h4>Commission économique et financière</h4>
          <p>Traite des questions relatives à la politique économique, fiscale, budgétaire, monétaire et financière. Elle suit l'évolution de la conjoncture nationale et internationale et formule des recommandations au gouvernement.</p>
        </div>
      </div>
      <!-- Commission agriculture -->
      <div class="col-md-6">
        <div class="comm-card reveal h-100">
          <div class="comm-icon"><i class="fas fa-tractor"></i></div>
          <h4>Agriculture et développement rural</h4>
          <p>Examine les politiques agricoles, l'élevage, la pêche et le développement des zones rurales. Elle contribue à la sécurité alimentaire et à la valorisation du potentiel agricole immense de la RDC.</p>
        </div>
      </div>
      <!-- Commission health -->
      <div class="col-md-6">
        <div class="comm-card reveal h-100">
          <div class="comm-icon"><i class="fas fa-heart-pulse"></i></div>
          <h4>Santé, affaires sociales et culturelles</h4>
          <p>Couvre la santé publique, la protection sociale, le logement, la culture et les arts. Elle formule des avis sur les politiques sociales destinées à améliorer le bien-être des populations congolaises.</p>
        </div>
      </div>
      <!-- Commission relations -->
      <div class="col-md-6">
        <div class="comm-card reveal h-100">
          <div class="comm-icon"><i class="fas fa-scale-balanced"></i></div>
          <h4>Relations extérieures, intégrations, questions juridiques et administratives</h4>
          <p>Suit les questions de droit, d'administration publique, de diplomatie et d'intégration régionale. Elle examine les traités et accords internationaux ayant un impact socio-économique.</p>
        </div>
      </div>
      <!-- Commission environment -->
      <div class="col-md-6">
        <div class="comm-card reveal h-100">
          <div class="comm-icon"><i class="fas fa-leaf"></i></div>
          <h4>Environnement, Ressources naturelles et Tourisme</h4>
          <p>Traite de l'écologie, de la forêt équatoriale, des mines, du pétrole et du développement durable. La RDC étant dotée d'un patrimoine naturel exceptionnel, cette commission joue un rôle stratégique.</p>
        </div>
      </div>
      <!-- Commission infrastructure -->
      <div class="col-md-6">
        <div class="comm-card reveal h-100">
          <div class="comm-icon"><i class="fas fa-road"></i></div>
          <h4>Infrastructures et aménagement du territoire</h4>
          <p>Examine les politiques de transport, d'énergie, de télécommunications, d'urbanisme et d'aménagement du territoire national, essentielles au désenclavement du vaste territoire congolais.</p>
        </div>
      </div>
      <!-- Commission education -->
      <div class="col-md-6 offset-md-3">
        <div class="comm-card reveal h-100">
          <div class="comm-icon"><i class="fas fa-graduation-cap"></i></div>
          <h4>Éducation, Formation, Travail et Emploi</h4>
          <p>Couvre l'enseignement primaire, secondaire et supérieur, la formation professionnelle et la politique de l'emploi. Elle vise à renforcer le capital humain et à réduire le chômage en RDC.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Intersection Observer pour les animations reveal
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.style.opacity = '1';
          e.target.style.transform = 'translateY(0)';
        }
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal, .comm-card').forEach(el => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      observer.observe(el);
    });
  });
</script>
@endsection