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
      Organisation <i class="fas fa-chevron-right"></i><span>Le Président</span>
    </div>
    <div class="hero-tag"><i class="fas fa-user-tie"></i> Gouvernance</div>
    <h1>Le <em>Président</em> du CES</h1>
    <p>Présentation et allocutions du Président du Conseil Économique et Social de la République Démocratique du Congo.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="container">
    <div class="row g-5">
      <!-- Colonne principale -->
      <div class="col-lg-8">
        <!-- Bloc image + texte -->
        <div class="d-flex flex-wrap gap-4 align-items-start mb-4 president-bio">
          <img src="https://res.cloudinary.com/dkjqzohc7/image/upload/v1745910754/conseillers/bwmb6mbelrka45j23tlz.png"
               alt="Président Jean Pierre Kiwakana KIMAYALA"
               style="width:220px; height:260px; object-fit:cover; border-radius:16px; box-shadow:var(--ombre); border:4px solid var(--jaune);"
               onerror="this.outerHTML='<div style=width:220px;height:260px;border-radius:16px;background:var(--bleu-clair);display:flex;align-items:center;justify-content:center;font-size:4rem;color:var(--bleu)><i class=fas fa-user-tie></i></div>'">
          <div style="flex:1; min-width:220px;">
            <div class="s-tag">Président du CES</div>
            <h2 class="s-title">Jean Pierre KIWAKANA <span>KIMAYALA</span></h2>
            <div class="prose">
              <p>Élu Président du Conseil Économique et Social lors de la séance plénière du 9 avril 2025, Jean Pierre Kiwakana KIMAYALA est une personnalité reconnue pour son expertise en matière économique et sociale.</p>
              <p>Il préside l'ensemble des travaux du CES, dirige les séances plénières et représente l'institution dans toutes les instances nationales et internationales.</p>
            </div>
            <div class="d-flex gap-2 flex-wrap mt-3">
              <span class="badge badge-bleu"><i class="fas fa-star"></i> Président du CES</span>
              <span class="badge badge-jaune"><i class="fas fa-calendar"></i> Depuis avril 2025</span>
            </div>
          </div>
        </div>

        <!-- Onglets -->
        <div class="tabs">
          <button class="tab-btn active" data-group="pres" data-target="pres-bio">Biographie</button>
          <button class="tab-btn" data-group="pres" data-target="pres-alloc">Allocutions</button>
          <button class="tab-btn" data-group="pres" data-target="pres-role">Rôle & Missions</button>
        </div>

        <!-- Panneau Biographie -->
        <div id="pres-bio" class="tab-panel active" data-group="pres">
          <div class="prose">
            <p>Né en 1943 à Ngandu dans la Province du Kongo Central (RDC), Monsieur Jean Pierre KIWAKANA KIMAYALA est diplômé en Sciences Economiques de l'Université d'Etat d'Anvers (UEA) en Belgique. 
              Il intègre le CES en 2015, d'abord en tant que premier vice- président, avant de devenir président du Conseil économique et Social en mai 2017. 
              Son brillant parcours professionnel dans les secteurs privé et public est un atout majeur dans la bonne conduite du CES. De 1976 à ce jour, il dirige le groupe SESOMO services, société leader dans l'externalisation des ressources humaines, dont il est l'actionnaire principal. 
              Ancien conseiller économique à la présidence de la République (ex-zaire) en 1968, Jean Pierre Kiwakana Kimayala à aussi été Commissaire adjoint de la Foire internationale de Kinshasa (Fikin), ainsi que président des conseils d'administration en RDC de la Banque panafricain ECOBANK et de la Société de télécommunications Airtel depuis 2013.
              Economiste chevronné, il a également occupé le poste de premier vice-président de la Féderation des Entreprises du Congo (FEC) bons et loyaux services rendus à la nation Congolaise, à travers son engagement au sein de la Fédération depuis sa création en 1972, où ses actions ont eu un rendement productif pour l'économie national. 
              Il a été décoré en juillet 2022 de la médaille d'or pour les anciens dirigeants de la FEC à l'organisation patronale congolaise.
            </p>
            <p>Son élection à la présidence du CES marque une nouvelle étape dans la modernisation de l'institution et le renforcement de son rôle consultatif auprès des pouvoirs publics.</p>
            <h3>Parcours professionnel</h3>
            <ul>
              <li>1968 : Conseiller économique au Bureau du Président de la République.</li>
              <li>1969 à 1976 : Membre du Directoire chargé de concevoir les structures et Commissaire Général Adjoint de la Foire Internationale de Kinshasa (FIKIN).</li>
              <li>1976 à ce jour : Administrateur de sociétés, Président Directeur Général du Groupe SESOMO et Président de MOBITEL.</li>
              <li>De 2008 à 2016 : Président de la Banque Panafricaine en RDC (ECOBANK RDC).</li>
              <li>De 2010 à 2015 : Administrateur à la CNSS.</li>
              <li>De 2013 à ce jour : Président du Conseil d'Administration d'AIRTEL RDC.</li>
              <li>De 2015 à ce jour : Premier Vice-Président, ensuite Président du Conseil Economique et Social de ma RDC.</li>
            </ul>
            <h3>Associations professionnelles</h3>
            <ul>
              <li>1981 à ce jour, Fédération des Entreprises du Congo (FEC) : Membre du Comité de Direction, Président de la Commission Economique et Sociale, président de la Commission d’Arbitrage, Premier Vice-Président National de la FEC, Premier Vice-Président National en charge des investissements et Infrastructures.</li>
              <li>1987 à 2005, Chambre de Commerce et d’Industrie Franco-Congolaise (CCIFC) : Vice-Président (1987-1996), Président de la chambre (1996-2005).</li>
            </ul>
            <h3>Distinctions honorifiques</h3>
            <ul>
              <li>Chevalier de l’Ordre National du Léopard (R.D.Congo)</li>
              <li>Citoyen d’honneur de la ville de Lima (Rép. du Pérou)</li>
              <li>Commandeur de l’Ordre du Mérite civil (Royaume d’Espagne)</li>
              <li>Ordre National du Mérite (France)</li>
              <li>Médaille d'or pour les anciens dirigeants de la FEC</li>
            </ul>
          </div>
        </div>

        <!-- Panneau Allocutions -->
       <div id="pres-alloc" class="tab-panel" data-group="pres">
    @forelse($allocutions as $alloc)
        <div class="doc-card reveal">
            <div class="doc-icon"><i class="fas fa-microphone"></i></div>
            <div class="doc-meta">
                <span class="doc-tag">Allocution</span>
                <h4>{{ $alloc->titre }}</h4>
                <div class="doc-date">
                    <i class="fas fa-calendar"></i> 
                    {{ \Carbon\Carbon::parse($alloc->date_allocution)->translatedFormat('d F Y') }}
                </div>
                
                @if($alloc->document_url)
                    <a href="{{ $alloc->document_url }}" target="_blank" class="doc-link">
                        <i class="fas fa-file-pdf"></i> Télécharger le discours (PDF)
                    </a>
                @else
                    <span class="text-muted small italic">Document bientôt disponible</span>
                @endif
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <i class="fas fa-comment-slash fa-3x mb-3 text-muted"></i>
            <p class="text-muted">Aucune allocution publiée pour le moment.</p>
        </div>
    @endforelse
</div>

        <!-- Panneau Rôle & Missions -->
        <div id="pres-role" class="tab-panel" data-group="pres">
          <div class="prose">
            <h3>Attributions du Président</h3>
            <ul>
              <li>Présider les séances plénières et les réunions du Bureau</li>
              <li>Représenter le CES dans les instances nationales et internationales</li>
              <li>Signer les avis et recommandations adoptés par l'Assemblée</li>
              <li>Assurer la liaison avec le Président de la République, le Parlement et le Gouvernement</li>
              <li>Veiller au bon fonctionnement administratif de l'institution</li>
              <li>Convoquer et fixer l'ordre du jour des sessions extraordinaires</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Sidebar droite -->
      <aside class="col-lg-4">
        <div class="sidebar-box">
          <h4><i class="fas fa-users"></i> Le Bureau complet</h4>
          <ul>
            <li><i class="fas fa-star"></i> J.P. Kiwakana — Président</li>
            <li><i class="fas fa-circle-half-stroke"></i> L. Kyaboba — 1er VP</li>
            <li><i class="fas fa-circle-half-stroke"></i> C. Tshibwabwa — 2ème VP</li>
            <li><i class="fas fa-pen"></i> R. Ngongo — Rapporteur</li>
            <li><i class="fas fa-pen"></i> S. Mbakata — Rapp. Adj.</li>
            <li><i class="fas fa-coins"></i> A. Kabengele — Questeur</li>
            <li><i class="fas fa-coins"></i> B. Mpulu — Questeur Adj.</li>
          </ul>
        </div>
        <div class="sidebar-highlight">
          <h4><i class="fas fa-envelope"></i> Contact protocole</h4>
          <p>Pour toute correspondance officielle adressée au Président du CES.</p>
          <a href="{{ url('contact') }}">Nous écrire</a>
        </div>
        <div class="sidebar-box">
          <h4><i class="fas fa-link"></i> Pages liées</h4>
          <ul>
            <li><i class="fas fa-arrow-right"></i> <a href="{{ url('bureau') }}">Le Bureau</a></li>
            <li><i class="fas fa-arrow-right"></i> <a href="{{ url('assemblee') }}">Assemblée Générale</a></li>
            <li><i class="fas fa-arrow-right"></i> <a href="{{ url('fonctionnement') }}">Fonctionnement</a></li>
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