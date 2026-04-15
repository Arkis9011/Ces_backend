@extends('layouts.public')

@section('title', ($avisshow->titre ?? 'Avis') . ' | Conseil Économique et Social')

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
              <img src="{{ $avisshow->image_url }}" alt="{{ $avisshow->titre }}" class="w-100 mb-4 rounded shadow-sm img-fit-contain" style="max-height:500px;">
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
@endsection
