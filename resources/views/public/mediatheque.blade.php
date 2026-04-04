@extends('layouts.public')

@section('title', 'Médiathèque | CES RDC')

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Actualités <i class="fas fa-chevron-right"></i><span>Médiathèque</span>
    </div>
    <div class="hero-tag"><i class="fas fa-images"></i> Galerie multimédia</div>
    <h1><em>Médiathèque</em> du CES</h1>
    <p>Galerie photos et vidéos des activités, séances plénières, événements et missions internationales du CES-RDC.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="container py-5">
    <!-- Tabs -->
    <div class="tabs mb-4">
      <button class="tab-btn active" data-group="med" data-target="med-photos">Photos</button>
      <button class="tab-btn" data-group="med" data-target="med-videos">Vidéos</button>
    </div>

    <!-- Panneau Photos -->
    <div id="med-photos" class="tab-panel active" data-group="med">
        <div class="row g-4 mt-2">
            @forelse($photos as $photo)
                <div class="col-md-4">
                    <div class="reveal h-100" style="border-radius:12px; overflow:hidden; box-shadow:var(--ombre); background:#fff;">
                        <img src="{{ $photo->image_url }}" 
                             alt="{{ $photo->titre }}" 
                             style="width:100%; height:210px; object-fit:cover;">
                        <div style="padding:14px;">
                            <p style="font-size:.82rem; color:var(--gris-texte); margin:0;">
                                {{ $photo->titre }} — {{ \Carbon\Carbon::parse($photo->date_publication)->translatedFormat('M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center py-5">Aucune photo disponible dans la médiathèque.</p>
            @endforelse
        </div>
    </div>

    <!-- Panneau Vidéos -->
    <div id="med-videos" class="tab-panel" data-group="med">
        <div class="row g-4 mt-2">
            @forelse($videos as $video)
                <div class="col-md-6">
                    <div class="reveal h-100" style="border-radius:12px; overflow:hidden; box-shadow:var(--ombre); background:#fff;">
                        <div style="width:100%; height:230px; background:#1a1a2e; display:flex; flex-direction:column; align-items:center; justify-content:center; gap:14px;">
                            <a href="{{ $video->url }}" target="_blank" style="text-decoration:none; display:flex; flex-direction:column; align-items:center; gap:12px;">
                                <div style="width:64px; height:64px; border-radius:50%; background:var(--rouge); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:#fff;">
                                    <i class="fas fa-play"></i>
                                </div>
                                <span style="color:rgba(255,255,255,.6); font-size:.85rem;">Cliquez pour visionner</span>
                            </a>
                        </div>
                        <div style="padding:16px;">
                            <h4 style="font-size:.9rem; margin:0;">{{ $video->title }}</h4>
                            @if($video->description)
                                <p class="small text-muted mb-0 mt-1">{{ Str::limit($video->description, 80) }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center py-5">Aucune vidéo disponible pour le moment.</p>
            @endforelse
        </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  // Script des onglets (tabs)
  document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const group = this.dataset.group;
      document.querySelectorAll(`.tab-btn[data-group="${group}"]`).forEach(b => b.classList.remove('active'));
      document.querySelectorAll(`.tab-panel[data-group="${group}"]`).forEach(p => p.classList.remove('active'));
      this.classList.add('active');
      document.getElementById(this.dataset.target).classList.add('active');
    });
  });

  // Animation reveal
  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.style.opacity = '1';
        e.target.style.transform = 'translateY(0)';
      }
    });
  }, { threshold: .08 });

  document.querySelectorAll('.reveal').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(18px)';
    el.style.transition = 'opacity .5s ease, transform .5s ease';
    obs.observe(el);
  });
</script>
@endsection