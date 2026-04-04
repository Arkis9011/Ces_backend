@extends('layouts.public')

@section('title', 'Agenda | CES RDC')

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Actualités <i class="fas fa-chevron-right"></i><span>Agenda</span>
    </div>

    <h1><em>Agenda</em> du CES</h1>
    <p>Programme des séances plénières, réunions des commissions et événements officiels du Conseil Économique et Social.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="container py-5">
    <div class="row g-5">
      <!-- Colonne principale -->
      <div class="col-lg-8">
        <div class="s-tag">Événements à venir</div>
        <h2 class="s-title">Programme <span>2026</span></h2>
        <!-- Barre de filtrage AJAX -->
        <div class="filter-toolbar mb-4">
            <form action="{{ url('agenda') }}" method="get" class="w-100 d-flex flex-wrap gap-3" id="filterForm">
                <div class="filter-group filter-search">
                    <label for="q">Rechercher un événement</label>
                    <div class="position-relative">
                        <input type="text" name="q" id="q" class="filter-control" placeholder="Titre, lieu..." value="{{ request('q') }}">
                        <i class="fas fa-search position-absolute" style="right: 15px; top: 50%; transform: translateY(-50%); color: #ccc;"></i>
                    </div>
                </div>
                <div class="filter-group">
                    <label for="sort">Trier par date</label>
                    <select name="sort" id="sort" class="filter-control">
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Plus récent (desc)</option>
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Le plus loin (asc)</option>
                    </select>
                </div>
            </form>
        </div>

        <div id="ajax-results" class="position-relative">
            @include('public.partials._agenda_grid')
            <!-- Overlay de chargement -->
            <div class="loading-overlay d-none position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(255,255,255,0.7); z-index: 10;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Chargement...</span>
                </div>
            </div>
        </div>
      </div>

      <!-- Sidebar droite -->
      <aside class="col-lg-4">
        <div class="sidebar-box p-4 bg-white shadow-sm rounded-4 mb-4">
          <h4 class="h5 fw-bold mb-4 border-bottom pb-2"><i class="fas fa-info-circle text-primary me-2"></i> Accès aux séances</h4>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="fas fa-circle-dot text-primary me-2"></i> Les séances plénières sont publiques</li>
            <li class="mb-2"><i class="fas fa-circle-dot text-primary me-2"></i> Accréditation presse disponible</li>
            <li class="mb-2"><i class="fas fa-circle-dot text-primary me-2"></i> Retransmission en ligne prévue</li>
            <li class="mb-2"><i class="fas fa-circle-dot text-primary me-2"></i> Comptes rendus publiés après chaque séance</li>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</div>
@endsection