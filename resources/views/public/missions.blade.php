@extends('layouts.public')

@section('title', 'Missions du CES | Conseil Économique et Social - RDC')

@section('og_title', 'Missions du CES | Conseil Économique et Social - RDC')
@section('og_description', 'Les missions du CES consistent à assurer le dialogue entre les forces vives de la nation et les pouvoirs publics pour un développement durable.')
@section('og_image', asset('assets/images/logo_header.png'))

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
  <div class="row g-5">
    <!-- Colonne principale -->
    <div class="col-lg-8">
      <div class="s-tag">Attributions</div>
      <h2 class="s-title">Ce que fait <span>le CES</span></h2>
      <div class="prose">
        <p>Tel que précisé par la Constitution et dans la loi organique, Le Conseil économique et social est une asseùblée consultative dotée de la personnalité juridique. Il a pour mission de donner des avis consultatifs sur les questions économiques et sociales lui soumises par le Président de la République, l’Assemblée nationale, le Sénat et le Gouvernement.Il peut, de sa propre initiative, appeler l’attention du Gouvernement et des provinces sur les réformes qui lui paraissent de nature à favoriser le développement économique et social du pays. <br> 
        De ce fait, Le CES est chargé de :
          <h4><strong>Analyse et Suivi</strong></h4>
            <ul>
              <li>Analyser la conjoncture économique et sociale du pays : Le CES examine de près les tendances actuelles du marché et du climat social pour anticiper les défis de demain.</li>
              <li>Assurer le suivi des politiques économiques et sociales nationales, provinciales et internationales, ainsi que les répercussions sur la vie des Congolais.</li>
            </ul>
          <h4><strong>Information et Orientation</strong></h4>
            <ul>
              <li>Contribuer à l'information des citoyens sur l'évolution de la situation économique et sociale.</li>
              <li>Donner son avis sur les orientations générales de l'économie nationale : Le CES émet des avis consultatifs sur les grandes directions stratégiques prises pour l'économie nationale.</li>
            </ul>
          <h4><strong>Propositions et Collaboration</strong></h4>
          <ul>
            <li>Formuler des propositions dans les divers domaines économique et social.</li>
            <li>Favoriser la coopération entre les partenaires économiques et sociaux et contribuer à l'élaboration d'une charte sociale commune.</li>
          </ul>
          <h4><strong>Etudes et Transparence</strong></h4>
          <ul>
            <li>Publier un rapport annuel sur la situation économique et sociale</li>
            <li>Collecter et constituer une banque des données sur la situation économique et sociale.</li>
            <li>Réaliser des études et recherches dans le domaine relevant de l'exercice de ses attributions.</li>
          </ul>
        </p>
      </div>
    </div>

    <!-- Sidebar droite -->
    <aside class="col-lg-4">
      <div class="sidebar-box">
        <h4><i class="fas fa-gavel"></i> Base légale</h4>
        <ul>
          <li><i class="fas fa-file-alt"></i> Constitution du 18 février 2006</li>
          <li><i class="fas fa-file-alt"></i> Loi organique n° 13-027 de 2013</li>
          <li><i class="fas fa-file-alt"></i> Règlement intérieur du CES</li>
        </ul>
      </div>

      <!-- Grille des stats -->
      <div class="row g-3 mb-4">
        <div class="col-6">
          <div class="stat-bloc"><div class="num">7</div><div class="lbl">Commissions</div></div>
        </div>
        <div class="col-6">
          <div class="stat-bloc"><div class="num">100+</div><div class="lbl">Avis rendus</div></div>
        </div>
        <div class="col-6">
          <div class="stat-bloc"><div class="num">68</div><div class="lbl">Conseillers</div></div>
        </div>
        <div class="col-6">
          <div class="stat-bloc"><div class="num">10+</div><div class="lbl">Partenaires int.</div></div>
        </div>
      </div>

      <div class="sidebar-highlight">
        <h4><i class="fas fa-scale-balanced"></i> Saisine du CES</h4>
        <p>Toute institution peut soumettre une question au CES pour avis consultatif.</p>
        <a href="{{ url('contact') }}">Nous contacter</a>
      </div>
    </aside>
  </div>
</div>
@endsection