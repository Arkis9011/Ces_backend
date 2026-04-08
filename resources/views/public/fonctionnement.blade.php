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
  <div class="container">
    <div class="row g-5">
      <!-- Colonne principale -->
  <div class="col-lg-8">
    <div class="s-tag">Processus</div>
    <h2 class="s-title">Comment fonctionne <span>le CES</span> ?</h2>
    <p>
        Le Conseil Économique et Social fonctionne comme un pont entre la société civile organisée et le pouvoir politique (Gouvernement, Parlement). Son rôle n'est pas de voter des lois, mais de donner des <strong>avis éclairés</strong> pour orienter les décisions publiques.<br>
        Le fonctionnement suit une méthodologie rigoureuse pour garantir la neutralité et l'expertise :
    </p>
    
    <div class="prose">
        <ol>
            <li>
                <h3>La saisine</h3>
                <p>Le CES peut être saisi par le Président, le Gouvernement ou le Parlement pour donner son avis sur un projet de loi. Il peut aussi s'autosaisir d'un sujet de société.</p>
            </li>
            
            <li>
                <h3>Le travail en commission</h3>
                <p>Le sujet est envoyé à une commission spécialisée. Les conseillers auditionnent des experts, des chercheurs et des acteurs de terrain pour recueillir des données concrètes. 
                La commission rédige un projet d'avis et désigne un rapporteur qui le présentera devant l'Assemblée Générale.</p>
            </li>
            
            <li>
                <h3>Le débat et le consensus</h3>
                <p>C’est l'étape clé. Des groupes aux intérêts souvent opposés doivent discuter pour trouver un terrain d'entente ou, à défaut, exposer clairement leurs points de divergence.</p>
            </li>
            
            <li>
                <h3>L'adoption en séance plénière</h3>
                <p>Le projet d'avis est soumis à l'Assemblée Générale réunie en séance plénière. Après débat, il est adopté ou rejeté à la majorité des membres présents.</p>
            </li>
            
            <li>
                <h3>La notification de l'avis</h3>
                <p>Une fois l'avis adopté, il est transmis aux autorités et rendu public conformément aux dispositions du règlement intérieur. Il peut être publié au Journal Officiel de la RDC.</p>
            </li>
        </ol>
    </div>
</div>
      <!-- Sidebar droite -->
      <aside class="col-lg-4">
        <div class="sidebar-box">
          <h4><i class="fas fa-sitemap"></i> Organigramme</h4>
          <ul>
            <li><i class="fas fa-angle-right"></i> Assemblée Générale (plénière)</li>
            <li><i class="fas fa-angle-right"></i> Bureau (7 membres)</li>
            <li><i class="fas fa-angle-right"></i> 7 Commissions permanentes</li>
            <li><i class="fas fa-angle-right"></i> Secrétariat Général</li>
            <li><i class="fas fa-angle-right"></i> Services administratifs</li>
          </ul>
        </div>
        <div class="sidebar-box">
          <h4><i class="fas fa-calendar-alt"></i> Sessions</h4>
          <ul>
            <li><i class="fas fa-circle-dot"></i> 2 sessions ordinaires par an</li>
            <li><i class="fas fa-circle-dot"></i> Sessions extraordinaires sur convocation</li>
            <li><i class="fas fa-circle-dot"></i> Durée maximale : 30 jours</li>
            <li><i class="fas fa-circle-dot"></i> Prolongation possible si nécessaire</li>
          </ul>
        </div>
        <div class="sidebar-highlight">
          <h4><i class="fas fa-file-alt"></i> Textes de référence</h4>
          <p>Consultez les textes législatifs qui encadrent le fonctionnement du CES.</p>
          <a href="{{ url('textes') }}">Voir les textes</a>
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