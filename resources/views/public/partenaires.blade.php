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
      Le CES <i class="fas fa-chevron-right"></i><span>Partenaires</span>
    </div>
    <div class="hero-tag"><i class="fas fa-handshake"></i> Réseau international</div>
    <h1>Nos <em>Partenaires</em></h1>
    <p>Le CES-RDC entretient des partenariats solides avec les principales organisations internationales de dialogue économique et social.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="container">
    <!-- Titre de section -->
    <div class="s-tag">Partenariats internationaux</div>
    <h2 class="s-title">Coopération <span>internationale</span></h2>

    <!-- Grille des partenaires internationaux -->
    <div class="row g-4 mt-4">
      <div class="col-lg-4">
        <div class="info-card reveal h-100">
          <h3 style="font-size:1.1rem;color:var(--bleu-fonce)"><i class="fas fa-globe" style="color:var(--jaune);background:var(--bleu-fonce)"></i> AICESIS</h3>
          <div class="prose" style="font-size:.88rem">
            <p>L'AICESIS (Association Internationale des Conseils Économiques et Sociaux et Institutions Similaires) est une organisation mondiale qui regroupe les institutions dédiées au dialogue social et à la consultation citoyenne. Elle sert de plateforme d'échange et de coopération entre les Conseils Économiques et Sociaux de différents pays. Son objectif principal est de promouvoir le dialogue entre les gouvernements et la "société civile organisée" (syndicats, organisations patronales, ONG, etc.). Fondée en 1999, l'association est aujourd'hui une organisation d'envergure internationale, elle réunit environ 70 membres provenant d'Afrique, d'Europe, d'Amérique Latine, d'Asie et du Moyen-Orient. </p>
            <p>Le CES RDC joue un rôle moteur et stratégique au sein de l’AICESIS, particulièrement en raison de sa position géographique et de son dynamisme diplomatique au sein du bloc africain.</p>
          </div>
          <a href="https://aicesis.org" target="_blank" class="doc-link"><i class="fas fa-external-link-alt"></i> Visiter le site AICESIS</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="info-card reveal h-100">
          <h3 style="font-size:1.1rem;color:var(--bleu-fonce)"><i class="fas fa-earth-europe" style="color:var(--jaune);background:var(--bleu-fonce)"></i> UCESIF</h3>
          <div class="prose" style="font-size:.88rem">
            <p>L'UCESIF (Union des Conseils Économiques et Sociaux et Institutions Similaires Francophones) est l'organisation qui regroupe les institutions de dialogue social des pays ayant en partage l'usage du français. L'UCESIF a pour but de favoriser le dialogue entre les sociétés civiles organisées de l'espace francophone. Elle compte environ 23 institutions membres issues d'Afrique, d'Europe, du Moyen-Orient et des Caraïbes. </p>
            <p>Le CES de la RD Congo est un membre très actif de l'UCESIF, participant régulièrement aux assemblées générales pour porter la voix de l'Afrique Centrale au sein de la famille francophone.</p>
          </div>
          <a href="https://ucesif.fr" target="_blank" class="doc-link"><i class="fas fa-external-link-alt"></i> Visiter le site UCESIF</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="info-card reveal h-100">
          <h3 style="font-size:1.1rem;color:var(--bleu-fonce)"><i class="fas fa-earth-africa" style="color:var(--jaune);background:var(--bleu-fonce)"></i> UCESA</h3>
          <div class="prose" style="font-size:.88rem">
            <p>L’UCESA (Union des Conseils Économiques et Sociaux et Institutions Similaires d’Afrique) est l’organisation régionale qui fédère les institutions de dialogue social sur l'ensemble du continent africain. L'UCESA a pour objectif principal d'unifier la voix des sociétés civiles africaines. Elle regroupe environ 20 institutions nationales issues de toutes les régions d'Afrique (Nord, Ouest, Centre, Est et Australe). </p>
            <p>Le Conseil Économique et Social de la RDC est un membre stratégique au sein de l'UCESA. En raison de l'immensité de son territoire et de ses défis environnementaux (Bassin du Congo), la RDC apporte une voix essentielle sur les questions de biodiversité et de développement durable au sein de l'Union</p>
          </div>
          <a href="https://ucesa.africa" target="_blank" class="doc-link"><i class="fas fa-external-link-alt"></i> Visiter le site UCESA</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="info-card reveal h-100">
          <h3 style="font-size:1.1rem;color:var(--bleu-fonce)"><i class="fas fa-globe" style="color:var(--jaune);background:var(--bleu-fonce)"></i> ECOSOC</h3>
          <div class="prose" style="font-size:.88rem">
            <p>L'ECOSOC (Conseil Économique et Social des Nations Unies) est l'un des six organes principaux de l'ONU. Contrairement à l'AICESIS, l'UCESIF ou l'UCESA qui sont des associations d'institutions consultatives, l'ECOSOC est une instance intergouvernementale officielle au cœur du système des Nations Unies. L'ECOSOC est le principal organe de coordination des activités économiques et sociales de l'ONU. Il est composé de 54 États membres, élus par l'Assemblée générale pour des mandats de trois ans, selon une répartition géographique équitable. L'année 2026 marque les 80 ans de l'ECOSOC (sa première réunion ayant eu lieu en janvier 1946). Cet anniversaire est l'occasion de réformes pour renforcer son rôle dans la gouvernance mondiale. </p>
            <p>L'AICESIS dont fait partie le CES de la RDC, bénéficie du statut consultatif auprès de l'ECOSOC. Cela permet aux conseils économiques et sociaux nationaux de faire remonter les préoccupations des citoyens et des acteurs de terrain directement au niveau des décisions mondiales de l'ONU..</p>
          </div>
          <a href="https://ecosoc.un.org/fr" target="_blank" class="doc-link"><i class="fas fa-external-link-alt"></i> Visiter le site de l'ECOSOC</a>
        </div>
      </div>
    </div>

    <!-- Institutions nationales -->
    <div class="mt-5">
      <div class="s-tag">Institutions nationales</div>
      <h2 class="s-title">Institutions de <span>la République</span></h2>
      
      <!-- Grille des institutions nationales -->
      <div class="row g-3 mt-4">
        <div class="col-lg col-md-4 col-6">
          <a href="https://presidence.cd" target="_blank" class="info-card reveal d-block text-center p-4 h-100" style="text-decoration:none;">
            <i class="fas fa-star" style="font-size:2rem;color:var(--bleu);margin-bottom:12px;display:block"></i>
            <div style="font-weight:700;font-size:.9rem;color:var(--texte);">Présidence</div>
            <div style="font-size:.75rem;color:var(--gris-texte);margin-top:4px;">presidence.cd</div>
          </a>
        </div>
        <div class="col-lg col-md-4 col-6">
          <a href="https://www.senat.cd" target="_blank" class="info-card reveal d-block text-center p-4 h-100" style="text-decoration:none;">
            <i class="fas fa-landmark" style="font-size:2rem;color:var(--bleu);margin-bottom:12px;display:block"></i>
            <div style="font-weight:700;font-size:.9rem;color:var(--texte);">Sénat</div>
            <div style="font-size:.75rem;color:var(--gris-texte);margin-top:4px;">senat.cd</div>
          </a>
        </div>
        <div class="col-lg col-md-4 col-6">
          <a href="https://assemblee-nationale.cd" target="_blank" class="info-card reveal d-block text-center p-4 h-100" style="text-decoration:none;">
            <i class="fas fa-building-columns" style="font-size:2rem;color:var(--bleu);margin-bottom:12px;display:block"></i>
            <div style="font-weight:700;font-size:.9rem;color:var(--texte);">Assemblée Nationale</div>
            <div style="font-size:.75rem;color:var(--gris-texte);margin-top:4px;">assemblee-nationale.cd</div>
          </a>
        </div>
        <div class="col-lg col-md-4 col-6">
          <a href="https://www.primature.gouv.cd" target="_blank" class="info-card reveal d-block text-center p-4 h-100" style="text-decoration:none;">
            <i class="fas fa-flag" style="font-size:2rem;color:var(--bleu);margin-bottom:12px;display:block"></i>
            <div style="font-weight:700;font-size:.9rem;color:var(--texte);">Primature</div>
            <div style="font-size:.75rem;color:var(--gris-texte);margin-top:4px;">primature.gouv.cd</div>
          </a>
        </div>
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

<script src="{{ asset('assets/js/main.Js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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