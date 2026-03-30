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
      Travaux <i class="fas fa-chevron-right"></i><span>Nos Avis</span>
    </div>
    <h1>Nos <em>Avis</em> &amp; Recommandations</h1>
    <p>Ensemble des avis produits par le Conseil Économique et Social sur les grandes questions économiques, sociales et environnementales.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-8">
        <div class="tabs-container mb-4 shadow-sm p-2 bg-light rounded-pill">
          <div class="tabs d-flex overflow-auto">
            <button class="tab-btn active px-4 py-2" data-group="avis" data-target="avis-tous">Tous les avis</button>
            @foreach(['ECOFIN', 'CERNAT', 'CSAC', 'CEFE', 'CIAT', 'REX', 'AGRIDEV'] as $comm)
              <button class="tab-btn px-4 py-2" data-group="avis" data-target="avis-{{ strtolower($comm) }}">{{ $comm }}</button>
            @endforeach
          </div>
        </div>

        <div id="avis-tous" class="tab-panel active" data-group="avis">
          @forelse($avis as $item)
            <div class="doc-card reveal mb-3 p-4 shadow-sm border-start border-4 border-primary bg-white d-flex align-items-center gap-4" style="border-radius: 8px;">
              <div class="doc-icon flex-shrink-0 d-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle" style="width: 60px; height: 60px;">
                @php
                  $icon = 'fa-file-signature';
                  $comm = strtolower($item->commission);
                  if(str_contains($comm, 'eco')) $icon = 'fa-chart-line';
                  elseif(str_contains($comm, 'cer')) $icon = 'fa-leaf';
                  elseif(str_contains($comm, 'rex')) $icon = 'fa-shield-halved';
                  elseif(str_contains($comm, 'agr')) $icon = 'fa-tractor';
                @endphp
                <i class="fas {{ $icon }} fa-lg"></i>
              </div>
              
              <div class="doc-meta flex-grow-1">
                <div class="d-flex justify-content-between align-items-start mb-1">
                  <span class="badge bg-secondary-subtle text-secondary text-uppercase small" style="font-size: 0.65rem;">{{ $item->commission }}</span>
                  <span class="text-muted small"><i class="far fa-clock me-1"></i>{{ $item->created_at->format('H:i') }}</span>
                </div>
                <h4 class="h6 fw-bold mb-2" style="font-family: 'Inter', sans-serif; line-height: 1.5;">{{ $item->titre }}</h4>
                <div class="d-flex align-items-center gap-3">
                  <div class="doc-date text-muted small">
                    <i class="fas fa-calendar-alt me-1 text-primary"></i> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                  </div>
                  <a href="{{ route('avis.detail', $item->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                    <i class="fas fa-eye me-2"></i>Voir les détails
                  </a>
                </div>
              </div>
            </div>
          @empty
            <div class="text-center py-5 bg-light rounded-4">
              <i class="fas fa-folder-open fa-3x mb-3 text-muted opacity-25"></i>
              <p class="text-muted">Aucun avis disponible pour le moment.</p>
            </div>
          @endforelse
        </div>

        {{-- Les panneaux filtrés (Exemple pour ECOFIN) --}}
        <div id="avis-ecofin" class="tab-panel" data-group="avis">
            {{-- Ici tu peux filtrer ta collection en Blade si tu ne veux pas multiplier les variables du contrôleur --}}
            @foreach($avis->where('commission', 'ECOFIN') as $item)
                {{-- Même structure que la doc-card ci-dessus --}}
            @endforeach
        </div>

      </div>

      <aside class="col-lg-4">
        <div class="sidebar-box p-4 bg-white shadow-sm rounded-4 mb-4">
          <h4 class="h5 fw-bold mb-4 border-bottom pb-2"><i class="fas fa-filter text-primary me-2"></i>Rôle consultatif</h4>
          <p class="small text-muted">Les avis du CES sont le fruit de délibérations rigoureuses au sein des commissions spécialisées, visant à éclairer les décisions publiques.</p>
          <ul class="list-unstyled mt-3">
            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Études d'impact</li>
            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Rapports annuels</li>
            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Recommandations stratégiques</li>
          </ul>
        </div>
        
        <div class="sidebar-highlight p-4 text-white rounded-4 shadow-lg" style="background: linear-gradient(135deg, var(--bleu), #003366);">
          <h4 class="h5 fw-bold mb-3"><i class="fas fa-paper-plane me-2"></i>Saisine du Conseil</h4>
          <p class="small opacity-75">Le CES peut être saisi par le Président de la République, le Gouvernement ou le Parlement.</p>
          <a href="{{ url('contact') }}" class="btn btn-warning w-100 fw-bold mt-2">Nous contacter</a>
        </div>
      </aside>
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


{{-- @include('components.public-view-modal') --}}

<script src="{{ asset('assets/js/main.Js') }}"></script>

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
<script>
  // Slider et observer (ajusté pour le carrousel existant)
  let current = 0;
  const total = 3;
  let autoSlide;
  function updateSlider() {
    const track = document.querySelector('.carousel__track');
    if (track) {
      track.style.transform = `translateX(-${current * 100}%)`;
      document.querySelectorAll('.carousel__dot').forEach((d, i) => {
        d.classList.toggle('carousel__dot--active', i === current);
        d.setAttribute('aria-current', i === current ? 'true' : 'false');
      });
    }
  }
  function changeSlide(dir) { current = (current + dir + total) % total; updateSlider(); resetAuto(); }
  function goToSlide(n) { current = n; updateSlider(); resetAuto(); }
  function resetAuto() { clearInterval(autoSlide); autoSlide = setInterval(() => changeSlide(1), 5500); }

  // Attacher les événements après le chargement du DOM
  document.addEventListener('DOMContentLoaded', () => {
    const prevBtn = document.querySelector('.carousel__arrow--prev');
    const nextBtn = document.querySelector('.carousel__arrow--next');
    const dots = document.querySelectorAll('.carousel__dot');

    if (prevBtn) prevBtn.addEventListener('click', () => changeSlide(-1));
    if (nextBtn) nextBtn.addEventListener('click', () => changeSlide(1));
    dots.forEach((dot, idx) => {
      dot.addEventListener('click', () => goToSlide(idx));
    });

    updateSlider();
    resetAuto();

    // Intersection Observer pour les animations
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.style.opacity = '1';
          e.target.style.transform = 'translateY(0)';
        }
      });
    }, { threshold: 0.1 });
    document.querySelectorAll('.news-card, .avis-card, .pub-card, .bureau-card, .commission-card').forEach(el => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
      observer.observe(el);
    });
  });
</script>
</body>
</html>