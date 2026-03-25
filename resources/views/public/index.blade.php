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
    <nav class="nav" id="mainNav" aria-label="Navigation principale">
      <ul class="nav-menu">
        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link active">Accueil</a></li>

        <!-- Menu avec mega-dropdown -->
        <li class="nav-item has-mega">
          <a href="#" class="nav-link" aria-expanded="false" aria-haspopup="true">
            À propos du CES <i class="fas fa-chevron-down" aria-hidden="true"></i>
          </a>
          <div class="mega-dropdown" role="region" aria-label="Sous-menu À propos">
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
        <li class="nav-item has-dropdown">
          <a href="#" class="nav-link" aria-expanded="false" aria-haspopup="true">
            Travaux & Avis <i class="fas fa-chevron-down" aria-hidden="true"></i>
          </a>
          <ul class="dropdown" role="region" aria-label="Sous-menu Travaux">
            <li><a href="{{ url('avis') }}"><i class="fas fa-balance-scale" aria-hidden="true"></i> Nos Avis</a></li>
            <li><a href="{{ url('publications') }}"><i class="fas fa-book-open" aria-hidden="true"></i> Publications</a></li>
          </ul>
        </li>

        <li class="nav-item has-dropdown">
          <a href="#" class="nav-link" aria-expanded="false" aria-haspopup="true">
            Actualités <i class="fas fa-chevron-down" aria-hidden="true"></i>
          </a>
          <ul class="dropdown" role="region" aria-label="Sous-menu Actualités">
            <li><a href="{{ url('actualites') }}"><i class="fas fa-newspaper" aria-hidden="true"></i> Nos Actualités</a></li>
            <li><a href="{{ url('agenda') }}"><i class="fas fa-calendar-alt" aria-hidden="true"></i> Agenda</a></li>
            <li><a href="{{ url('mediatheque') }}"><i class="fas fa-images" aria-hidden="true"></i> Médiathèque</a></li>
          </ul>
        </li>

        <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">Contact</a></li>

        <!-- CTA recherche -->
        <li class="nav-item search-item">
          <button class="nav-link search-toggle" aria-label="Ouvrir la recherche" aria-expanded="false">
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
      </ul>
    </nav>
  </div>
</header>

<!-- ===== HERO SLIDER ===== -->
<section class="carousel" aria-label="Carrousel d'actualités" aria-roledescription="carrousel">
  <div class="carousel__viewport">
    <div class="carousel__track">
      <!-- Slide 1 -->
      <div class="carousel__slide" role="group" aria-roledescription="slide" aria-label="1 sur 3">
        <source srcset="https://www.ces.cd/images/banner/slider2.webp" type="image/webp">
        <img class="carousel__image" src="https://ik.imagekit.io/ces/bureau/slide2.jpeg?updatedAt=1774355318294" alt="Paysage congolais illustrant la biodiversité" loading="eager" width="1920" height="1080">
        <div class="carousel__overlay"></div>
        <div class="carousel__content">
          <span class="carousel__tag"><i class="fas fa-star" aria-hidden="true"></i> À la une</span>
          <h2 class="carousel__title">Une voix consultative au cœur des politiques publiques</h2>
          <p class="carousel__description">Le CES conseille les pouvoirs publics sur les grandes orientations économiques, sociales, culturelles et environnementales.</p>
          <div class="carousel__actions">
            <a href="{{ url('actualites') }}" class="carousel__btn carousel__btn--primary">Nos Actualités</a>
            <a href="{{ url('apercu') }}" class="carousel__btn carousel__btn--outline">Découvrir le CES <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <!-- Slide 2 -->
      <div class="carousel__slide" role="group" aria-roledescription="slide" aria-label="2 sur 3">
        <source srcset="https://www.ces.cd/images/banner/slider1.webp" type="image/webp">
        <img class="carousel__image" src="https://ik.imagekit.io/ces/bureau/slide.jpeg" alt="Richesses minières de la RDC" loading="lazy" width="1920" height="1080">
        <div class="carousel__overlay"></div>
        <div class="carousel__content">
          <span class="carousel__tag"><i class="fas fa-gem" aria-hidden="true"></i> Nos richesses</span>
          <h2 class="carousel__title">Un espace de concertation inclusif pour la RDC</h2>
          <p class="carousel__description">Le CES réunit les représentants de toutes les forces vives : syndicats, patronat, ONG, professions libérales pour bâtir un développement durable.</p>
          <div class="carousel__actions">
            <a href="{{ url('contact') }}" class="carousel__btn carousel__btn--primary">Nous Contacter</a>
            <a href="{{ url('commissions') }}" class="carousel__btn carousel__btn--outline">Nos Commissions <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="carousel__slide" role="group" aria-roledescription="slide" aria-label="3 sur 3">
        <source srcset="https://www.ces.cd/images/banner/slider3.webp" type="image/webp">
        <img class="carousel__image" src="https://ik.imagekit.io/ces/bureau/Slide3%20(2).JPG" alt="Forêt équatoriale du Congo" loading="lazy" width="1920" height="1080">
        <div class="carousel__overlay"></div>
        <div class="carousel__content">
          <span class="carousel__tag"><i class="fas fa-leaf" aria-hidden="true"></i> Environnement</span>
          <h2 class="carousel__title">Analyse, réflexion &amp; propositions pour la Nation</h2>
          <p class="carousel__description">À travers ses avis et recommandations, le CES contribue à la formulation des politiques économiques et sociales basées sur les réalités du terrain.</p>
          <div class="carousel__actions">
            <a href="{{ url('avis') }}" class="carousel__btn carousel__btn--primary">Nos Avis</a>
            <a href="{{ url('publications') }}" class="carousel__btn carousel__btn--outline">Publications <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Flèches de navigation -->
  <button class="carousel__arrow carousel__arrow--prev" aria-label="Slide précédente">
    <i class="fas fa-chevron-left" aria-hidden="true"></i>
  </button>
  <button class="carousel__arrow carousel__arrow--next" aria-label="Slide suivante">
    <i class="fas fa-chevron-right" aria-hidden="true"></i>
  </button>

  <!-- Indicateurs (dots) -->
  <div class="carousel__dots" role="group" aria-label="Contrôles du carrousel">
    <button class="carousel__dot carousel__dot--active" aria-label="Aller à la slide 1" aria-current="true"></button>
    <button class="carousel__dot" aria-label="Aller à la slide 2" aria-current="false"></button>
    <button class="carousel__dot" aria-label="Aller à la slide 3" aria-current="false"></button>
  </div>
</section>

<!-- ===== BANDE STATS ===== -->
<div class="stats-band bg-primary py-4" style="background-color: var(--bleu-fonce) !important;">
  <div class="container">
    <div class="row text-center text-white">
      <div class="col-6 col-md-3 mb-3 mb-md-0">
        <div class="stat-num" style="font-size:2.2rem; font-weight:700; color:var(blanc);">7</div>
        <div class="stat-label text-uppercase small" style="color:rgba(255,255,255,0.75);">Commissions permanentes</div>
      </div>
      <div class="col-6 col-md-3 mb-3 mb-md-0">
        <div class="stat-num" style="font-size:2.2rem; font-weight:700; color:var(--blanc);">68</div>
        <div class="stat-label text-uppercase small" style="color:rgba(255,255,255,0.75);">Conseillers de la République</div>
      </div>
      <div class="col-6 col-md-3">
        <div class="stat-num" style="font-size:2.2rem; font-weight:700; color:var(--blanc);">100+</div>
        <div class="stat-label text-uppercase small" style="color:rgba(255,255,255,0.75);">Avis & Recommandations</div>
      </div>
      <div class="col-6 col-md-3">
        <div class="stat-num" style="font-size:2.2rem; font-weight:700; color:var(--blanc);">10+</div>
        <div class="stat-label text-uppercase small" style="color:rgba(255,255,255,0.75);">Partenaires internationaux</div>
      </div>
    </div>
  </div>
</div>

<!-- ===== ACTUALITÉS ===== -->
<section class="news-section py-5" style="background: var(--gris-clair);">
  <div class="container">
    <div class="d-flex flex-wrap align-items-end justify-content-between mb-5">
      <div>
        <div class="section-tag d-flex align-items-center gap-2 mb-2" style="color:var(--rouge);">
          <span style="width:24px; height:2px; background:var(--rouge);"></span> À la une
        </div>
        <h2 class="section-title" style="font-family:'Playfair Display'; font-size:2.2rem; font-weight:700;">Nos <span style="color:var(--bleu);">Actualités</span></h2>
      </div>
      <a href="{{ url('actualites') }}" class="see-all btn btn-outline-primary" style="border-color:var(--bleu-fonce); color:var(--bleu-fonce); font-weight:600;">Toutes les actualités <i class="fas fa-arrow-right"></i></a>
    </div>

    <div class="row g-4">
      <!-- Article vedette -->
      <div class="col-md-6">
        <div class="news-card featured h-100">
          <img src="https://res.cloudinary.com/dkjqzohc7/image/upload/v1745589138/news/dyurlyy2wr9mpuyuxqbt.jpg" class="w-100" style="height:300px; object-fit:cover;" alt="Séance plénière CES">
          <div class="news-body p-4">
            <span class="news-badge">Séance plénière</span>
            <div class="news-date text-primary small fw-semibold mt-2"><i class="fas fa-calendar"></i> 23 avril 2025</div>
            <h3 class="h5 fw-semibold mt-2" style="font-family:'Playfair Display';">Déroulement des travaux du Conseil Économique et Social – Séance plénière du mercredi 16 avril</h3>
            <a href="#" class="news-link text-primary fw-semibold">Lire l'article <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <!-- Article 2 -->
      <div class="col-md-3">
        <div class="news-card h-100">
          <img src="https://res.cloudinary.com/dkjqzohc7/image/upload/v1745589058/news/fkzyakylpfkosokkz9hd.jpg" class="w-100" style="height:220px; object-fit:cover;" alt="ZLECAF">
          <div class="news-body p-4">
            <div class="news-date text-primary small fw-semibold"><i class="fas fa-calendar"></i> 22 avril 2025</div>
            <h3 class="h6 fw-semibold mt-2" style="font-family:'Playfair Display';">Cérémonie d'ouverture de la 16ème réunion du Conseil des ministres – ZLECAF</h3>
            <a href="#" class="news-link text-primary fw-semibold">Lire l'article <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <!-- Article 3 -->
      <div class="col-md-3">
        <div class="news-card h-100">
          <img src="https://res.cloudinary.com/dkjqzohc7/image/upload/v1745588992/news/dh3d8vvizgsufsynd9tp.jpg" class="w-100" style="height:220px; object-fit:cover;" alt="Plénière désignation bureau">
          <div class="news-body p-4">
            <div class="news-date text-primary small fw-semibold"><i class="fas fa-calendar"></i> 21 avril 2025</div>
            <h3 class="h6 fw-semibold mt-2" style="font-family:'Playfair Display';">Plénière du 9 Avril 2025 au CES – Désignation des membres du bureau</h3>
            <a href="#" class="news-link text-primary fw-semibold">Lire l'article <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== NOS AVIS ===== -->
<section class="avis-section py-5">
  <div class="container">
    <!-- En-tête de section -->
    <div class="d-flex flex-wrap align-items-end justify-content-between mb-5">
      <div>
        <div class="d-flex align-items-center gap-2 mb-2">
          <span style="width:24px; height:2px; background:var(--rouge);"></span>
          <span class="text-uppercase small fw-bold" style="color:var(--rouge); letter-spacing:0.15em;">Contributions du CES</span>
        </div>
        <h2 class="section-title" style="font-family:'Playfair Display', serif; font-size:2.2rem; font-weight:700;">Nos <span style="color:var(--bleu);">Avis</span></h2>
      </div>
      <a href="{{ url('avis') }}" class="btn btn-outline-primary" style="border-color:var(--bleu-fonce); color:var(--bleu-fonce); font-weight:600; border-width:2px; padding:8px 20px;">Tous les avis <i class="fas fa-arrow-right ms-2"></i></a>
    </div>

    <!-- Grille des avis -->
    <div class="row g-4">
      <!-- Avis 1 -->
      <div class="col-md-4">
        <div class="avis-card position-relative p-4 h-100" style="border:1px solid #e8eef6; border-radius:12px; overflow:hidden; transition:all 0.7s ease;">
          <div style="position:absolute; top:0; left:0; width:4px; height:100%; background:linear-gradient(to bottom, var(--bleu), var(--rouge));"></div>
          <div class="avis-icon mb-3" style="width:48px; height:48px; border-radius:10px; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.3rem; color:var(--bleu-fonce);">
            <i class="fas fa-oil-well"></i>
          </div>
          <span class="badge bg-light text-danger text-uppercase mb-2" style="font-size:0.7rem; letter-spacing:0.08em; padding:3px 10px; border-radius:20px;">Ressources naturelles</span>
          <h3 class="h6 fw-semibold" style="font-family:'Playfair Display', serif; line-height:1.5; color:var(--texte);">Problématique de l'exploration et de l'exploitation des ressources pétrolières, minières et forestières dans les Aires protégées en RDC.</h3>
          <a href="#" class="d-inline-flex align-items-center mt-3 text-primary fw-semibold" style="color:var(--bleu); text-decoration:none; font-size:0.83rem; transition:gap 0.7s ease;" onmouseover="this.style.gap='10px'" onmouseout="this.style.gap='6px'">Lire l'avis <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
      </div>

      <!-- Avis 2 -->
      <div class="col-md-4">
        <div class="avis-card position-relative p-4 h-100" style="border:1px solid #e8eef6; border-radius:12px; overflow:hidden; transition:all 0.7s ease;">
          <div style="position:absolute; top:0; left:0; width:4px; height:100%; background:linear-gradient(to bottom, var(--bleu), var(--rouge));"></div>
          <div class="avis-icon mb-3" style="width:48px; height:48px; border-radius:10px; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.3rem; color:var(--bleu-fonce);">
            <i class="fas fa-shield-halved"></i>
          </div>
          <span class="badge bg-light text-danger text-uppercase mb-2" style="font-size:0.7rem; letter-spacing:0.08em; padding:3px 10px; border-radius:20px;">Gouvernance</span>
          <h3 class="h6 fw-semibold" style="font-family:'Playfair Display', serif; line-height:1.5; color:var(--texte);">Gagner la bataille contre la corruption, condition sine qua non pour la transformation socio-économique durable de la RDC.</h3>
          <a href="#" class="d-inline-flex align-items-center mt-3 text-primary fw-semibold" style="color:var(--bleu); text-decoration:none; font-size:0.83rem; transition:gap 0.7s ease;" onmouseover="this.style.gap='10px'" onmouseout="this.style.gap='6px'">Lire l'avis <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
      </div>

      <!-- Avis 3 -->
      <div class="col-md-4">
        <div class="avis-card position-relative p-4 h-100" style="border:1px solid #e8eef6; border-radius:12px; overflow:hidden; transition:all 0.7s ease;">
          <div style="position:absolute; top:0; left:0; width:4px; height:100%; background:linear-gradient(to bottom, var(--bleu), var(--rouge));"></div>
          <div class="avis-icon mb-3" style="width:48px; height:48px; border-radius:10px; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.3rem; color:var(--bleu-fonce);">
            <i class="fas fa-landmark"></i>
          </div>
          <span class="badge bg-light text-danger text-uppercase mb-2" style="font-size:0.7rem; letter-spacing:0.08em; padding:3px 10px; border-radius:20px;">Économie</span>
          <h3 class="h6 fw-semibold" style="font-family:'Playfair Display', serif; line-height:1.5; color:var(--texte);">Gagner la bataille de la corruption – Analyse des mécanismes institutionnels et propositions concrètes de réforme.</h3>
          <a href="#" class="d-inline-flex align-items-center mt-3 text-primary fw-semibold" style="color:var(--bleu); text-decoration:none; font-size:0.83rem; transition:gap 0.7s ease;" onmouseover="this.style.gap='10px'" onmouseout="this.style.gap='6px'">Lire l'avis <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== PUBLICATIONS ===== -->
<section class="publications-section py-5" style="background-color: var(--bleu-fonce);">
  <div class="container">
    <!-- En-tête de section -->
    <div class="d-flex flex-wrap align-items-end justify-content-between mb-5">
      <div>
        <div class="d-flex align-items-center gap-2 mb-2">
          <span style="width:24px; height:2px; background:var(--jaune);"></span>
          <span class="text-uppercase small fw-bold" style="color:var(--jaune); letter-spacing:0.15em;">Documentation officielle</span>
        </div>
        <h2 class="section-title text-white" style="font-family:'Playfair Display', serif; font-size:2.2rem; font-weight:700;">Nos <span style="color:var(--jaune);">Publications</span></h2>
      </div>
      <a href="{{ url('publications') }}" class="btn btn-outline-light" style="border-color:rgba(255,255,255,0.4); color:#fff; border-width:2px; padding:8px 20px; font-weight:600;">Toutes <i class="fas fa-arrow-right ms-2"></i></a>
    </div>

    <!-- Grille des publications -->
    <div class="row g-4">
      <!-- Publication 1 -->
      <div class="col-md-3">
        <div class="pub-card p-4 text-white h-100" style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.12); border-radius:12px; transition:all 0.7s ease; cursor:pointer;" onmouseover="this.style.background='rgba(255,255,255,0.13)'; this.style.borderColor='var(--jaune)'; this.style.transform='translateY(-4px)';" onmouseout="this.style.background='rgba(255,255,255,0.07)'; this.style.borderColor='rgba(255,255,255,0.12)'; this.style.transform='translateY(0)';">
          <div class="pub-icon fs-1 mb-3" style="color:rgba(247,209,23,0.3);"><i class="fas fa-file-pdf"></i></div>
          <div class="pub-type small text-uppercase fw-bold" style="color:var(--jaune);">Publication</div>
          <h4 class="h6 mt-2"> <a href="https://ik.imagekit.io/ces/documents/Expos%C3%A9%20du%20Pr%C3%A9sident%20National%20de%20F%C3%A9d%C3%A9ration%20des%20Entreprises%20du%20Congo%20et%20Pr%C3%A9sident%20du%20Conseil%20d_Administration%20de%20GECAMINES.pdf?updatedAt=1774195744577" target="blank">Exposé du Président National de la FEC et Président du Conseil d'Administration de GECAMINES</a></h4>
        </div>
      </div>

      <!-- Publication 2 -->
      <div class="col-md-3">
        <div class="pub-card p-4 text-white h-100" style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.12); border-radius:12px; transition:all 0.7s ease; cursor:pointer;" onmouseover="this.style.background='rgba(255,255,255,0.13)'; this.style.borderColor='var(--jaune)'; this.style.transform='translateY(-4px)';" onmouseout="this.style.background='rgba(255,255,255,0.07)'; this.style.borderColor='rgba(255,255,255,0.12)'; this.style.transform='translateY(0)';">
          <div class="pub-icon fs-1 mb-3" style="color:rgba(247,209,23,0.3);"><i class="fas fa-gavel"></i></div>
          <div class="pub-type small text-uppercase fw-bold" style="color:var(--jaune);">Loi organique</div>
          <h4 class="h6 mt-2"> <a href="https://ik.imagekit.io/ces/documents/LOI%20ORGANIQUE%20n%C2%B0%2013-027%20portant%20organisation%20et%20fonctionnement%20du%20Conseil%20%C3%A9conomique%20et%20social%20(J.O.RDC.,%209%20novembre%202013,%20n%C2%B0%20sp%C3%A9cial,%20col.%201).pdf?updatedAt=1774195742804" target="blank">LOI ORGANIQUE n°13-027 portant organisation et fonctionnement du CES (J.O.RDC., 2013)</a></h4>
        </div>
      </div>

      <!-- Publication 3 -->
      <div class="col-md-3">
        <div class="pub-card p-4 text-white h-100" style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.12); border-radius:12px; transition:all 0.7s ease; cursor:pointer;" onmouseover="this.style.background='rgba(255,255,255,0.13)'; this.style.borderColor='var(--jaune)'; this.style.transform='translateY(-4px)';" onmouseout="this.style.background='rgba(255,255,255,0.07)'; this.style.borderColor='rgba(255,255,255,0.12)'; this.style.transform='translateY(0)';">
          <div class="pub-icon fs-1 mb-3" style="color:rgba(247,209,23,0.3);"><i class="fas fa-earth-africa"></i></div>
          <div class="pub-type small text-uppercase fw-bold" style="color:var(--jaune);">Charte</div>
          <h4 class="h6 mt-2"><a href="https://ik.imagekit.io/ces/documents/CHARTE%20DE%20L_UCESA%20POUR%20LA%20DURABILITE%20DU%20DEVELOPPEMENT%20DE%20L_AFRIQUE.pdf?updatedAt=1774195749498" target="blank">Charte de l'UCESA pour la durabilité du développement de l'Afrique</a></h4>
        </div>
      </div>

      <!-- Publication 4 -->
      <div class="col-md-3">
        <div class="pub-card p-4 text-white h-100" style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.12); border-radius:12px; transition:all 0.7s ease; cursor:pointer;" onmouseover="this.style.background='rgba(255,255,255,0.13)'; this.style.borderColor='var(--jaune)'; this.style.transform='translateY(-4px)';" onmouseout="this.style.background='rgba(255,255,255,0.07)'; this.style.borderColor='rgba(255,255,255,0.12)'; this.style.transform='translateY(0)';">
          <div class="pub-icon fs-1 mb-3" style="color:rgba(247,209,23,0.3);"><i class="fas fa-users-gear"></i></div>
          <div class="pub-type small text-uppercase fw-bold" style="color:var(--jaune);">Rapport</div>
          <h4 class="h6 mt-2"> <a href="https://ik.imagekit.io/ces/documents/R%C3%A9union%20du%20Groupe%20de%20travail%20sur%20la%20Charte%20de%20l_UCESA%20pour%20la%20durabilit%C3%A9%20du%20d%C3%A9veloppement%20l_Afrique.pdf?updatedAt=1774195745390" target="blank">Réunion du Groupe de travail sur la Charte de l'UCESA pour la durabilité du développement en Afrique</a></h4>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== LE BUREAU ===== -->
<section class="bureau-section py-5" style="background: var(--gris-clair);">
  <div class="container">
    <!-- En-tête de section -->
    <div class="d-flex flex-wrap align-items-end justify-content-between mb-5">
      <div>
        <div class="d-flex align-items-center gap-2 mb-2">
          <span style="width:24px; height:2px; background:var(--rouge);"></span>
          <span class="text-uppercase small fw-bold" style="color:var(--rouge); letter-spacing:0.15em;">Gouvernance</span>
        </div>
        <h2 class="section-title" style="font-family:'Playfair Display', serif; font-size:2.2rem; font-weight:700;">Le <span style="color:var(--bleu);">Bureau</span></h2>
      </div>
      <a href="{{ url('membre_bureau') }}" class="btn btn-outline-primary" style="border-color:var(--bleu-fonce); color:var(--bleu-fonce); border-width:2px; padding:8px 20px; font-weight:600;">Voir tous les membres <i class="fas fa-arrow-right ms-2"></i></a>
    </div>

    <!-- Grille des membres -->
    <div class="row g-3">
      <!-- Président -->
      <div class="col-md col-6">
        <div class="bureau-card bureau-president text-center h-100" style="background:var(--blanc); border-radius:12px; overflow:hidden; box-shadow:var(--ombre); transition:all 0.7s ease;" onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 14px 40px rgba(0,0,0,0.14)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--ombre)';">
          <img src="https://ik.imagekit.io/ces/bureau/Pr%20JKK_.JPG?updatedAt=1774203069796" class="w-100" style="height:160px; object-fit:cover;" alt="Président Jean Pierre Kiwakana KIMAYALA" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
          <div class="bureau-img-placeholder" style="display:none; width:100%; height:160px; background:linear-gradient(135deg, var(--bleu-clair), #d0e8ff); align-items:center; justify-content:center; font-size:2.5rem; color:var(--bleu);"><i class="fas fa-user-tie"></i></div>
          <div class="bureau-info p-3">
            <div class="role small text-uppercase fw-bold" style="color:var(--rouge);">Président</div>
            <h4 class="h6 fw-semibold mt-1">Jean Pierre Kiwakana KIMAYALA</h4>
          </div>
        </div>
      </div>

      <!-- 1er Vice-Président -->
      <div class="col-md col-6">
        <div class="bureau-card text-center h-100" style="background:var(--blanc); border-radius:12px; overflow:hidden; box-shadow:var(--ombre); transition:all 0.7s ease;" onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 14px 40px rgba(0,0,0,0.14)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--ombre)';">
          <img src="https://ik.imagekit.io/ces/bureau/1Pr%20LKK.png?updatedAt=1774201365444" class="w-100" style="height:160px; object-fit:cover;" alt="1er Vice-Président Léon Kyaboba KASOBWA" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
          <div class="bureau-img-placeholder" style="display:none; width:100%; height:160px; background:linear-gradient(135deg, var(--bleu-clair), #d0e8ff); align-items:center; justify-content:center; font-size:2.5rem; color:var(--bleu);"><i class="fas fa-user-tie"></i></div>
          <div class="bureau-info p-3">
            <div class="role small text-uppercase fw-bold" style="color:var(--rouge);">1er Vice-Président</div>
            <h4 class="h6 fw-semibold mt-1">Léon Kyaboba KASOBWA</h4>
          </div>
        </div>
      </div>

      <!-- 2ème Vice-Président -->
      <div class="col-md col-6">
        <div class="bureau-card text-center h-100" style="background:var(--blanc); border-radius:12px; overflow:hidden; box-shadow:var(--ombre); transition:all 0.7s ease;" onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 14px 40px rgba(0,0,0,0.14)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--ombre)';">
          <img src="https://ik.imagekit.io/ces/bureau/2Pr%20CTK.png?updatedAt=1774201365415" class="w-100" style="height:160px; object-fit:cover;" alt="2ème Vice-Président Célestin Tshibwabwa KANYAMA" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
          <div class="bureau-img-placeholder" style="display:none; width:100%; height:160px; background:linear-gradient(135deg, var(--bleu-clair), #d0e8ff); align-items:center; justify-content:center; font-size:2.5rem; color:var(--bleu);"><i class="fas fa-user-tie"></i></div>
          <div class="bureau-info p-3">
            <div class="role small text-uppercase fw-bold" style="color:var(--rouge);">2ème Vice-Président</div>
            <h4 class="h6 fw-semibold mt-1">Célestin Tshibwabwa KANYAMA</h4>
          </div>
        </div>
      </div>

      <!-- Rapporteur -->
      <div class="col-md col-6">
        <div class="bureau-card text-center h-100" style="background:var(--blanc); border-radius:12px; overflow:hidden; box-shadow:var(--ombre); transition:all 0.7s ease;" onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 14px 40px rgba(0,0,0,0.14)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--ombre)';">
          <img src="https://ik.imagekit.io/ces/bureau/Rapp%20RNM.png?updatedAt=1774201365492" class="w-100" style="height:160px; object-fit:cover;" alt="Rapporteur René Ngongo MATESO" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
          <div class="bureau-img-placeholder" style="display:none; width:100%; height:160px; background:linear-gradient(135deg, var(--bleu-clair), #d0e8ff); align-items:center; justify-content:center; font-size:2.5rem; color:var(--bleu);"><i class="fas fa-user-tie"></i></div>
          <div class="bureau-info p-3">
            <div class="role small text-uppercase fw-bold" style="color:var(--rouge);">Rapporteur</div>
            <h4 class="h6 fw-semibold mt-1">René Ngongo MATESO</h4>
          </div>
        </div>
      </div>

      <!-- Rapporteur Adjoint -->
      <div class="col-md col-6">
        <div class="bureau-card text-center h-100" style="background:var(--blanc); border-radius:12px; overflow:hidden; box-shadow:var(--ombre); transition:all 0.7s ease;" onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 14px 40px rgba(0,0,0,0.14)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--ombre)';">
          <img src="https://ik.imagekit.io/ces/bureau/Rapp.Adj%20SMT.png?updatedAt=1774201365404" class="w-100" style="height:160px; object-fit:cover;" alt="Rapporteur Adjoint Sylvie Mbakata THULA" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
          <div class="bureau-img-placeholder" style="display:none; width:100%; height:160px; background:linear-gradient(135deg, var(--bleu-clair), #d0e8ff); align-items:center; justify-content:center; font-size:2.5rem; color:var(--bleu);"><i class="fas fa-user-tie"></i></div>
          <div class="bureau-info p-3">
            <div class="role small text-uppercase fw-bold" style="color:var(--rouge);">Rapporteur Adjoint</div>
            <h4 class="h6 fw-semibold mt-1">Sylvie Mbakata THULA</h4>
          </div>
        </div>
      </div>

      <!-- Questeur -->
      <div class="col-md col-6">
        <div class="bureau-card text-center h-100" style="background:var(--blanc); border-radius:12px; overflow:hidden; box-shadow:var(--ombre); transition:all 0.7s ease;" onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 14px 40px rgba(0,0,0,0.14)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--ombre)';">
          <img src="https://ik.imagekit.io/ces/bureau/Quest.%20AMEK.png?updatedAt=1774201365391" class="w-100" style="height:160px; object-fit:cover;" alt="Questeur Astrid Martins Elias KABENGELE" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
          <div class="bureau-img-placeholder" style="display:none; width:100%; height:160px; background:linear-gradient(135deg, var(--bleu-clair), #d0e8ff); align-items:center; justify-content:center; font-size:2.5rem; color:var(--bleu);"><i class="fas fa-user-tie"></i></div>
          <div class="bureau-info p-3">
            <div class="role small text-uppercase fw-bold" style="color:var(--rouge);">Questeur</div>
            <h4 class="h6 fw-semibold mt-1">Astrid Martins Elias KABENGELE</h4>
          </div>
        </div>
      </div>

      <!-- Questeur Adjoint -->
      <div class="col-md col-6">
        <div class="bureau-card text-center h-100" style="background:var(--blanc); border-radius:12px; overflow:hidden; box-shadow:var(--ombre); transition:all 0.7s ease;" onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 14px 40px rgba(0,0,0,0.14)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--ombre)';">
          <img src="https://ik.imagekit.io/ces/bureau/Quest.Adj%20BMY.png?updatedAt=1774201364781" class="w-100" style="height:160px; object-fit:cover;" alt="Questeur Adjoint Béatrice Mpulu YEMBELA" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
          <div class="bureau-img-placeholder" style="display:none; width:100%; height:160px; background:linear-gradient(135deg, var(--bleu-clair), #d0e8ff); align-items:center; justify-content:center; font-size:2.5rem; color:var(--bleu);"><i class="fas fa-user-tie"></i></div>
          <div class="bureau-info p-3">
            <div class="role small text-uppercase fw-bold" style="color:var(--rouge);">Questeur Adjoint</div>
            <h4 class="h6 fw-semibold mt-1">Béatrice Mpulu YEMBELA</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== COMMISSIONS ===== -->
<section class="commissions-section py-5">
  <div class="container">
    <!-- En-tête de section -->
    <div class="d-flex flex-wrap align-items-end justify-content-between mb-5">
      <div>
        <div class="d-flex align-items-center gap-2 mb-2">
          <span style="width:24px; height:2px; background:var(--rouge);"></span>
          <span class="text-uppercase small fw-bold" style="color:var(--rouge); letter-spacing:0.15em;">Organes techniques permanents</span>
        </div>
        <h2 class="section-title" style="font-family:'Playfair Display', serif; font-size:2.2rem; font-weight:700;">Nos <span style="color:var(--bleu);">Commissions</span></h2>
      </div>
      <a href="{{ url('commissions') }}" class="btn btn-outline-primary" style="border-color:var(--bleu-fonce); color:var(--bleu-fonce); border-width:2px; padding:8px 20px; font-weight:600;">Voir toutes <i class="fas fa-arrow-right ms-2"></i></a>
    </div>

    <p class="text-muted mb-5" style="max-width:700px; color:var(--gris-texte); font-size:0.95rem;">
      Les Commissions sont des organes techniques permanents du Conseil, chargés d'examiner les questions relevant de leurs attributions.
    </p>

    <div class="row g-4">
      <!-- Commission 1 -->
      <div class="col-md-3">
        <a href="{{ url('commissions-du-ces') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-chart-line"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Commission économique et financière</h4>
        </a>
      </div>

      <!-- Commission 2 -->
      <div class="col-md-3">
        <a href="{{ url('commissions-du-ces') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-tractor"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Agriculture et développement rural</h4>
        </a>
      </div>

      <!-- Commission 3 -->
      <div class="col-md-3">
        <a href="{{ url('commissions-du-ces') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-heart-pulse"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Santé, affaires sociales et culturelles</h4>
        </a>
      </div>

      <!-- Commission 4 -->
      <div class="col-md-3">
        <a href="{{ url('commissions-du-ces') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-scale-balanced"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Relations extérieures, intégrations, questions juridiques et administratives</h4>
        </a>
      </div>

      <!-- Commission 5 -->
      <div class="col-md-3">
        <a href="{{ url('commissions-du-ces') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-leaf"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Environnement et ressources naturelles</h4>
        </a>
      </div>

      <!-- Commission 6 -->
      <div class="col-md-3">
        <a href="{{ url('commissions-du-ces') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-road"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Infrastructures et aménagement du territoire</h4>
        </a>
      </div>

      <!-- Commission 7 -->
      <div class="col-md-3">
        <a href="{{ url('commissions-du-ces') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-graduation-cap"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Éducation, Formation et Emploi</h4>
        </a>
      </div>

      <!-- Commission 8 (spéciale) -->
      <div class="col-md-3">
        <a href="{{ url('commissions-du-ces') }}" class="commission-card d-block text-center p-4" style="border:2px dashed var(--bleu); background:var(--bleu-clair); border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--bleu-clair)'; this.style.borderColor='var(--bleu)'; this.querySelector('.commission-icon').style.background='var(--blanc)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--bleu-fonce)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--blanc); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-plus"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--bleu-fonce); transition:color 0.7s ease;">Voir toutes les commissions</h4>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ===== AGENDA ===== -->
<div class="agenda-band py-5" style="background: var(--bleu-clair);">
  <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
    <div class="agenda-text mb-4 mb-md-0">
      <h2 class="h1" style="font-family:'Playfair Display';"><i class="fas fa-calendar-days"></i> Notre Agenda</h2>
      <p class="mb-0">Consultez le programme des séances plénières, réunions et événements institutionnels du CES.</p>
    </div>
    <a href="{{ url('agenda') }}" class="agenda-btn btn btn-dark" style="background: var(--bleu-fonce); border:none; padding:13px 28px; font-weight:700;"><i class="fas fa-calendar-check"></i> Consulter l'agenda</a>
  </div>
</div>

<!-- ===== PARTENAIRES & INSTITUTIONS ===== -->
<section class="partenaires-section py-5" style="background: var(--gris-clair);">
  <div class="container">
    <div class="d-flex flex-wrap align-items-end justify-content-between mb-5">
      <div>
        <div class="d-flex align-items-center gap-2 mb-2">
          <span style="width:24px; height:2px; background:var(--rouge);"></span>
          <span class="text-uppercase small fw-bold" style="color:var(--rouge); letter-spacing:0.15em;">Réseau international</span>
        </div>
        <h2 class="section-title" style="font-family:'Playfair Display', serif; font-size:2.2rem; font-weight:700;">Nos <span style="color:var(--bleu);">Partenaires</span></h2>
      </div>
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-4">
      <a href="https://aicesis.org/" class="partenaire-item d-flex align-items-center gap-3 p-3" style="background:var(--blanc); border-radius:10px; box-shadow:var(--ombre); transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 30px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--ombre)';">
        <div class="p-icon" style="width:40px; height:40px; background:var(--bleu-clair); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:1.1rem; color:var(--bleu-fonce);"><i class="fas fa-globe"></i></div>
        <span class="fw-semibold" style="color:var(--texte);">AICESIS</span>
      </a>
      <a href="https://ucesif.fr/" class="partenaire-item d-flex align-items-center gap-3 p-3" style="background:var(--blanc); border-radius:10px; box-shadow:var(--ombre); transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 30px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--ombre)';">
        <div class="p-icon" style="width:40px; height:40px; background:var(--bleu-clair); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:1.1rem; color:var(--bleu-fonce);"><i class="fas fa-handshake"></i></div>
        <span class="fw-semibold" style="color:var(--texte);">UCESIF</span>
      </a>
      <a href="https://ucesa.africa/" class="partenaire-item d-flex align-items-center gap-3 p-3" style="background:var(--blanc); border-radius:10px; box-shadow:var(--ombre); transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 30px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--ombre)';">
        <div class="p-icon" style="width:40px; height:40px; background:var(--bleu-clair); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:1.1rem; color:var(--bleu-fonce);"><i class="fas fa-earth-africa"></i></div>
        <span class="fw-semibold" style="color:var(--texte);">UCESA</span>
      </a>
      <a href="https://ecosoc.un.org/fr/" class="partenaire-item d-flex align-items-center gap-3 p-3" style="background:var(--blanc); border-radius:10px; box-shadow:var(--ombre); transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 30px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--ombre)';">
        <div class="p-icon" style="width:40px; height:40px; background:var(--bleu-clair); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:1.1rem; color:var(--bleu-fonce);"><i class="fas fa-globe"></i></div>
        <span class="fw-semibold" style="color:var(--texte);">ECOSOC</span>
      </a>
    </div>

    <div class="mt-5">
      <div class="d-flex align-items-center gap-2 mb-3">
        <span style="width:24px; height:2px; background:var(--rouge);"></span>
        <span class="text-uppercase small fw-bold" style="color:var(--rouge); letter-spacing:0.15em;">Institutions de la République</span>
      </div>
      <div class="row g-3">
        <div class="col-md col-6">
          <a href="https://presidence.cd/" class="inst-item d-block p-3 text-center fw-semibold" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:8px; color:var(--bleu-fonce); font-size:0.82rem; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.color='#fff'; this.style.borderColor='var(--bleu-fonce)';" onmouseout="this.style.background='var(--blanc)'; this.style.color='var(--bleu-fonce)'; this.style.borderColor='#e5ebf4';"><i class="fas fa-star me-1"></i> Présidence</a>
        </div>
        <div class="col-md col-6">
          <a href="https://www.senat.cd/" class="inst-item d-block p-3 text-center fw-semibold" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:8px; color:var(--bleu-fonce); font-size:0.82rem; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.color='#fff'; this.style.borderColor='var(--bleu-fonce)';" onmouseout="this.style.background='var(--blanc)'; this.style.color='var(--bleu-fonce)'; this.style.borderColor='#e5ebf4';"><i class="fas fa-landmark me-1"></i> Sénat</a>
        </div>
        <div class="col-md col-6">
          <a href="https://assembleenationale.cd/" class="inst-item d-block p-3 text-center fw-semibold" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:8px; color:var(--bleu-fonce); font-size:0.82rem; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.color='#fff'; this.style.borderColor='var(--bleu-fonce)';" onmouseout="this.style.background='var(--blanc)'; this.style.color='var(--bleu-fonce)'; this.style.borderColor='#e5ebf4';"><i class="fas fa-building-columns me-1"></i> Assemblée Nationale</a>
        </div>
        <div class="col-md col-6">
          <a href="https://www.primature.gouv.cd/" class="inst-item d-block p-3 text-center fw-semibold" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:8px; color:var(--bleu-fonce); font-size:0.82rem; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.color='#fff'; this.style.borderColor='var(--bleu-fonce)';" onmouseout="this.style.background='var(--blanc)'; this.style.color='var(--bleu-fonce)'; this.style.borderColor='#e5ebf4';"><i class="fas fa-flag me-1"></i> Primature</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== RÉSEAUX SOCIAUX ===== -->
<div class="social-band py-4 bg-white border-top border-bottom">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center gap-3">
      <span class="fw-semibold text-secondary">Suivez-nous :</span>
      <a href="https://www.facebook.com/share/184aGHRW8M/" class="social-btn btn d-flex align-items-center gap-2" style="background:#1877F2; color:#fff; border:none; padding:10px 18px; border-radius:8px; font-size:0.85rem; font-weight:600; transition:all 0.7s ease;" onmouseover="this.style.opacity='0.88'; this.style.transform='translateY(-2px)';" onmouseout="this.style.opacity='1'; this.style.transform='translateY(0)';"><i class="fab fa-facebook-f"></i> Conseil Economique et Social/CES-RDC</a>
      <a href="https://x.com/ConseilEco_RDC" class="social-btn btn d-flex align-items-center gap-2" style="background:#1DA1F2; color:#fff; border:none; padding:10px 18px; border-radius:8px; font-size:0.85rem; font-weight:600; transition:all 0.7s ease;" onmouseover="this.style.opacity='0.88'; this.style.transform='translateY(-2px)';" onmouseout="this.style.opacity='1'; this.style.transform='translateY(0)';"><i class="fab fa-x-twitter"></i> @ConseilEco_RDC</a>
      <a href="https://www.youtube.com/@cesdrc" class="social-btn btn d-flex align-items-center gap-2" style="background:#FF0000; color:#fff; border:none; padding:10px 18px; border-radius:8px; font-size:0.85rem; font-weight:600; transition:all 0.7s ease;" onmouseover="this.style.opacity='0.88'; this.style.transform='translateY(-2px)';" onmouseout="this.style.opacity='1'; this.style.transform='translateY(0)';"><i class="fab fa-youtube"></i> YouTube</a>
    </div>
  </div>
</div>

<!-- ===== NEWSLETTER ===== -->
<section class="newsletter-section py-5" style="background: linear-gradient(135deg, var(--bleu-fonce) 0%, #003a7a 100%);">
  <div class="container">
    <div class="text-center text-white" style="max-width:680px; margin:auto;">
      <h2 class="h1" style="font-family:'Playfair Display';">Lettre d'information</h2>
      <p class="mb-4">Recevez directement sur votre adresse email les dernières informations et actualités sur l'institution.</p>
      <div class="d-flex flex-column flex-sm-row gap-3">
        <input type="email" class="form-control bg-transparent text-white" placeholder="Votre adresse email..." style="border:1px solid rgba(255,255,255,0.3);">
        <button class="btn btn-warning fw-bold" style="background:var(--jaune); border:none;">S'abonner <i class="fas fa-paper-plane"></i></button>
      </div>
    </div>
  </div>
</section>

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