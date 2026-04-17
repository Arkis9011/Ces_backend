@extends('layouts.public')

@section('title', 'Nos Partenaires | Conseil Économique et Social - RDC')

@section('og_title', 'Nos Partenaires | Conseil Économique et Social - RDC')
@section('og_description', 'Le CES-RDC entretient des partenariats solides avec l\'AICESIS, l\'UCESIF et l\'UCESA pour promouvoir le dialogue social.')
@section('og_image', asset('assets/images/logo_header.png'))

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
  <div class="container">
    <!-- Titre de section -->
    <div class="s-tag">Partenariats internationaux</div>
    <h2 class="s-title">Coopération <span>internationale</span></h2>

    <!-- Grille des partenaires internationaux -->
    <div class="row g-4 mt-4">
      <div class="col-lg-4">
        <div class="info-card reveal h-100">
          <h3 style="font-size:1.1rem;color:var(--bleu-fonce)"><i class="fas fa-globe" style="color:var(--jaune);background:var(--bleu-fonce)"></i> AICESIS</h3>
          <div class="prose" style="font-size:.88rem">
            <p>L'AICESIS (Association Internationale des Conseils Économiques et Sociaux et Institutions Similaires) est une organisation mondiale qui regroupe les institutions dédiées au dialogue social et à la consultation citoyenne. Elle sert de plateforme d'échange et de coopération entre les Conseils Économiques et Sociaux de différents pays. Son objectif principal est de promouvoir le dialogue entre les gouvernements et la "société civile organisée" (syndicats, organisations patronales, ONG, etc.). Fondée en 1999, l'association est aujourd'hui une organisation d'envergure internationale, elle réunit environ 70 membres provenant d'Afrique, d'Europe, d'Amérique Latine, d'Asie et du Moyen-Orient. </p>
            <p>Le CES RDC joue un rôle moteur et stratégique au sein de l’AICESIS, particulièrement en raison de sa position géographique et de son dynamisme diplomatique au sein du bloc africain.</p>
          </div>
          <a href="https://aicesis.org" target="_blank" class="doc-link"><i class="fas fa-external-link-alt"></i> Visiter le site AICESIS</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="info-card reveal h-100">
          <h3 style="font-size:1.1rem;color:var(--bleu-fonce)"><i class="fas fa-earth-europe" style="color:var(--jaune);background:var(--bleu-fonce)"></i> UCESIF</h3>
          <div class="prose" style="font-size:.88rem">
            <p>L'UCESIF (Union des Conseils Économiques et Sociaux et Institutions Similaires Francophones) est l'organisation qui regroupe les institutions de dialogue social des pays ayant en partage l'usage du français. L'UCESIF a pour but de favoriser le dialogue entre les sociétés civiles organisées de l'espace francophone. Elle compte environ 23 institutions membres issues d'Afrique, d'Europe, du Moyen-Orient et des Caraïbes. </p>
            <p>Le CES de la RD Congo est un membre très actif de l'UCESIF, participant régulièrement aux assemblées générales pour porter la voix de l'Afrique Centrale au sein de la famille francophone.</p>
          </div>
          <a href="https://ucesif.fr" target="_blank" class="doc-link"><i class="fas fa-external-link-alt"></i> Visiter le site UCESIF</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="info-card reveal h-100">
          <h3 style="font-size:1.1rem;color:var(--bleu-fonce)"><i class="fas fa-earth-africa" style="color:var(--jaune);background:var(--bleu-fonce)"></i> UCESA</h3>
          <div class="prose" style="font-size:.88rem">
            <p>L’UCESA (Union des Conseils Économiques et Sociaux et Institutions Similaires d’Afrique) est l’organisation régionale qui fédère les institutions de dialogue social sur l'ensemble du continent africain. L'UCESA a pour objectif principal d'unifier la voix des sociétés civiles africaines. Elle regroupe environ 20 institutions nationales issues de toutes les régions d'Afrique (Nord, Ouest, Centre, Est et Australe). </p>
            <p>Le Conseil Économique et Social de la RDC est un membre stratégique au sein de l'UCESA. En raison de l'immensité de son territoire et de ses défis environnementaux (Bassin du Congo), la RDC apporte une voix essentielle sur les questions de biodiversité et de développement durable au sein de l'Union</p>
          </div>
          <a href="https://ucesa.africa" target="_blank" class="doc-link"><i class="fas fa-external-link-alt"></i> Visiter le site UCESA</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="info-card reveal h-100">
          <h3 style="font-size:1.1rem;color:var(--bleu-fonce)"><i class="fas fa-globe" style="color:var(--jaune);background:var(--bleu-fonce)"></i> ECOSOC</h3>
          <div class="prose" style="font-size:.88rem">
            <p>L'ECOSOC (Conseil Économique et Social des Nations Unies) est l'un des six organes principaux de l'ONU. Contrairement à l'AICESIS, l'UCESIF ou l'UCESA qui sont des associations d'institutions consultatives, l'ECOSOC est une instance intergouvernementale officielle au cœur du système des Nations Unies. L'ECOSOC est le principal organe de coordination des activités économiques et sociales de l'ONU. Il est composé de 54 États membres, élus par l'Assemblée générale pour des mandats de trois ans, selon une répartition géographique équitable. L'année 2026 marque les 80 ans de l'ECOSOC (sa première réunion ayant eu lieu en janvier 1946). Cet anniversaire est l'occasion de réformes pour renforcer son rôle dans la gouvernance mondiale. </p>
            <p>L'AICESIS dont fait partie le CES de la RDC, bénéficie du statut consultatif auprès de l'ECOSOC. Cela permet aux conseils économiques et sociaux nationaux de faire remonter les préoccupations des citoyens et des acteurs de terrain directement au niveau des décisions mondiales de l'ONU..</p>
          </div>
          <a href="https://ecosoc.un.org/fr" target="_blank" class="doc-link"><i class="fas fa-external-link-alt"></i> Visiter le site de l'ECOSOC</a>
        </div>
      </div>
    </div>

    <!-- Institutions nationales -->
    <div class="mt-5">
      <div class="s-tag">Institutions nationales</div>
      <h2 class="s-title">Institutions de <span>la République</span></h2>
      
      <!-- Grille des institutions nationales -->
      <div class="row g-3 mt-4">
        <div class="col-lg col-md-4 col-6">
          <a href="https://presidence.cd" target="_blank" class="info-card reveal d-block text-center p-4 h-100" style="text-decoration:none;">
            <i class="fas fa-star" style="font-size:2rem;color:var(--bleu);margin-bottom:12px;display:block"></i>
            <div style="font-weight:700;font-size:.9rem;color:var(--texte);">Présidence</div>
            <div style="font-size:.75rem;color:var(--gris-texte);margin-top:4px;">presidence.cd</div>
          </a>
        </div>
        <div class="col-lg col-md-4 col-6">
          <a href="https://www.senat.cd" target="_blank" class="info-card reveal d-block text-center p-4 h-100" style="text-decoration:none;">
            <i class="fas fa-landmark" style="font-size:2rem;color:var(--bleu);margin-bottom:12px;display:block"></i>
            <div style="font-weight:700;font-size:.9rem;color:var(--texte);">Sénat</div>
            <div style="font-size:.75rem;color:var(--gris-texte);margin-top:4px;">senat.cd</div>
          </a>
        </div>
        <div class="col-lg col-md-4 col-6">
          <a href="https://assemblee-nationale.cd" target="_blank" class="info-card reveal d-block text-center p-4 h-100" style="text-decoration:none;">
            <i class="fas fa-building-columns" style="font-size:2rem;color:var(--bleu);margin-bottom:12px;display:block"></i>
            <div style="font-weight:700;font-size:.9rem;color:var(--texte);">Assemblée Nationale</div>
            <div style="font-size:.75rem;color:var(--gris-texte);margin-top:4px;">assemblee-nationale.cd</div>
          </a>
        </div>
        <div class="col-lg col-md-4 col-6">
          <a href="https://www.primature.gouv.cd" target="_blank" class="info-card reveal d-block text-center p-4 h-100" style="text-decoration:none;">
            <i class="fas fa-flag" style="font-size:2rem;color:var(--bleu);margin-bottom:12px;display:block"></i>
            <div style="font-weight:700;font-size:.9rem;color:var(--texte);">Primature</div>
            <div style="font-size:.75rem;color:var(--gris-texte);margin-top:4px;">primature.gouv.cd</div>
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