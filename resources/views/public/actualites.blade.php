@extends('layouts.public')

@section('title', 'Nos Actualités | CES RDC')

@section('og_title', 'Nos Actualités | Conseil Économique et Social - RDC')
@section('og_description', 'Suivez toute la vie institutionnelle du CES : séances plénières, événements nationaux et internationaux, communiqués officiels.')
@section('og_image', asset('assets/images/logo_header.png'))

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Actualités <i class="fas fa-chevron-right"></i><span>Actualités</span>
    </div>
    <h1>Nos <em>Actualités</em></h1>
    <p>Suivez toute la vie institutionnelle du CES : séances plénières, événements nationaux et internationaux, communiqués officiels.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap container py-5">
    
    <!-- Barre de filtrage AJAX -->
    <div class="filter-toolbar mb-5">
        <form action="{{ url('actualites') }}" method="get" class="w-100 d-flex flex-wrap gap-3" id="filterForm">
            <div class="filter-group filter-search">
                <label for="q">Rechercher</label>
                <div class="position-relative">
                    <input type="text" name="q" id="q" class="filter-control" placeholder="Titre, contenu..." value="{{ request('q') }}">
                    <i class="fas fa-search position-absolute" style="right: 15px; top: 50%; transform: translateY(-50%); color: #ccc;"></i>
                </div>
            </div>
            
            <div class="filter-group">
                <label for="category">Catégorie</label>
                <select name="category" id="category" class="filter-control">
                    <option value="all">Toutes les catégories</option>
                    @foreach(\App\Models\Post::select('categorie')->distinct()->whereNotNull('categorie')->get() as $cat)
                        <option value="{{ $cat->categorie }}" {{ request('category') == $cat->categorie ? 'selected' : '' }}>
                            {{ $cat->categorie }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="filter-group">
                <label for="sort">Trier par</label>
                <select name="sort" id="sort" class="filter-control">
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Plus récent</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Plus ancien</option>
                </select>
            </div>
        </form>
    </div>

    <div id="ajax-results" class="position-relative">
        @include('public.partials._actualites_grid')
        <!-- Overlay de chargement -->
        <div class="loading-overlay d-none position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(255,255,255,0.7); z-index: 10;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Les scripts spécifiques à la page peuvent être ajoutés ici si nécessaire, 
    // mais la logique AJAX globale est gérée dans main.js
</script>
@endsection