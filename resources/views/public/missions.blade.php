@extends('layouts.public')

@section('title', 'Missions du CES | Conseil Économique et Social - RDC')

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Le CES <i class="fas fa-chevron-right"></i><span>Missions</span>
    </div>
    <div class="hero-tag"><i class="fas fa-bullseye"></i> Rôle constitutionnel</div>
    <h1>Missions</h1>
    <p>Le CES conseille les pouvoirs publics sur les grandes orientations qui engagent l'avenir de la Nation congolaise.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="container py-5">
    <div class="row g-5">
      <!-- Colonne principale -->
      <div class="col-lg-8">
        <div class="s-tag">Attributions</div>
        <h2 class="s-title">Ce que fait <span>le CES</span></h2>
        <div class="prose">
          <p>Tel que précisé par la Constitution et dans la loi organique, le Conseil économique et social est une assemblée consultative dotée de la personnalité juridique. Il a pour mission de donner des avis consultatifs sur les questions économiques et sociales lui soumises par le Président de la République, l’Assemblée nationale, le Sénat et le Gouvernement.</p>
          
          <div class="mt-4">
            <h4><strong>Analyse et Suivi</strong></h4>
            <ul>
              <li>Analyser la conjoncture économique et sociale du pays.</li>
              <li>Assurer le suivi des politiques économiques et sociales nationales, provinciales et internationales.</li>
            </ul>
            
            <h4><strong>Information et Orientation</strong></h4>
            <ul>
              <li>Contribuer à l'information des citoyens sur l'évolution de la situation économique et sociale.</li>
              <li>Donner son avis sur les orientations générales de l'économie nationale.</li>
            </ul>
            
            <h4><strong>Propositions et Collaboration</strong></h4>
            <ul>
              <li>Formuler des propositions dans les divers domaines économique et social.</li>
              <li>Favoriser la coopération entre les partenaires économiques et sociaux.</li>
            </ul>
            
            <h4><strong>Etudes et Transparence</strong></h4>
            <ul>
              <li>Publier un rapport annuel sur la situation économique et sociale.</li>
              <li>Collecter et constituer une banque des données sur la situation économique et sociale.</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Sidebar droite -->
      <aside class="col-lg-4">
        <div class="sidebar-box mb-4">
          <h4><i class="fas fa-gavel"></i> Base légale</h4>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="fas fa-file-alt me-2 text-primary"></i> Constitution du 18 février 2006</li>
            <li class="mb-2"><i class="fas fa-file-alt me-2 text-primary"></i> Loi organique n° 13-027 de 2013</li>
            <li class="mb-2"><i class="fas fa-file-alt me-2 text-primary"></i> Règlement intérieur du CES</li>
          </ul>
        </div>

        <div class="row g-3 mb-4">
          <div class="col-6">
            <div class="stat-bloc p-3 border rounded text-center bg-light">
              <div class="num h3 fw-bold mb-0">7</div>
              <div class="lbl small text-muted">Commissions</div>
            </div>
          </div>
          <div class="col-6">
            <div class="stat-bloc p-3 border rounded text-center bg-light">
              <div class="num h3 fw-bold mb-0">100+</div>
              <div class="lbl small text-muted">Avis rendus</div>
            </div>
          </div>
        </div>

        <div class="sidebar-highlight p-4 rounded text-white" style="background: var(--bleu);">
          <h4><i class="fas fa-scale-balanced me-2"></i> Saisine du CES</h4>
          <p class="small">Toute institution peut soumettre une question au CES pour avis consultatif.</p>
          <a href="{{ url('contact') }}" class="btn btn-sm btn-outline-light">Nous contacter</a>
        </div>
      </aside>
    </div>
  </div>
</div>
@endsection