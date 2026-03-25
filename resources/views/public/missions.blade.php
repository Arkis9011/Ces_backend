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
          <a href="#" class="site-nav-link" aria-expanded="false" aria-haspopup="true">
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
          <a href="#" class="site-nav-link" aria-expanded="false" aria-haspopup="true">
            Travaux & Avis <i class="fas fa-chevron-down" aria-hidden="true"></i>
          </a>
          <ul class="site-dropdown" role="region" aria-label="Sous-menu Travaux">
            <li><a href="{{ url('avis') }}"><i class="fas fa-balance-scale" aria-hidden="true"></i> Nos Avis</a></li>
            <li><a href="{{ url('publications') }}"><i class="fas fa-book-open" aria-hidden="true"></i> Publications</a></li>
          </ul>
        </li>

        <li class="site-nav-item has-dropdown">
          <a href="#" class="site-nav-link" aria-expanded="false" aria-haspopup="true">
            Actualités <i class="fas fa-chevron-down" aria-hidden="true"></i>
          </a>
          <ul class="site-dropdown" role="region" aria-label="Sous-menu Actualités">
            <li><a href="{{ url('actualites') }}"><i class="fas fa-newspaper" aria-hidden="true"></i> Nos Actualités</a></li>
            <li><a href="{{ url('agenda') }}"><i class="fas fa-calendar-alt" aria-hidden="true"></i> Agenda</a></li>
            <li><a href="{{ url('mediatheque') }}"><i class="fas fa-images" aria-hidden="true"></i> Médiathèque</a></li>
          </ul>
        </li>

        <li class="site-nav-item"><a href="{{ url('contact') }}" class="site-nav-link">Contact</a></li>

        <!-- CTA recherche -->
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
      </ul>
    </nav>
  </div>
</header>




<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Le CES <i class="fas fa-chevron-right"></i><span>Missions</span>
    </div>
    <div class="hero-tag"><i class="fas fa-bullseye"></i> Rôle constitutionnel</div>
    <h1>Missions</h1>
    <p>Le CES conseille les pouvoirs publics sur les grandes orientations qui engagent l'avenir de la Nation congolaise.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="row g-5">
    <!-- Colonne principale -->
    <div class="col-lg-8">
      <div class="s-tag">Attributions</div>
      <h2 class="s-title">Ce que fait <span>le CES</span></h2>
      <div class="prose">
        <p>Tel que précisé par la Constitution et dans la loi organique, Le Conseil économique et social est une asseùblée consultative dotée de la personnalité juridique. Il a pour mission de donner des avis consultatifs sur les questions économiques et sociales lui soumises par le Président de la République, l’Assemblée nationale, le Sénat et le Gouvernement.Il peut, de sa propre initiative, appeler l’attention du Gouvernement et des provinces sur les réformes qui lui paraissent de nature à favoriser le développement économique et social du pays. <br> 
        De ce fait, Le CES est chargé de :
          <h4><strong>Analyse et Suivi</strong></h4>
            <ul>
              <li>Analyser la conjoncture économique et sociale du pays : Le CES examine de près les tendances actuelles du marché et du climat social pour anticiper les défis de demain.</li>
              <li>Assurer le suivi des politiques économiques et sociales nationales, provinciales et internationales, ainsi que les répercussions sur la vie des Congolais.</li>
            </ul>
          <h4><strong>Information et Orientation</strong></h4>
            <ul>
              <li>Contribuer à l'information des citoyens sur l'évolution de la situation économique et sociale.</li>
              <li>Donner son avis sur les orientations générales de l'économie nationale : Le CES émet des avis consultatifs sur les grandes directions stratégiques prises pour l'économie nationale.</li>
            </ul>
          <h4><strong>Propositions et Collaboration</strong></h4>
          <ul>
            <li>Formuler des propositions dans les divers domaines économique et social.</li>
            <li>Favoriser la coopération entre les partenaires économiques et sociaux et contribuer à l'élaboration d'une charte sociale commune.</li>
          </ul>
          <h4><strong>Etudes et Transparence</strong></h4>
          <ul>
            <li>Publier un rapport annuel sur la situation économique et sociale</li>
            <li>Collecter et constituer une banque des données sur la situation économique et sociale.</li>
            <li>Réaliser des études et recherches dans le domaine relevant de l'exercice de ses attributions.</li>
          </ul>
        </p>
      </div>
    </div>

    <!-- Sidebar droite -->
    <aside class="col-lg-4">
      <div class="sidebar-box">
        <h4><i class="fas fa-gavel"></i> Base légale</h4>
        <ul>
          <li><i class="fas fa-file-alt"></i> Constitution du 18 février 2006</li>
          <li><i class="fas fa-file-alt"></i> Loi organique n° 13-027 de 2013</li>
          <li><i class="fas fa-file-alt"></i> Règlement intérieur du CES</li>
        </ul>
      </div>

      <!-- Grille des stats -->
      <div class="row g-3 mb-4">
        <div class="col-6">
          <div class="stat-bloc"><div class="num">7</div><div class="lbl">Commissions</div></div>
        </div>
        <div class="col-6">
          <div class="stat-bloc"><div class="num">100+</div><div class="lbl">Avis rendus</div></div>
        </div>
        <div class="col-6">
          <div class="stat-bloc"><div class="num">68</div><div class="lbl">Conseillers</div></div>
        </div>
        <div class="col-6">
          <div class="stat-bloc"><div class="num">10+</div><div class="lbl">Partenaires int.</div></div>
        </div>
      </div>

      <div class="sidebar-highlight">
        <h4><i class="fas fa-scale-balanced"></i> Saisine du CES</h4>
        <p>Toute institution peut soumettre une question au CES pour avis consultatif.</p>
        <a href="{{ url('contact') }}">Nous contacter</a>
      </div>
    </aside>
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