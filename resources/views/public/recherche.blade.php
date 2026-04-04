@extends('layouts.public')

@section('title', 'Résultats de recherche | CES RDC')

@section('styles')
<style>
    .result-section { margin-bottom: 4rem; }
    .result-item { transition: all 0.3s ease; border-radius: 12px; border: 1px solid #eee; background: #fff; padding: 20px; height: 100%; display: block; text-decoration: none; color: inherit; }
    .result-item:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.05); border-color: var(--bleu); }
    .search-query-display { color: var(--bleu); font-weight: 700; border-bottom: 3px solid var(--jaune); }
</style>
@endsection

@section('content')
<div class="page-hero" style="padding: 100px 0 60px;">
  <div class="container text-center">
    <h1 class="h2">Résultats pour : <span class="search-query-display text-white">"{{ $q }}"</span></h1>
    <p class="text-white">Nous avons trouvé plusieurs mentions correspondant à votre recherche dans la base de données.</p>
  </div>
</div>

<div class="content-wrap py-5">
  <div class="container">

    @if($posts->count() > 0)
    <section class="result-section">
      <h2 class="h4 mb-4 border-start border-4 border-primary ps-3">Actualités ({{ $posts->count() }})</h2>
      <div class="row g-4">
        @foreach($posts as $post)
        <div class="col-md-6">
          <a href="{{ route('actualites.show', $post->id) }}" class="result-item">
              <span class="badge bg-primary-subtle text-primary mb-2">Actualité</span>
              <h3 class="h6 fw-bold mb-2">{{ $post->titre }}</h3>
              <p class="small text-muted mb-0">{{ Str::limit($post->resume, 150) }}</p>
          </a>
        </div>
        @endforeach
      </div>
    </section>
    @endif

    @if($avis->count() > 0)
    <section class="result-section">
      <h2 class="h4 mb-4 border-start border-4 border-warning ps-3">Avis du Conseil ({{ $avis->count() }})</h2>
      <div class="row g-4">
        @foreach($avis as $a)
        <div class="col-md-6">
          <a href="{{ route('avis.detail', $a->id) }}" class="result-item">
              <span class="badge bg-warning-subtle text-warning mb-2">Avis</span>
              <h3 class="h6 fw-bold mb-2">{{ $a->titre }}</h3>
              <p class="small text-muted mb-0">{{ Str::limit($a->resume, 150) }}</p>
          </a>
        </div>
        @endforeach
      </div>
    </section>
    @endif

    @if($agendas->count() > 0)
    <section class="result-section">
      <h2 class="h4 mb-4 border-start border-4 border-success ps-3">Agenda & Événements ({{ $agendas->count() }})</h2>
      <div class="row g-4">
        @foreach($agendas as $ag)
        <div class="col-md-6">
          <a href="{{ route('agenda.show', $ag->id) }}" class="result-item">
              <span class="badge bg-success-subtle text-success mb-2">Événement</span>
              <h3 class="h6 fw-bold mb-2">{{ $ag->title }}</h3>
              <p class="small text-muted mb-0">{{ $ag->summary }}</p>
          </a>
        </div>
        @endforeach
      </div>
    </section>
    @endif

    @if($posts->count() == 0 && $avis->count() == 0 && $agendas->count() == 0)
    <div class="text-center py-5">
      <i class="fas fa-search-minus fa-4x mb-3 text-muted opacity-25"></i>
      <h3>Aucun résultat trouvé</h3>
      <p class="text-muted">Essayez avec d'autres mots-clés ou parcourez nos catégories.</p>
      <div class="mt-4">
        <a href="{{ url('/') }}" class="btn btn-primary">Retour à l'accueil</a>
      </div>
    </div>
    @endif

  </div>
</div>
@endsection
