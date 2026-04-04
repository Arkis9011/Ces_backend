@extends('layouts.public')

@section('title', 'Fonctionnement du CES | Conseil Économique et Social - RDC')

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Organisation <i class="fas fa-chevron-right"></i><span>Fonctionnement</span>
    </div>
    <div class="hero-tag"><i class="fas fa-cogs"></i> Organisation interne</div>
    <h1><em>Fonctionnement</em> du CES</h1>
    <p>Mode d'organisation, processus de délibération et procédures de travail du Conseil Économique et Social.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="container py-5">
    <div class="row g-5">
      <!-- Colonne principale -->
      <div class="col-lg-8">
        <div class="s-tag">Processus</div>
        <h2 class="s-title">Comment fonctionne <span>le CES</span> ?</h2>
        <p class="prose mb-4">
            Le Conseil Économique et Social fonctionne comme un pont entre la société civile organisée et le pouvoir politique. Son rôle n'est pas de voter des lois, mais de donner des <strong>avis éclairés</strong> pour orienter les décisions publiques.
        </p>
        
        <div class="prose small">
            <ol class="list-unstyled">
                <li class="p-4 border rounded mb-3 bg-white shadow-sm">
                    <h5 class="fw-bold"><span class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width:28px;height:28px">1</span> La saisine</h5>
                    <p class="mb-0 text-muted">Le CES peut être saisi par le Président, le Gouvernement ou le Parlement. Il peut aussi s'autosaisir d'un sujet de société.</p>
                </li>
                
                <li class="p-4 border rounded mb-3 bg-white shadow-sm">
                    <h5 class="fw-bold"><span class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width:28px;height:28px">2</span> Le travail en commission</h5>
                    <p class="mb-0 text-muted">Le sujet est envoyé à une commission spécialisée. Les conseillers auditionnent des experts et des acteurs de terrain pour recueillir des données concrètes.</p>
                </li>
                
                <li class="p-4 border rounded mb-3 bg-white shadow-sm">
                    <h5 class="fw-bold"><span class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width:28px;height:28px">3</span> Le débat et le consensus</h5>
                    <p class="mb-0 text-muted">C’est l'étape clé où différents groupes discutent pour trouver un terrain d'entente ou exposer clairement leurs points de divergence.</p>
                </li>
                
                <li class="p-4 border rounded mb-3 bg-white shadow-sm">
                    <h5 class="fw-bold"><span class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width:28px;height:28px">4</span> L'adoption en séance plénière</h5>
                    <p class="mb-0 text-muted">Le projet d'avis est soumis à l'Assemblée Générale. Après débat, il est adopté ou rejeté à la majorité des membres présents.</p>
                </li>
            </ol>
        </div>
      </div>
      
      <!-- Sidebar droite -->
      <aside class="col-lg-4">
        <div class="sidebar-box mb-4 p-4 border rounded bg-white shadow-sm">
          <h5 class="mb-3 fw-bold"><i class="fas fa-sitemap me-2 text-primary"></i> Organigramme</h5>
          <ul class="list-unstyled small text-muted">
            <li class="mb-2"><i class="fas fa-angle-right me-2"></i> Assemblée Générale (plénière)</li>
            <li class="mb-2"><i class="fas fa-angle-right me-2"></i> Bureau (7 membres)</li>
            <li class="mb-2"><i class="fas fa-angle-right me-2"></i> 7 Commissions permanentes</li>
            <li><i class="fas fa-angle-right me-2"></i> Secrétariat Général</li>
          </ul>
        </div>
        <div class="sidebar-box p-4 border rounded bg-light">
          <h5 class="mb-3 fw-bold theme-color-secondary"><i class="fas fa-calendar-alt me-2"></i> Sessions</h5>
          <ul class="list-unstyled small text-muted">
            <li class="mb-2 d-flex align-items-center"><i class="fas fa-circle-dot me-2 small"></i> 2 sessions ordinaires par an</li>
            <li class="mb-2 d-flex align-items-center"><i class="fas fa-circle-dot me-2 small"></i> Durée maximale : 30 jours</li>
            <li><i class="fas fa-circle-dot me-2 small"></i> Séances publiques</li>
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