@extends('layouts.public')

@section('title', 'CES RDC | Conseil Économique et Social')

@section('content')
<!-- ===== HERO SLIDER ===== -->
<section class="carousel" aria-label="Carrousel d'actualités" aria-roledescription="carrousel">
  <div class="carousel__viewport">
    <div class="carousel__track">
      <!-- Slide 1 -->
      <div class="carousel__slide" role="group" aria-roledescription="slide" aria-label="1 sur 3">
        <source srcset="https://www.ces.cd/images/banner/slider2.webp" type="image/webp">
        <img class="carousel__image" src="https://ik.imagekit.io/ces/Slide/slide1.webp" alt="Paysage congolais illustrant la biodiversité" loading="eager" width="1920" height="1080">
        <div class="carousel__overlay"></div>
        <div class="carousel__content">
          <span class="carousel__tag"><i class="fas fa-star" aria-hidden="true"></i> À la une</span>
          <h2 class="carousel__title">Éclairer les politiques publiques par l'expertise citoyenne</h2>
          <p class="carousel__description">Le CES éclaire les politiques publiques par son expertise citoyenne et stratégique sur tous les grands enjeux.</p>
          <div class="carousel__actions">
            <a href="{{ url('actualites') }}" class="carousel__btn carousel__btn--primary">Nos Actualités</a>
            <a href="{{ url('apercu') }}" class="carousel__btn carousel__btn--outline">Découvrir le CES <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <!-- Slide 2 -->
      <div class="carousel__slide" role="group" aria-roledescription="slide" aria-label="2 sur 3">
        <source srcset="https://www.ces.cd/images/banner/slider1.webp" type="image/webp">
        <img class="carousel__image" src="https://ik.imagekit.io/ces/Slide/slide2.webp" alt="Richesses minières de la RDC" loading="lazy" width="1920" height="1080">
        <div class="carousel__overlay"></div>
        <div class="carousel__content">
          <span class="carousel__tag"><i class="fas fa-gem" aria-hidden="true"></i> Notre Engagement</span>
          <h2 class="carousel__title">Bâtir un consensus durable pour le développement de la RDC</h2>
          <p class="carousel__description">Transformer la diversité des opinions en une force d'action pour une croissance inclusive.</p>
          <div class="carousel__actions">
            <a href="{{ url('contact') }}" class="carousel__btn carousel__btn--primary">Nous Contacter</a>
            <a href="{{ url('commissions') }}" class="carousel__btn carousel__btn--outline">Nos Commissions <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="carousel__slide" role="group" aria-roledescription="slide" aria-label="3 sur 3">
        <source srcset="https://www.ces.cd/images/banner/slider3.webp" type="image/webp">
        <img class="carousel__image" src="https://ik.imagekit.io/ces/Slide/Slide3.webp" alt="Forêt équatoriale du Congo" loading="lazy" width="1920" height="1080">
        <div class="carousel__overlay"></div>
        <div class="carousel__content">
          <span class="carousel__tag"><i class="fas fa-leaf" aria-hidden="true"></i> Société</span>
          <h2 class="carousel__title">Transformer l'expertise en solutions pour la Nation</h2>
          <p class="carousel__description">À travers ses avis, le CES traduit les réalités du terrain en recommandations stratégiques pour une gouvernance plus juste et efficace.</p>
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
        <div class="stat-num" style="font-size:2.2rem; font-weight:700; color:var(--blanc);">7</div>
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
      @forelse($actualites as $index => $post)
        <div class="{{ $index == 0 ? 'col-md-6' : 'col-md-3' }}">
          <div class="news-card {{ $index == 0 ? 'featured' : '' }} h-100 position-relative">
            @if(\Carbon\Carbon::parse($post->date_publication)->isToday())
              <span class="badge bg-danger position-absolute top-0 start-0 m-3 z-3 animate-pulse">
                 <i class="fas fa-bolt"></i> AUJOURD'HUI
              </span>
            @endif
            <img src="{{ $post->image_url ?? 'https://via.placeholder.com/600x400?text=CES+RDC' }}" 
                 class="w-100" 
                 style="height:{{ $index == 0 ? '300px' : '220px' }}; object-fit:cover;" 
                 alt="{{ $post->titre }}">
            <div class="news-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-2">
                @if($post->categorie)
                  <span class="news-badge m-0">{{ $post->categorie }}</span>
                @endif
                <small class="text-muted">
                  <i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($post->created_at)->format('H:i') }}
                </small>
              </div>
              <div class="news-date text-primary small fw-semibold">
                <i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($post->date_publication)->translatedFormat('d F Y') }}
              </div>
              <h3 class="{{ $index == 0 ? 'h5' : 'h6' }} fw-semibold mt-2" style="font-family:'Playfair Display'; text-align: justify;">
                {{ $post->titre }}
              </h3>
              @if($index == 0 && $post->resume)
                <p class="small text-muted mb-3" style="text-align: justify;">{{ Str::limit($post->resume, 120) }}</p>
              @endif
              <a href="{{ route('actualites.show', $post->id) }}" class="news-link text-primary fw-semibold">Lire l'article <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <p class="text-muted">Aucune actualité n'est disponible.</p>
        </div>
      @endforelse
    </div>  
  </div>
</section>  

<!-- ===== NOS AVIS ===== -->
<section class="avis-section py-5">
  <div class="container">
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

    <div class="row g-4">
      @forelse($avis as $item)
        <div class="col-md-4">
          <div class="avis-card position-relative p-4 h-100" style="border:1px solid #e8eef6; border-radius:12px; overflow:hidden; transition:all 0.7s ease;">
            <div style="position:absolute; top:0; left:0; width:4px; height:100%; background:linear-gradient(to bottom, var(--bleu), var(--rouge));"></div>
            <div class="avis-icon mb-3" style="width:48px; height:48px; border-radius:10px; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.3rem; color:var(--bleu-fonce);">
              @php
                $icon = 'fa-file-signature'; 
                $comm = strtolower($item->commission);
                if(str_contains($comm, 'économique')) $icon = 'fa-landmark';
                if(str_contains($comm, 'sociale')) $icon = 'fa-users-gears';
                if(str_contains($comm, ' environnement')) $icon = 'fa-leaf';
                if(str_contains($comm, 'ressources')) $icon = 'fa-oil-well';
              @endphp
              <i class="fas {{ $icon }}"></i>
            </div>
            <span class="badge bg-light text-danger text-uppercase mb-2" style="font-size:0.7rem; letter-spacing:0.08em; padding:3px 10px; border-radius:20px;">
                {{ $item->commission }}
            </span>
            <h3 class="h6 fw-semibold" style="font-family:'Playfair Display', serif; line-height:1.5; color:var(--texte);">
              {{ $item->titre }}
            </h3>
            <a href="{{ route('avis.detail', $item->id) }}" class="d-inline-flex align-items-center mt-3 text-primary fw-semibold" style="color:var(--bleu); text-decoration:none; font-size:0.83rem; transition:gap 0.7s ease;">
              Lire l'avis <i class="fas fa-arrow-right ms-2"></i>
            </a>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-4">
          <p class="text-muted">Aucun avis disponible.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

<!-- ===== PUBLICATIONS ===== -->
<section class="publications-section py-5" style="background-color: var(--texte);">
  <div class="container">
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

    <div class="row g-4">
      <div class="col-md-3">
        <div class="pub-card p-4 text-white h-100" style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.12); border-radius:12px; transition:all 0.7s ease; cursor:pointer;">
          <div class="pub-icon fs-1 mb-3" style="color:rgba(247,209,23,0.3);"><i class="fas fa-file-pdf" style="color:var(--jaune);"></i></div>
          <div class="pub-type small text-uppercase fw-bold" style="color:var(--jaune);">Publication</div>
          <h4 class="h6 mt-2"> <a href="https://ik.imagekit.io/ces/documents/Expos%C3%A9%20du%20Pr%C3%A9sident%20National%20de%20F%C3%A9d%C3%A9ration%20des%20Entreprises%20du%20Congo%20et%20Pr%C3%A9sident%20du%20Conseil%20d_Administration%20de%20GECAMINES.pdf?updatedAt=1774195744577" target="blank">Exposé du Président National de la FEC et Président du Conseil d'Administration de GÉCAMINES</a></h4>
        </div>
      </div>
      <div class="col-md-3">
        <div class="pub-card p-4 text-white h-100" style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.12); border-radius:12px; transition:all 0.7s ease; cursor:pointer;">
          <div class="pub-icon fs-1 mb-3" style="color:rgba(247,209,23,0.3);"><i class="fas fa-gavel" style="color:var(--jaune);"></i></div>
          <div class="pub-type small text-uppercase fw-bold" style="color:var(--jaune);">Loi organique</div>
          <h4 class="h6 mt-2"> <a href="https://ik.imagekit.io/ces/documents/LOI%20ORGANIQUE%20n%C2%B0%2013-027%20portant%20organisation%20et%20fonctionnement%20du%20Conseil%20%C3%A9conomique%20et%20social%20(J.O.RDC.,%209%20novembre%202013,%20n%C2%B0%20sp%C3%A9cial,%20col.%201).pdf?updatedAt=1774195742804" target="blank">LOI ORGANIQUE n°13-027 portant organisation et fonctionnement du CES (J.O.RDC., 2013)</a></h4>
        </div>
      </div>
      <div class="col-md-3">
        <div class="pub-card p-4 text-white h-100" style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.12); border-radius:12px; transition:all 0.7s ease; cursor:pointer;">
          <div class="pub-icon fs-1 mb-3" style="color:rgba(247,209,23,0.3);"><i class="fas fa-earth-africa" style="color:var(--jaune);"></i></div>
          <div class="pub-type small text-uppercase fw-bold" style="color:var(--jaune);">Charte</div>
          <h4 class="h6 mt-2"><a href="https://ik.imagekit.io/ces/documents/CHARTE%20DE%20L_UCESA%20POUR%20LA%20DURABILITE%20DU%20DEVELOPPEMENT%20DE%20L_AFRIQUE.pdf?updatedAt=1774195749498" target="blank">Charte de l'UCESA pour la durabilité du développement de l'Afrique</a></h4>
        </div>
      </div>
      <div class="col-md-3">
        <div class="pub-card p-4 text-white h-100" style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.12); border-radius:12px; transition:all 0.7s ease; cursor:pointer;">
          <div class="pub-icon fs-1 mb-3" style="color:rgba(247,209,23,0.3);"><i class="fas fa-users-gear" style="color:var(--jaune);"></i></div>
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
    <div class="d-flex flex-wrap align-items-end justify-content-between mb-5">
      <div>
        <div class="d-flex align-items-center gap-2 mb-2">
          <span style="width:24px; height:2px; background:var(--rouge);"></span>
          <span class="text-uppercase small fw-bold" style="color:var(--rouge); letter-spacing:0.15em;">Gouvernance</span>
        </div>
        <h2 class="section-title" style="font-family:'Playfair Display', serif; font-size:2.2rem; font-weight:700;">Le <span style="color:var(--bleu);">Bureau</span></h2>
      </div>
      <a href="{{ url('bureau') }}" class="btn btn-outline-primary" style="border-color:var(--bleu-fonce); color:var(--bleu-fonce); border-width:2px; padding:8px 20px; font-weight:600;">Voir tous les membres <i class="fas fa-arrow-right ms-2"></i></a>
    </div>

    <div class="row g-3">
      <!-- Président -->
      <div class="col-md col-6">
        <div class="bureau-card bureau-president text-center h-100" style="background:var(--blanc); border-radius:12px; overflow:hidden; box-shadow:var(--ombre); transition:all 0.7s ease;">
          <img src="https://ik.imagekit.io/ces/bureau/Pr_JKK__(1)_1_.webp?updatedAt=1774448219113" class="w-100" style="height:160px; object-fit:cover;" alt="Président Jean Pierre Kiwakana KIMAYALA">
          <div class="bureau-info p-3">
            <div class="role small text-uppercase fw-bold" style="color:var(--rouge);">Président</div>
            <h4 class="h6 fw-semibold mt-1">Jean Pierre Kiwakana KIMAYALA</h4>
          </div>
        </div>
      </div>

      <!-- 1er Vice-Président -->
      <div class="col-md col-6">
        <div class="bureau-card text-center h-100" style="background:var(--blanc); border-radius:12px; overflow:hidden; box-shadow:var(--ombre); transition:all 0.7s ease;">
          <img src="https://ik.imagekit.io/ces/bureau/1VP_LKK_.webp?updatedAt=1774449073714" class="w-100" style="height:160px; object-fit:cover;" alt="1er Vice-Président Léon Kyaboba KASOBWA">
          <div class="bureau-info p-3">
            <div class="role small text-uppercase fw-bold" style="color:var(--rouge);">1er Vice-Président</div>
            <h4 class="h6 fw-semibold mt-1">Léon Kyaboba KASOBWA</h4>
          </div>
        </div>
      </div>

      <!-- 2ème Vice-Président -->
      <div class="col-md col-6">
        <div class="bureau-card text-center h-100" style="background:var(--blanc); border-radius:12px; overflow:hidden; box-shadow:var(--ombre); transition:all 0.7s ease;">
          <img src="https://ik.imagekit.io/ces/bureau/2VP_CTK.webp?updatedAt=1774448924923" class="w-100" style="height:160px; object-fit:cover;" alt="2ème Vice-Président Célestin Tshibwabwa KANYAMA">
          <div class="bureau-info p-3">
            <div class="role small text-uppercase fw-bold" style="color:var(--rouge);">2ème Vice-Président</div>
            <h4 class="h6 fw-semibold mt-1">Célestin Tshibwabwa KANYAMA</h4>
          </div>
        </div>
      </div>

      <!-- Rapporteur -->
      <div class="col-md col-6">
        <div class="bureau-card text-center h-100" style="background:var(--blanc); border-radius:12px; overflow:hidden; box-shadow:var(--ombre); transition:all 0.7s ease;">
          <img src="https://ik.imagekit.io/ces/bureau/Rapp_RNM_.webp?updatedAt=1774448978783" class="w-100" style="height:160px; object-fit:cover;" alt="Rapporteur René Ngongo MATESO">
          <div class="bureau-info p-3">
            <div class="role small text-uppercase fw-bold" style="color:var(--rouge);">Rapporteur</div>
            <h4 class="h6 fw-semibold mt-1">René Ngongo MATESO</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== COMMISSIONS ===== -->
<section class="commissions-section py-5">
  <div class="container">
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
        <a href="{{ url('commissions') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-chart-line"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Commission économique et financière</h4>
        </a>
      </div>

      <!-- Commission 2 -->
      <div class="col-md-3">
        <a href="{{ url('commissions') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-tractor"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Agriculture et développement rural</h4>
        </a>
      </div>

      <!-- Commission 3 -->
      <div class="col-md-3">
        <a href="{{ url('commissions') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-heart-pulse"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Santé, affaires sociales et culturelles</h4>
        </a>
      </div>

      <!-- Commission 4 -->
      <div class="col-md-3">
        <a href="{{ url('commissions') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-scale-balanced"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Relations extérieures, intégrations, questions juridiques et administratives</h4>
        </a>
      </div>

      <!-- Commission 5 -->
      <div class="col-md-3">
        <a href="{{ url('commissions') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-leaf"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Environnement et ressources naturelles</h4>
        </a>
      </div>

      <!-- Commission 6 -->
      <div class="col-md-3">
        <a href="{{ url('commissions') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-road"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Infrastructures et aménagement du territoire</h4>
        </a>
      </div>

      <!-- Commission 7 -->
      <div class="col-md-3">
        <a href="{{ url('commissions') }}" class="commission-card d-block text-center p-4" style="background:var(--blanc); border:1px solid #e5ebf4; border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--blanc)'; this.style.borderColor='#e5ebf4'; this.querySelector('.commission-icon').style.background='var(--bleu-clair)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--texte)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--bleu-clair); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-graduation-cap"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--texte); transition:color 0.7s ease;">Éducation, Formation et Emploi</h4>
        </a>
      </div>

      <!-- Commission 8 (spéciale) -->
      <div class="col-md-3">
        <a href="{{ url('commissions') }}" class="commission-card d-block text-center p-4" style="border:2px dashed var(--bleu); background:var(--bleu-clair); border-radius:12px; transition:all 0.7s ease; text-decoration:none;" onmouseover="this.style.background='var(--bleu-fonce)'; this.style.borderColor='var(--bleu-fonce)'; this.querySelector('.commission-icon').style.background='rgba(255,255,255,0.15)'; this.querySelector('.commission-icon').style.color='var(--jaune)'; this.querySelector('h4').style.color='#fff';" onmouseout="this.style.background='var(--bleu-clair)'; this.style.borderColor='var(--bleu)'; this.querySelector('.commission-icon').style.background='var(--blanc)'; this.querySelector('.commission-icon').style.color='var(--bleu-fonce)'; this.querySelector('h4').style.color='var(--bleu-fonce)';">
          <div class="commission-icon mx-auto mb-3" style="width:64px; height:64px; border-radius:50%; background:var(--blanc); display:flex; align-items:center; justify-content:center; font-size:1.6rem; color:var(--bleu-fonce); transition:all 0.7s ease;"><i class="fas fa-plus"></i></div>
          <h4 class="h6 fw-semibold" style="color:var(--bleu-fonce); transition:color 0.7s ease;">Voir toutes les commissions</h4>
        </a>
      </div>
    </div>
</section>

<!-- ===== AGENDA ===== -->
<section class="agenda-section py-5" style="background: #f8fafc; border-top: 1px solid #edf2f7; border-bottom: 1px solid #edf2f7;">
  <div class="container">
    <div class="d-flex flex-wrap align-items-end justify-content-between mb-5">
      <div>
        <div class="d-flex align-items-center gap-2 mb-2">
          <span style="width:24px; height:2px; background:var(--rouge);"></span>
          <span class="text-uppercase small fw-bold" style="color:var(--rouge); letter-spacing:0.15em;">Prochainement</span>
        </div>
        <h2 class="section-title" style="font-family:'Playfair Display', serif; font-size:2.2rem; font-weight:700;">Notre <span style="color:var(--bleu);">Agenda</span></h2>
      </div>
      <a href="{{ url('agenda') }}" class="btn btn-outline-primary" style="border-color:var(--bleu-fonce); color:var(--bleu-fonce); font-weight:600; border-width:2px; padding:8px 20px;">Tout l'agenda <i class="fas fa-arrow-right ms-2"></i></a>
    </div>

    <div class="row align-items-center g-4">
      <div class="col-lg-8">
        @if($agendas->count() > 0)
          @php $prochain = $agendas->first(); @endphp
          <div class="agenda-card-sober reveal">
            <div class="row g-0">
              <div class="col-md-3 d-flex flex-column align-items-center justify-content-center p-4 text-center" style="background: #f1f5f9; border-right: 1px solid #e2e8f0;">
                <div class="fs-1 fw-light mb-0" style="color: var(--bleu-fonce); line-height: 1;">{{ \Carbon\Carbon::parse($prochain->date)->translatedFormat('d') }}</div>
                <div class="text-uppercase fw-semibold" style="color: var(--bleu-fonce); letter-spacing: 2px; font-size: 0.9rem;">{{ \Carbon\Carbon::parse($prochain->date)->translatedFormat('F') }}</div>
                <div class="mt-2 small text-muted">{{ \Carbon\Carbon::parse($prochain->date)->translatedFormat('Y') }}</div>
              </div>
              <div class="col-md-9 p-4 p-md-5 d-flex flex-column justify-content-center">
                <div class="d-flex align-items-center gap-3 mb-3">
                  <span class="badge" style="background: var(--bleu-clair); color: var(--bleu-fonce); font-weight: 600; padding: 6px 12px; border-radius: 4px;">{{ \Carbon\Carbon::parse($prochain->date)->translatedFormat('H:i') }}</span>
                  <span class="text-muted small"><i class="fas fa-location-dot me-1"></i> Siège du CES, Kinshasa</span>
                </div>
                <h3 class="h4 fw-bold mb-3" style="font-family:'Inter', sans-serif; color: var(--texte); line-height: 1.4;">{{ $prochain->title }}</h3>
                <div class="mt-auto pt-3 border-top" style="border-color: #f1f5f9 !important;">
                  <a href="{{ url('agenda') }}" class="d-inline-flex align-items-center gap-2 text-decoration-none fw-bold" style="color: var(--bleu-fonce);">
                    En savoir plus <i class="fas fa-chevron-right small"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @else
          <div class="text-center py-5 px-4" style="background:var(--blanc); border-radius:16px; border:1px solid #e2e8f0;">
            <div class="mb-3"><i class="far fa-calendar-check" style="font-size: 2.5rem; color: #cbd5e1;"></i></div>
            <h5 class="fw-semibold text-muted">Aucun événement à venir</h5>
            <p class="text-muted small">Revenez bientôt pour consulter les prochaines plénières.</p>
          </div>
        @endif
      </div>
      <div class="col-lg-4">
        <div class="ps-lg-4 py-4" style="border-left: 1px solid #e2e8f0;">
          <p class="mb-0 text-muted" style="font-size: 1.05rem; line-height: 1.6;">Consultez le programme des séances plénières, réunions et événements institutionnels du CES.</p>
        </div>
      </div>
    </div>
  </div>
</section>

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
@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    let current = 0;
    const slides = document.querySelectorAll('.carousel__slide');
    const total = slides.length;
    if (total === 0) return;
    let autoSlide;

    function updateSlider() {
      const track = document.querySelector('.carousel__track');
      if (track) {
        track.style.transform = `translateX(-${current * 100}%)`;
        document.querySelectorAll('.carousel__dot').forEach((d, i) => {
          d.classList.toggle('carousel__dot--active', i === current);
        });
      }
    }

    function changeSlide(dir) { current = (current + dir + total) % total; updateSlider(); resetAuto(); }
    function goToSlide(n) { current = n; updateSlider(); resetAuto(); }
    function resetAuto() { clearInterval(autoSlide); autoSlide = setInterval(() => changeSlide(1), 5500); }

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
  });
</script>
@endsection