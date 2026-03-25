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
      Le CES <i class="fas fa-chevron-right"></i><span>Aperçu du CES</span>
    </div>
    <div class="hero-tag"><i class="fas fa-info-circle"></i> L'institution</div>
    <h1>Aperçu du <em>Conseil Économique et Social</em></h1>
    <p>Organe consultatif constitutionnel au service de l'intérêt général de la République Démocratique du Congo.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="row g-5">
    <!-- Colonne principale -->
    <div class="col-lg-8">
      <div class="s-tag">Présentation</div>
      <h2 class="s-title">Qu'est-ce que le <span>CES</span> ?</h2>
      <div class="prose">
        <div class="texte_justifie">
          <p>Le Conseil Economique et Social (CES) est une Assemblée Consultative dotée de la personnalité juridique, instituée par la Constitution de la République Démocratique du Congo (RDC). Il est un cadre de concertation structuré entre différents acteurs socio-économiques du pays. Il traduit la volonté du Constituant de voir tous ces acteurs de la vie socio-économique partager la responsabilité du développement national dans le cadre de la démocratie économique et sociale.</p>
          <div class="s-tag"></div>
            <h2 class="s-title">Historique du <span>CES</span></h2>
            <p>La volonté politique de créer le CES en République Démocratique du Congo (RDC) remonte à quelques années seulement après l'accession du pays à l'indépendance.La première tentative formelle en ce sens date en effet de l'année 1964 avec la Constitution du 1er août 1964, dite "Constitution de Luluabourg", qui avait prévu, en ses articles 131 à 135, la mise en place des conseils économiques et sociaux au niveau national et dans les provinces. Mais ceux-ci n'avaient malheureusement pas fonctionné suite à l'instabilité politique de l'époque.Plus tard, il y a eu l'Ordonnance n° 89-029 du 26 janvier 1989 portant création d'un Conseil Consultatif Permanent pour le Développement (CCPD) et puis le Décret n° 008/01 du 23 février 2001 portant création et organisation du cadre Permanent de Concertation Economique, en sigle CPCE. Ces structures n'avaient pas non plus produit les résultats escomptés.Depuis lors, il a fallu attendre l'année 2006 pour voir le CES être de nouveau institué par la Constitution du 18 février 2006, adoptée par référendum, en ses articles 208 à 210. Et cette volonté du Constituant a été matérialisée par la promulgation de la Loi organique n°13/027 du 30 octobre 2013 portant organisation et fonctionnement du Conseil Economique et Social. Dans sa configuration actuelle, le CES a commencé de fonctionner effectivement par la tenue d'une session inaugurale convoquée le 16 décembre 2014 à la suite de l'Ordonnance n° 14/065 du 20 septembre 2014 portant investiture des membres du Conseil Economique et Social. L'année 2014 marque le début de la première mandature du CES, laquelle a pris fin en décembre 2019, donnant ainsi lieu à l'ouverture de la deuxième mandature qui est consacrée par la publication de l'Ordonnance n° 20/031 du 25 avril 2020 portant investiture des membres du Conseil Economique et Social.</p>
        </div>
      </div>

      <!-- Timeline -->
      <div class="mt-5">
        <h2 class="s-title">Évolution <span>institutionnelle</span></h2>
        <div class="timeline" style="margin-top:32px; max-width:680px">
          <div class="texte_justifie">
            <div class="timeline-item reveal">
              <div class="timeline-year">2006</div>
              <h4>Fondation constitutionnelle</h4>
              <p>La Constitution du 18 février 2006 consacre le CES comme organe consultatif de la République.</p>
            </div>
            <div class="timeline-item reveal">
              <div class="timeline-year">2013</div>
              <h4>Loi organique de fonctionnement</h4>
              <p>La Loi organique n° 13/027 fixe l'organisation et le fonctionnement du CES.</p>
            </div>
            <div class="timeline-item reveal">
              <div class="timeline-year">2014</div>
              <h4>Prémière mandature du CES</h4>
              <p>Ordonnance n°14/065 du 20 septembre 2014 portant investiture des membres du CES et le début de la prémière mandature</p>
            </div>
            <div class="timeline-item reveal">
              <div class="timeline-year">2015-2019</div>
              <h4>Partenariats</h4>
              <p>Le CES intègre l'UCESIF, l'UCESA, l'AICESIS,...</p>
            </div>
            <div class="timeline-item reveal">
              <div class="timeline-year">2020</div>
              <h4>Deuxième mandature du CES</h4>
              <p>Ordonnance n°20/031 du 25 avril 2020 portant investiture des membres du Conseil Economique et Social et le début de la deuxième mandature sous la présidence de Jean-Pierre KIWAKANA KIMAYALA</p>
            </div>
            <div class="timeline-item reveal">
              <div class="timeline-year">2025</div>
              <h4>Troisième mandature</h4>
              <p>Ordonnance n°25/188 du 25 mars 2025 portant investiture des membres du Conseil Economique et Social et le début de la troisième mandature sous la présidence de Jean-Pierre KIWAKANA KIMAYALA.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar droite -->
    <aside class="col-lg-4">
      <div class="sidebar-highlight">
        <h4><i class="fas fa-star"></i> Institution constitutionnelle</h4>
        <p>Créé par la Constitution du 18 février 2006, le CES est un pilier de la démocratie participative en RDC.</p>
        <a href="https://ik.imagekit.io/ces/documents/Constitution%20de%20la%203me%20Republique.%2018%20Fev%202006.pdf?updatedAt=1774198886387" target="blank">Voir les textes fondateurs</a>
      </div>
      <div class="sidebar-box">
        <h4><i class="fas fa-chart-bar"></i> Chiffres clés</h4>
        <ul>
          <li><i class="fas fa-users"></i> 68 Conseillers de la République</li>
          <li><i class="fas fa-project-diagram"></i> 7 commissions permanentes</li>
          <li><i class="fas fa-file-alt"></i> Plus de 100 avis rendus</li>
          <li><i class="fas fa-globe"></i> Membre de l'AICESIS</li>
          <li><i class="fas fa-handshake"></i> Partenaire de l'UCESA</li>
        </ul>
      </div>
      <div class="sidebar-box">
        <h4><i class="fas fa-link"></i> Navigation rapide</h4>
        <ul>
          <li><i class="fas fa-arrow-right"></i> <a href="{{ url('missions') }}">Missions</a></li>
          <li><i class="fas fa-arrow-right"></i> <a href="{{ url('bureau') }}">Le Bureau</a></li>
          <li><i class="fas fa-arrow-right"></i> <a href="{{ url('commissions') }}">Les Commissions</a></li>
          <li><i class="fas fa-arrow-right"></i> <a href="{{ url('textes') }}">Textes Légaux et Réglemenaires</a></li>
        </ul>
      </div>
      <div class="sidebar-box">
        <h4><i class="fas fa-info-circle"></i> Accès aux séances</h4>
        <ul>
          <li><i class="fas fa-circle-dot"></i> Les séances plénières sont publiques</li>
          <li><i class="fas fa-circle-dot"></i> Accréditation presse disponible</li>
          <li><i class="fas fa-circle-dot"></i> Retransmission en ligne prévue</li>
          <li><i class="fas fa-circle-dot"></i> Comptes rendus publiés après chaque séance</li>
        </ul>
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