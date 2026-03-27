<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Site Officiel du Conseil Économique et Social | République Démocratique du Congo</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Polices et icônes -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="{{ asset('assets/js/main.Js') }}"></script>

  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

<!-- ===== HEADER ===== -->
<header class="site-header">
  <div class="header-container">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
      <img src="{{ asset('assets/images/logo_header.png') }}" alt="Conseil Économique et Social - RDC" class="logo-img">
    </a>

    <!-- Bouton menu mobile -->
    <button class="mobile-toggle" id="mobileToggle" aria-label="Menu" aria-expanded="false">
      <i class="fas fa-bars" aria-hidden="true"></i>
    </button>

    <!-- Navigation principale -->
    <nav class="site-nav" id="mainNav" aria-label="Navigation principale">
      <ul class="site-nav-menu">
        <li class="site-nav-item"><a href="{{ url('/') }}" class="site-nav-link active">Accueil</a></li>

        <!-- Menu avec mega-dropdown -->
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

        <!-- Menu simple dropdown -->
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
          <a href="{{ url('actualites') }}" class="site-nav-link" aria-expanded="false" aria-haspopup="true">
            Actualités <i class="fas fa-chevron-down" aria-hidden="true"></i>
          </a>
          <ul class="site-dropdown" role="region" aria-label="Sous-menu Actualités">
            <li><a href="{{ url('actualites') }}"><i class="fas fa-newspaper" aria-hidden="true"></i> Nos Actualités</a></li>
            <li><a href="{{ url('agenda') }}"><i class="fas fa-calendar-alt" aria-hidden="true"></i> Agenda</a></li>
            <li><a href="{{ url('mediatheque') }}"><i class="fas fa-images" aria-hidden="true"></i> Médiathèque</a></li>
          </ul>
        </li>

        <li class="site-nav-item"><a href="{{ url('contact') }}" class="site-nav-link">Contact</a></li>

        <!-- CTA recherche commenté -->
        {{-- 
        <li class="site-nav-item search-item">
          <button class="site-nav-link search-toggle" aria-label="Ouvrir la recherche" aria-expanded="false">
            <i class="fas fa-search" aria-hidden="true"></i>
            <span class="search-text">Rechercher</span>
          </button>
          <div class="search-dropdown">
            <form action="{{ url('recherche') }}" method="get" role="search">
              <input type="search" name="q" placeholder="Rechercher..." aria-label="Rechercher" required>
              <button type="submit" aria-label="Lancer la recherche"><i class="fas fa-search"></i></button>
            </form>
          </div>
        </li>
        --}}
      </ul>
    </nav>
  </div>
</header>



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
  <div class="container">
    <!-- Tabs -->
    <div class="tabs">
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






<!-- ===== FOOTER ===== -->
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

<!-- Scripts Bootstrap et animation -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>