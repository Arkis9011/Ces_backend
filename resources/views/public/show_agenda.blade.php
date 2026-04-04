@extends('layouts.public')

@section('title', ($agendashow->title ?? 'Événement') . ' | Conseil Économique et Social')

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      <a href="{{ url('agenda') }}">Agenda</a><i class="fas fa-chevron-right"></i><span>Événement</span>
    </div>
    <div class="hero-tag"><i class="fas fa-calendar-alt"></i> Événement</div>
    <h1>{{ $agendashow->title }}</h1>
  </div>
</div>

<!-- CONTENU PRINCIPAL -->
<div class="content-wrap">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="info-card mb-5 border-start border-4 border-primary p-4 bg-white shadow-sm rounded">
          <h3 class="mb-4 text-primary h5"><i class="fas fa-info-circle me-2"></i> Détails de l'événement</h3>
          <ul class="list-unstyled mb-0">
            <li class="d-flex align-items-center gap-3 py-3 border-bottom">
              <i class="fas fa-calendar-day fa-lg text-primary" style="width:24px;"></i> 
              <span class="fs-6"><strong>Date :</strong> {{ \Carbon\Carbon::parse($agendashow->date)->translatedFormat('d F Y') }}</span>
            </li>
            <li class="d-flex align-items-center gap-3 py-3 border-bottom">
              <i class="far fa-clock fa-lg text-primary" style="width:24px;"></i> 
              <span class="fs-6"><strong>Heure :</strong> {{ \Carbon\Carbon::parse($agendashow->heure)->format('H:i') }}</span>
            </li>
            <li class="d-flex align-items-center gap-3 py-3">
              <i class="fas fa-map-marker-alt fa-lg text-danger" style="width:24px;"></i> 
              <span class="fs-6"><strong>Lieu :</strong> {{ $agendashow->lieu ?? 'Siège du CES, Kinshasa' }}</span>
            </li>
          </ul>
        </div>
        
        <div class="prose texte_justifie">
          <h4 class="fw-bold mb-4">À propos de l'événement</h4>
          <div class="small text-muted" style="font-size: 1.05rem; line-height: 1.8;">
              {!! $agendashow->description !!}
          </div>
        </div>
        
        <div class="mt-5 pt-4 border-top">
          <a href="{{ url('agenda') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left me-2"></i> Retour à l'agenda</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
