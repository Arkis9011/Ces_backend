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





<!-- PAGE HERO -->
<div class="page-hero">
  <div class="container">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i>
      Le CES <i class="fas fa-chevron-right"></i><span>Assemblée Générale</span>
    </div>
    <div class="hero-tag"><i class="fas fa-landmark"></i> Organe délibérant</div>
    <h1>Assemblée <em>Générale</em></h1>
    <p>L'Assemblée Générale réunit l'ensemble des Conseillers de la République. Elle constitue l'organe délibérant suprême du CES.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL -->
<div class="content-wrap">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-8">
        <!-- Tabs -->
        <div class="tabs d-flex gap-2 border-bottom mb-4">
          <button class="tab-btn btn btn-link text-decoration-none px-3 py-2 active" data-group="ag" data-target="ag-conseillers">Conseillers</button>
          <!-- Autres onglets commentés dans l'original -->
        </div>

        <!-- Panels -->
        <div id="ag-conseillers" class="tab-panel active" data-group="ag">
          <div class="s-tag">Liste indicative</div>
          <h2 class="s-title" style="font-size:1.4rem">Conseillers de <span>la République</span></h2>
          <p class="prose" style="margin-bottom:24px">Les conseillers sont désignés pour représenter toutes les composantes de la société civile congolaise. Ils exercent leur mandat en toute indépendance.</p>
          <p class="section-sous-titre">L'Assemblée Générale est composée de représentants issus des douze catégories socioprofessionnelles suivantes :</p>

          <section class="section-categories">
            <div class="categories-grid">
              <!-- Catégorie 1 -->
              <div class="categorie-card" data-category="1">
                <div class="categorie-icon"><i class="fas fa-briefcase"></i></div>
                <h3 class="categorie-nom">Organisations Professionnelles des Employeurs Secteur Privé et Public</h3>
              </div>
              <!-- Catégorie 2 -->
              <div class="categorie-card" data-category="2">
                <div class="categorie-icon"><i class="fas fa-users"></i></div>
                <h3 class="categorie-nom">Organisations Professionnelles des travailleurs (Syndicats) Secteur Privé</h3>
              </div>
              <!-- Catégorie 3 -->
              <div class="categorie-card" data-category="3">
                <div class="categorie-icon"><i class="fas fa-leaf"></i></div>
                <h3 class="categorie-nom">O.N.G pour le Développement et la Protection de l'Environnement</h3>
              </div>
              <!-- Catégorie 4 -->
              <div class="categorie-card" data-category="4">
                <div class="categorie-icon"><i class="fas fa-church"></i></div>
                <h3 class="categorie-nom">Confessions Religieuses</h3>
              </div>
              <!-- Catégorie 5 -->
              <div class="categorie-card" data-category="5">
                <div class="categorie-icon"><i class="fas fa-gavel"></i></div>
                <h3 class="categorie-nom">Ordres, Associations et Corporations Professionnelles</h3>
              </div>
              <!-- Catégorie 6 -->
              <div class="categorie-card" data-category="6">
                <div class="categorie-icon"><i class="fas fa-venus"></i></div>
                <h3 class="categorie-nom">Associations des Femmes</h3>
              </div>
              <!-- Catégorie 7 -->
              <div class="categorie-card" data-category="7">
                <div class="categorie-icon"><i class="fas fa-crown"></i></div>
                <h3 class="categorie-nom">Autorités Traditionnelles et Coutumières</h3>
              </div>
              <!-- Catégorie 8 -->
              <div class="categorie-card" data-category="8">
                <div class="categorie-icon"><i class="fas fa-flask"></i></div>
                <h3 class="categorie-nom">Monde Scientifique</h3>
              </div>
              <!-- Catégorie 9 -->
              <div class="categorie-card" data-category="9">
                <div class="categorie-icon"><i class="fas fa-university"></i></div>
                <h3 class="categorie-nom">Secteur Financier, Bancaire et des Assurances</h3>
              </div>
              <!-- Catégorie 10 -->
              <div class="categorie-card" data-category="10">
                <div class="categorie-icon"><i class="fas fa-user-tie"></i></div>
                <h3 class="categorie-nom">Personnalités Indépendantes Designées Intuitu Personae</h3>
              </div>
              <!-- Catégorie 11 -->
              <div class="categorie-card" data-category="11">
                <div class="categorie-icon"><i class="fas fa-globe-africa"></i></div>
                <h3 class="categorie-nom">Diaspora</h3>
              </div>
              <!-- Catégorie 12 -->
              <div class="categorie-card" data-category="12">
                <div class="categorie-icon"><i class="fas fa-map-marked-alt"></i></div>
                <h3 class="categorie-nom">Délégués des 26 Provinces</h3>
              </div>
            </div>
          </section>

          <!-- MODALE -->
          <div class="modal-overlay" id="modalOverlay">
            <div class="custom-modal" id="modalContent">
              <div class="modal-header">
                <h2 id="modalCategoryTitle">Titre de la catégorie</h2>
                <button class="close-btn" id="closeModalBtn">&times;</button>
              </div>
              <div class="modal-content">
                <div class="table-container">
                  <table>
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Fonction</th>
                      </tr>
                    </thead>
                    <tbody id="modalTableBody">
                      <!-- Les lignes seront insérées ici dans le JS -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Autres panels (commentés dans l'original) -->
        <div id="ag-pleniere" class="tab-panel" data-group="ag" style="display:none;">
          <div class="s-tag">Séances récentes</div>
          <h2 class="s-title" style="font-size:1.4rem">Séances <span>plénières</span></h2>
          <div style="margin-top:24px">
            <div class="agenda-item reveal">
              <div class="agenda-date-box">
                <div class="day">16</div>
                <div class="month">Avr.</div>
              </div>
              <div class="agenda-info">
                <h4>Séance plénière du mercredi 16 avril 2025</h4>
                <p>Examen et adoption de rapports des commissions permanentes. Délibérations sur les questions économiques nationales.</p>
                <div class="a-meta"><span><i class="fas fa-map-marker-alt"></i> Siège du CES, Kinshasa</span></div>
              </div>
            </div>
            <div class="agenda-item reveal">
              <div class="agenda-date-box">
                <div class="day">09</div>
                <div class="month">Avr.</div>
              </div>
              <div class="agenda-info">
                <h4>Séance plénière du 9 avril 2025 — Désignation du Bureau</h4>
                <p>Élection du nouveau Bureau du CES. Discours inaugural du Président nouvellement élu.</p>
                <div class="a-meta"><span><i class="fas fa-map-marker-alt"></i> Siège du CES, Kinshasa</span></div>
              </div>
            </div>
          </div>
        </div>

        <div id="ag-composition" class="tab-panel" data-group="ag" style="display:none;">
          <div class="prose">
            <h3>Catégories de conseillers</h3>
            <p>L'Assemblée Générale du CES regroupe des personnalités issues de différentes catégories socioprofessionnelles, garantissant une représentation équilibrée de la société congolaise.</p>
            <ul>
              <li><strong>Syndicats de travailleurs</strong> — représentants des centrales syndicales reconnues</li>
              <li><strong>Organisations patronales</strong> — FEC et associations d'employeurs</li>
              <li><strong>Professions libérales</strong> — avocats, médecins, ingénieurs, architectes</li>
              <li><strong>Associations de femmes</strong> — organisations féminines nationales</li>
              <li><strong>Associations de jeunes</strong> — mouvements de jeunesse reconnus</li>
              <li><strong>ONG et société civile</strong> — organisations environnementales et humanitaires</li>
              <li><strong>Personnalités désignées</strong> — experts nommés par ordonnance présidentielle</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <aside class="col-lg-4">
        <div class="sidebar-highlight">
          <h4><i class="fas fa-calendar-check"></i> Prochaine plénière</h4>
          <p>Consultez l'agenda pour connaître les dates des prochaines séances plénières du CES.</p>
          <a href="{{ url('agenda') }}">Voir l'agenda</a>
        </div>
        <div class="sidebar-box">
          <h4><i class="fas fa-info-circle"></i> Modalités de fonctionnement</h4>
          <p>Le Conseil se réunit en sessions soit ordinaires ou extraordinaires.</p>
          <ul>
            <li><i class="fas fa-circle-dot"></i> 2 sessions ordinaires par an</li>
            <li><i class="fas fa-circle-dot"></i> Sessions extraordinaires sur convocation</li>
            <li><i class="fas fa-circle-dot"></i> Quorum : majorité absolue des membres</li>
            <li><i class="fas fa-circle-dot"></i> Décisions à la majorité simple</li>
            <li><i class="fas fa-circle-dot"></i> Séances ouvertes au public</li>
          </ul>
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