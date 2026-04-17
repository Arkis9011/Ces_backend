@extends('layouts.public')

@section('title', ($actualite->titre ?? 'Article') . ' | Conseil Économique et Social')

@section('og_type', 'article')
@section('og_title', $actualite->titre)
@section('og_description', Str::limit(strip_tags($actualite->contenu), 160))
@section('og_image', $actualite->image_url ?? asset('assets/images/logo_header.png'))

@section('content')
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      <a href="{{ url('actualites') }}">Actualités</a><i class="fas fa-chevron-right"></i><span>Article</span>
    </div>
    <div class="hero-tag"><i class="fas fa-newspaper"></i> Actualité</div>
    <h1>{{ $actualite->titre }}</h1>
  </div>
</div>

<div class="content-wrap pb-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="prose">
          <img src="{{ $actualite->image_url ?? 'https://via.placeholder.com/1200x600?text=CES+RDC' }}" alt="{{ $actualite->titre }}" class="w-100 mb-4 rounded shadow-sm img-contain" style="max-height:600px;">
          
          <div class="d-flex align-items-center mb-4 gap-4 text-muted small border-bottom pb-3">
              <span><i class="far fa-calendar-alt text-primary"></i> {{ \Carbon\Carbon::parse($actualite->date_publication ?? $actualite->created_at)->translatedFormat('d F Y') }}</span>
              @if($actualite->categorie) 
                <span><i class="fas fa-tag text-primary"></i> {{ $actualite->categorie }}</span> 
              @endif
          </div>

          <div class="texte_justifie mb-5" style="font-size: 1.1rem; line-height: 1.8; color: #333;">
              {!! $actualite->contenu !!}
          </div>

          @if($actualite->section_1)
              <div class="texte_justifie mb-4">
                  {!! $actualite->section_1 !!}
              </div>
          @endif

          @if($actualite->image_url_2 || $actualite->image_url_3)
              <div class="row g-4 mb-4">
                  @if($actualite->image_url_2)
                      <div class="">
                        <img src="{{ $actualite->image_url_2 }}" class="img-fluid rounded shadow-sm w-100" alt="Illustration additionnelle">
                      </div>
                  @endif
                  @if($actualite->image_url_3)
                      <div class="">
                        <img src="{{ $actualite->image_url_3 }}" class="img-fluid rounded shadow-sm w-100" alt="Illustration additionnelle">
                      </div>
                  @endif
              </div>
          @endif

          @if($actualite->section_2)
              <div class="texte_justifie mb-4">
                  {!! $actualite->section_2 !!}
              </div>
          @endif

          @if($actualite->image_url_4)
              <div class="mb-4 text-center">
                  <img src="{{ $actualite->image_url_4 }}" class="img-fluid rounded shadow-sm w-100 img-contain" style="max-height: 500px;" alt="Illustration finale">
              </div>
          @endif

          @if($actualite->section_3)
              <div class="texte_justifie mb-5">
                  {!! $actualite->section_3 !!}
              </div>
          @endif
        </div>

        <div class="mt-5 pt-4 border-top">
          <a href="{{ url('actualites') }}" class="btn btn-outline-primary px-4"><i class="fas fa-arrow-left me-2"></i> Retour aux actualités</a>
        </div>
      </div>
    </div>
  </div>
</div>

@if(isset($suggestions) && $suggestions->count() > 0)
<section class="bg-light py-5">
    <div class="container">
        <h3 class="fw-bold mb-4" style="color: var(--bleu);">À lire aussi</h3>
        <div class="row g-4">
            @foreach($suggestions as $item)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm transition-hover">
                        <!-- Wrapper pour remplissage parfait -->
                        <div style="height: 200px; overflow: hidden; background: #f0f0f0;">
                            @if($item->image_url)
                                <img src="{{ $item->image_url }}" class="w-100 h-100 img-cover" alt="{{ $item->titre }}">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-primary-subtle text-primary">
                                    <i class="fas fa-newspaper fa-3x opacity-25"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <small class="text-primary fw-bold text-uppercase" style="font-size: 0.7rem;">{{ $item->categorie }}</small>
                            <h5 class="card-title mt-2 h6 fw-bold">
                                <a href="{{ route('actualites.show', $item->id) }}" class="text-decoration-none text-dark stretched-link">
                                    {{ Str::limit($item->titre, 70) }}
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection