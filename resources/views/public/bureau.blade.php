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
      Organisation <i class="fas fa-chevron-right"></i><span>Le Bureau</span>
    </div>
    <div class="hero-tag"><i class="fas fa-users"></i> Gouvernance</div>
    <h1>Le <em>Bureau</em> du CES</h1>
    <p>Composition du Bureau du Conseil Économique et Social, organe dirigeant de l'institution.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="container">
    <div class="s-tag">Membres élus</div>
    <h2 class="s-title">Composition du <span>Bureau</span></h2>
    <p class="prose mb-5" style="max-width:680px;">Le Bureau est l'organe moteur, permanent et décisionnel du CES. Il assure la gestion courante de l'institution et statue par voie de décision. Il comprend sept membres élus par l'Assemblée Générale pour la durée de la mandature.</p>

    <!-- Grille des membres -->
    <div class="row g-4">
      <!-- Président -->
      <div class="col-lg-3 col-md-6">
        <div class="membre-card reveal" style="border-top:4px solid var(--jaune)">
          <img src="https://ik.imagekit.io/ces/bureau/Pr%20JKK_.JPG" alt="Président" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph" style="display:none"><i class="fas fa-user-tie"></i></div>
          <div class="mc-body">
            <div class="mc-role">Président</div>
            <div class="mc-name">Jean Pierre Kiwakana KIMAYALA</div>
            <span class="mc-badge"><i class="fas fa-star"></i> Président</span>
          </div>
        </div>
      </div>
      <!-- 1er VP -->
      <div class="col-lg-3 col-md-6">
        <div class="membre-card reveal">
          <img src="https://ik.imagekit.io/ces/bureau/1Pr%20LKK.png" alt="1er VP" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph" style="display:none"><i class="fas fa-user-tie"></i></div>
          <div class="mc-body">
            <div class="mc-role">1er Vice-Président</div>
            <div class="mc-name">Léon Kyaboba KASOBWA</div>
          </div>
        </div>
      </div>
      <!-- 2ème VP -->
      <div class="col-lg-3 col-md-6">
        <div class="membre-card reveal">
          <img src="https://ik.imagekit.io/ces/bureau/2Pr%20CTK.png" alt="2e VP" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph" style="display:none"><i class="fas fa-user-tie"></i></div>
          <div class="mc-body">
            <div class="mc-role">2ème Vice-Président</div>
            <div class="mc-name">Célestin Tshibwabwa KANYAMA</div>
          </div>
        </div>
      </div>
      <!-- Rapporteur -->
      <div class="col-lg-3 col-md-6">
        <div class="membre-card reveal">
          <img src="https://ik.imagekit.io/ces/bureau/Rapp%20RNM.png" alt="Rapporteur" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph" style="display:none"><i class="fas fa-user-tie"></i></div>
          <div class="mc-body">
            <div class="mc-role">Rapporteur</div>
            <div class="mc-name">René Ngongo MATESO</div>
          </div>
        </div>
      </div>
      <!-- Rapporteur Adjoint -->
      <div class="col-lg-3 col-md-6">
        <div class="membre-card reveal">
          <img src="https://ik.imagekit.io/ces/bureau/Rapp.Adj%20SMT.png" alt="Rapp. Adj." onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph" style="display:none"><i class="fas fa-user-tie"></i></div>
          <div class="mc-body">
            <div class="mc-role">Rapporteur Adjoint</div>
            <div class="mc-name">Sylvie Mbakata THULA</div>
          </div>
        </div>
      </div>
      <!-- Questeur -->
      <div class="col-lg-3 col-md-6">
        <div class="membre-card reveal">
          <img src="https://ik.imagekit.io/ces/bureau/Quest.%20AMEK.png" alt="Questeur" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph" style="display:none"><i class="fas fa-user-tie"></i></div>
          <div class="mc-body">
            <div class="mc-role">Questeur</div>
            <div class="mc-name">Astrid Martins Elias KABENGELE</div>
          </div>
        </div>
      </div>
      <!-- Questeur Adjoint -->
      <div class="col-lg-3 col-md-6">
        <div class="membre-card reveal">
          <img src="https://ik.imagekit.io/ces/bureau/Quest.Adj%20BMY.png" alt="Questeur Adj." onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph" style="display:none"><i class="fas fa-user-tie"></i></div>
          <div class="mc-body">
            <div class="mc-role">Questeur Adjoint</div>
            <div class="mc-name">Béatrice Mpulu YEMBELA</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Section Attributions -->
    <div class="mt-5 p-5" style="background:var(--gris-clair); border-radius:16px;">
      <div class="s-tag">Attributions</div>
      <h2 class="s-title" style="font-size:1.4rem;">Rôle du <span>Bureau</span></h2>
      <div class="prose" style="max-width:720px; margin-top:16px;">
        <p>Le Bureau assure la continuité des travaux entre les sessions plénières et coordonne les différentes missions du Conseil auprès du gouvernement ou du parlement.</p>
        <ul>
          <li>Veiller au bon fonctionnement du Conseil</li>
          <li>Assurer la gestion quotidienne du Conseil et de son patrimoine</li>
          <li>Elaborer le programme de travail du Conseil</li>
          <li>Proposer le mode de décision ou de votation</li>
          <li>Préparer et assurer l'exécution du budget du Conseil</li>
          <li>Rechercher toute information et toute documentation susceptible de faciliter le bon déroulement des travaux du Conseil</li>
          <li>Faire rapport à I'Assemblée Générale de toules les activités menées pendant les intersessions</li>
          <li>Organiser et assurer le suivi des échanges inter-conseils avec les autres pays</li>
          <li>Déterminer l'organisation et le fonctionnement des services de l'administration du Conseil</li>
          <li>Rechercher les voies et moyens pouvant garantir les bonnes conditions de travail aux Conseillers de la République</li>
          <li>Définir les thématiques prioritaires pour la formation des Conseillers de la République et des membres du Personnel du Conseil</li>
          <li>Examiner les demandes d'Avis et d'études déposées par le Président de la République, I'Assemblée Nationale, le Sénat, le Gouvemement et les attribuer aux Commissions concernées</li>
          <li>Examiner les demandes d'auto saisine, à défaut de les avoir initiées lui-même</li>
          <li>Etablir un relevé des décisions après chaque réunion et après validation, les transmettre à chaque Conseiller de la République</li>
          <li>Dresser chaque année un rapport de l'ensemble des suites reservées à ses Avis par les organes destinataires</li>
          <li>Statuer de la recevabilité des pétitions conformément à l'article 25 de la Loi organique portant organisation et fonctionnement du Conseil.</li>
        </ul>
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