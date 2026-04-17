@extends('layouts.public')

@section('title', ($avisshow->titre ?? 'Avis') . ' | Conseil Économique et Social')

@section('og_type', 'article')
@section('og_title', $avisshow->titre)
@section('og_description', Str::limit(strip_tags($avisshow->resume), 160))
@section('og_image', $avisshow->image_url ?? asset('assets/images/logo_header.png'))

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      <a href="{{ url('avis') }}">Avis</a><i class="fas fa-chevron-right"></i><span>Avis Détaillé</span>
    </div>
    <div class="hero-tag"><i class="fas fa-scale-balanced"></i> Avis du CES</div>
    <h1>{{ $avisshow->titre }}</h1>
  </div>
</div>

<!-- CONTENU PRINCIPAL -->
<div class="content-wrap">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="prose">
          @if($avisshow->image_url)
              <img src="{{ $avisshow->image_url }}" alt="{{ $avisshow->titre }}" class="w-100 mb-4 rounded shadow-sm img-contain" style="max-height:500px;">
          @endif
          
          <div class="d-flex align-items-center mb-4 gap-3 text-muted small border-bottom pb-3">
              <span class="badge bg-danger text-uppercase px-3 py-2">{{ $avisshow->commission }}</span>
              <span class="ms-auto">
    <i class="far fa-calendar-alt text-primary me-1"></i> 
    {{ $avisshow->date_publication ? $avisshow->date_publication->translatedFormat('Y') : 'N/A' }}
</span>          </div>

          <div class="tx-content mt-4" style="font-size: 1.1rem; line-height: 1.8; color: #333; text-align: justify;">
              {!! $avisshow->resume !!}
          </div>
          
          @if($avisshow->pdf_url)
          <div class="mt-5 p-5 rounded text-center bg-light border border-dashed">
              <a href="{{ $avisshow->pdf_url }}" target="_blank" class="btn btn-primary btn-lg px-5 py-3 shadow-lg rounded-pill">
                <i class="fas fa-file-pdf me-2"></i> Consulter le résumé de l'avis 
              </a>
              <p class="text-muted mt-3 small mb-0">Le document s'ouvrira dans un nouvel onglet pour lecture ou téléchargement.</p>
          </div>
          @endif
          
        </div>
        <div class="mt-5 pt-4 border-top">
          <a href="{{ url('avis') }}" class="btn btn-outline-primary px-4"><i class="fas fa-arrow-left me-2"></i> Retour aux avis</a>
        </div>
      </div>
    </div>
  </div>
</div>

@if(isset($suggestions) && $suggestions->count() > 0)
<section class="bg-light py-5 mt-4">
    <div class="container">
        <h3 class="fw-bold mb-4" style="color: var(--bleu);">D'autres avis à consulter</h3>
        <div class="row g-4">
            @foreach($suggestions as $item)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm transition-hover">
                        <!-- Image qui remplit la carte et est centrée -->
                        <div style="height: 200px; overflow: hidden; background: #f0f0f0;">
                            @if($item->image_url)
                                <img src="{{ $item->image_url }}" class="w-100 h-100 img-cover" alt="{{ $item->titre }}">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-primary-subtle text-primary">
                                    <i class="fas fa-file-signature fa-3x opacity-25"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <small class="text-danger fw-bold text-uppercase" style="font-size: 0.7rem;">{{ $item->commission }}</small>
                            <h5 class="card-title mt-2 h6 fw-bold">
                                <a href="{{ route('avis.detail', $item->id) }}" class="text-decoration-none text-dark stretched-link">
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
