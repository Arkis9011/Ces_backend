<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $actualite->titre }} | Conseil Économique et Social</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .prose img { max-width: 100%; height: auto; border-radius: 8px; margin: 1.5rem 0; }
        .extra-image-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin: 2rem 0; }
        .suggestion-card { transition: transform 0.3s ease; border: none; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .suggestion-card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>

<header class="site-header">
  <div class="header-container">
    <a href="{{ url('/') }}" class="logo">
      <img src="{{ asset('assets/images/logo_header.png') }}" alt="Conseil Économique et Social - RDC" class="logo-img">
    </a>

    <button class="mobile-toggle" id="mobileToggle" aria-label="Menu" aria-expanded="false">
      <i class="fas fa-bars" aria-hidden="true"></i>
    </button>

    <nav class="site-nav" id="mainNav" aria-label="Navigation principale">
      <ul class="site-nav-menu">
        <li class="site-nav-item"><a href="{{ url('/') }}" class="site-nav-link">Accueil</a></li>
        <li class="site-nav-item has-mega">
          <a href="{{ url('apercu') }}" class="site-nav-link" aria-expanded="false" aria-haspopup="true">
            À propos du CES <i class="fas fa-chevron-down" aria-hidden="true"></i>
          </a>
          <div class="site-mega-dropdown" role="region" aria-label="Sous-menu À propos">
            <div class="mega-col">
              <h4 class="mega-col-title">Institution</h4>
              <ul>
                <li><a href="{{ url('apercu') }}"><i class="fas fa-info-circle" aria-hidden="true"></i> Aperçu du CES</a></li>
                <li><a href="{{ url('missions') }}"><i class="fas fa-bullseye" aria-hidden="true"></i> Missions</a></li>
                <li><a href="{{ url('partenaires') }}"><i class="fas fa-handshake" aria-hidden="true"></i> Partenaires</a></li>
                <li><a href="{{ url('textes') }}"><i class="fas fa-file-alt" aria-hidden="true"></i> Textes Légaux et Réglementaires</a></li>
              </ul>
            </div>
            <div class="mega-col">
              <h4 class="mega-col-title">Organisation</h4>
              <ul>
                <li><a href="{{ url('president') }}"><i class="fas fa-user-tie" aria-hidden="true"></i> Le Président</a></li>
                <li><a href="{{ url('bureau') }}"><i class="fas fa-users" aria-hidden="true"></i> Le Bureau</a></li>
                <li><a href="{{ url('assemblee') }}"><i class="fas fa-landmark" aria-hidden="true"></i> Assemblée Générale</a></li>
                <li><a href="{{ url('commissions') }}"><i class="fas fa-project-diagram" aria-hidden="true"></i> Commissions</a></li>
                <li><a href="{{ url('fonctionnement') }}"><i class="fas fa-cogs" aria-hidden="true"></i> Fonctionnement</a></li>
              </ul>
            </div>
          </div>
        </li>
        <li class="site-nav-item has-dropdown">
          <a href="{{ url('avis') }}" class="site-nav-link" aria-expanded="false" aria-haspopup="true">
            Travaux & Avis <i class="fas fa-chevron-down" aria-hidden="true"></i>
          </a>
          <ul class="site-dropdown" role="region" aria-label="Sous-menu Travaux">
            <li><a href="{{ url('avis') }}"><i class="fas fa-balance-scale" aria-hidden="true"></i> Nos Avis</a></li>
            <li><a href="{{ url('publications') }}"><i class="fas fa-book-open" aria-hidden="true"></i> Publications</a></li>
          </ul>
        </li>
        <li class="site-nav-item has-dropdown">
          <a href="{{ url('actualites') }}" class="site-nav-link active" aria-expanded="false" aria-haspopup="true">
            Actualités <i class="fas fa-chevron-down" aria-hidden="true"></i>
          </a>
          <ul class="site-dropdown" role="region" aria-label="Sous-menu Actualités">
            <li><a href="{{ url('actualites') }}"><i class="fas fa-newspaper" aria-hidden="true"></i> Nos Actualités</a></li>
            <li><a href="{{ url('agenda') }}"><i class="fas fa-calendar-alt" aria-hidden="true"></i> Agenda</a></li>
            <li><a href="{{ url('mediatheque') }}"><i class="fas fa-images" aria-hidden="true"></i> Médiathèque</a></li>
          </ul>
        </li>
        <li class="site-nav-item"><a href="{{ url('contact') }}" class="site-nav-link">Contact</a></li>
      </ul>
    </nav>
  </div>
</header>

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
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="prose">
        <img src="{{ $actualite->image_url ?? 'https://via.placeholder.com/1200x600?text=CES+RDC' }}" alt="{{ $actualite->titre }}" class="w-100 mb-4 rounded shadow-sm" style="object-fit:cover; max-height:600px;">
        
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
            <div class="extra-image-grid">
                @if($actualite->image_url_2)
                    <img src="{{ $actualite->image_url_2 }}" class="img-fluid rounded shadow-sm" alt="Illustration additionnelle">
                @endif
                @if($actualite->image_url_3)
                    <img src="{{ $actualite->image_url_3 }}" class="img-fluid rounded shadow-sm" alt="Illustration additionnelle">
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
                <img src="{{ $actualite->image_url_4 }}" class="img-fluid rounded shadow-sm w-100" style="max-height: 500px; object-fit: cover;" alt="Illustration finale">
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

@if(isset($suggestions) && $suggestions->count() > 0)
<section class="bg-light py-5">
    <div class="container">
        <h3 class="fw-bold mb-4" style="color: var(--bleu);">À lire aussi</h3>
        <div class="row g-4">
            @foreach($suggestions as $item)
                <div class="col-md-4">
                    <div class="card h-100 suggestion-card">
                        <img src="{{ $item->image_url ?? 'https://via.placeholder.com/400x250' }}" class="card-img-top" alt="{{ $item->titre }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <small class="text-primary fw-bold text-uppercase" style="font-size: 0.7rem;">{{ $item->categorie }}</small>
                            <h5 class="card-title mt-2 h6 fw-bold">
<a href="{{ route('actualites.show', $item->id) }}" class="text-decoration-none text-dark">                                    {{ Str::limit($item->titre, 70) }}
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

<footer style="background: var(--texte); padding-top: 3rem;">
  <div class="container">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-start gap-4 mb-4">
      <a href="{{ url('/') }}" class="d-flex align-items-center gap-3 text-decoration-none">
        <img src="{{ asset('assets/images/LOGO.png') }}" alt="Logo CES" style="height: 100px;">
        <div>
          <div class="text-white fw-bold fs-5">Conseil Économique et Social</div>
          <div class="small" style="color: rgba(255,255,255,0.5);">République Démocratique du Congo</div>
        </div>
      </a>
      <div class="text-md-end">
        <div class="d-flex flex-column gap-2">
          <div class="d-flex gap-2 justify-content-md-end">
            <i class="fas fa-map-marker-alt" style="color: var(--jaune); width: 20px;"></i>
            <span class="small text-white-50">161, Avenue Lupungu, Immeuble BOBO, Kinshasa / Gombe</span>
          </div>
          <div class="d-flex gap-2 justify-content-md-end">
            <i class="fas fa-envelope" style="color: var(--jaune); width: 20px;"></i>
            <span class="small text-white-50">infos@ces.cd</span>
          </div>
          <div class="d-flex gap-2 justify-content-md-end">
            <i class="fas fa-globe" style="color: var(--jaune); width: 20px;"></i>
            <span class="small text-white-50">www.ces.cd</span>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex flex-wrap justify-content-between align-items-center py-4 mt-5" style="border-top: 1px solid rgba(255,255,255,0.08);">
      <p class="small mb-0 mx-auto" style="color: rgba(255,255,255,0.4);">
        © {{ date('Y') }} Tous droits réservés | Conseil Économique et Social — République Démocratique du Congo
      </p>
    </div>
  </div>
  <div class="footer-tricolor" style="height:5px; background:linear-gradient(to right, var(--bleu) 33.33%, var(--jaune) 33.33%, var(--jaune) 66.66%, var(--rouge) 66.66%);"></div>
</footer>

<script src="{{ asset('assets/js/main.Js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>