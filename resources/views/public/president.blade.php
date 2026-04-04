@extends('layouts.public')

@section('title', 'Le Président | Conseil Économique et Social RDC')

@section('content')
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
  <div class="container py-5">
    <div class="row g-5">
      <!-- Colonne principale -->
      <div class="col-lg-8">
        <!-- Bloc image + texte -->
        <div class="row g-4 mb-5 align-items-start">
          <div class="col-md-4">
            <img src="https://res.cloudinary.com/dkjqzohc7/image/upload/v1745910754/conseillers/bwmb6mbelrka45j23tlz.png"
                 alt="Président Jean Pierre Kiwakana KIMAYALA"
                 class="img-fluid rounded shadow-lg border border-4 border-warning"
                 style="height:320px; object-fit:cover;"
                 onerror="this.outerHTML='<div class=\"bg-light rounded d-flex align-items-center justify-content-center\" style=\"height:320px;\"><i class=\"fas fa-user-tie fa-5x text-muted\"></i></div>'">
          </div>
          <div class="col-md-8">
            <div class="s-tag mb-2">Président du CES</div>
            <h2 class="s-title h3">Jean Pierre KIWAKANA <span>KIMAYALA</span></h2>
            <div class="prose small">
              <p>Élu Président du Conseil Économique et Social lors de la séance plénière du 9 avril 2025, Jean Pierre Kiwakana KIMAYALA est une personnalité reconnue pour son expertise en matière économique et sociale.</p>
              <p>Il préside l'ensemble des travaux du CES, dirige les séances plénières et représente l'institution dans toutes les instances nationales et internationales.</p>
            </div>
            <div class="d-flex gap-2 flex-wrap mt-3">
              <span class="badge bg-primary px-3 py-2"><i class="fas fa-star me-1"></i> Président du CES</span>
              <span class="badge bg-warning text-dark px-3 py-2"><i class="fas fa-calendar me-1"></i> Depuis avril 2025</span>
            </div>
          </div>
        </div>

        <!-- Onglets -->
        <div class="nav nav-pills mb-4 border-bottom pb-3" id="pres-tabs" role="tablist">
          <button class="nav-link active me-2" id="bio-tab" data-bs-toggle="pill" data-bs-target="#pres-bio" type="button" role="tab">Biographie</button>
          <button class="nav-link me-2" id="alloc-tab" data-bs-toggle="pill" data-bs-target="#pres-alloc" type="button" role="tab">Allocutions</button>
          <button class="nav-link" id="role-tab" data-bs-toggle="pill" data-bs-target="#pres-role" type="button" role="tab">Rôle & Missions</button>
        </div>

        <div class="tab-content" id="pres-tabsContent">
          <!-- Panneau Biographie -->
          <div class="tab-pane fade show active" id="pres-bio" role="tabpanel">
            <div class="prose small">
              <p>Né en 1943 au Kongo Central, Monsieur Jean Pierre KIWAKANA KIMAYALA est diplômé en Sciences Économiques. Il intègre le CES en 2015, avant d'en devenir le président en mai 2017. Son parcours dans les secteurs public et privé est un atout majeur.</p>
              <h5 class="mt-4 border-bottom pb-2">Parcours professionnel</h5>
              <ul class="list-unstyled">
                <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> <strong>1976 - Présent :</strong> PDG du Groupe SESOMO</li>
                <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> <strong>2013 - Présent :</strong> PCA de AIRTEL RDC</li>
                <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> <strong>2008 - 2016 :</strong> Président de ECOBANK RDC</li>
                <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> <strong>1968 :</strong> Conseiller économique à la Présidence</li>
              </ul>
              <h5 class="mt-4 border-bottom pb-2">Distinctions</h5>
              <ul class="list-unstyled">
                <li class="mb-2"><i class="fas fa-medal text-warning me-2"></i> Chevalier de l’Ordre National du Léopard</li>
                <li class="mb-2"><i class="fas fa-medal text-warning me-2"></i> Commandeur de l’Ordre du Mérite civil (Espagne)</li>
                <li class="mb-2"><i class="fas fa-medal text-warning me-2"></i> Ordre National du Mérite (France)</li>
              </ul>
            </div>
          </div>

          <!-- Panneau Allocutions -->
          <div class="tab-pane fade" id="pres-alloc" role="tabpanel">
            @forelse($allocutions as $alloc)
              <div class="doc-card reveal border rounded p-3 mb-3 bg-white shadow-sm d-flex align-items-center gap-3">
                <div class="doc-icon h3 text-danger mb-0"><i class="fas fa-microphone"></i></div>
                <div class="doc-meta flex-grow-1">
                  <h6 class="mb-1">{{ $alloc->titre }}</h6>
                  <div class="small text-muted mb-2">
                    <i class="fas fa-calendar me-1"></i> 
                    {{ \Carbon\Carbon::parse($alloc->date_allocution)->translatedFormat('d F Y') }}
                  </div>
                  @if($alloc->document_url)
                    <a href="{{ $alloc->document_url }}" target="_blank" class="btn btn-sm btn-outline-danger">
                      <i class="fas fa-file-pdf me-1"></i> Télécharger (PDF)
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
          <div class="tab-pane fade" id="pres-role" role="tabpanel">
            <div class="prose small">
              <h5 class="border-bottom pb-2">Attributions du Président</h5>
              <ul class="list-unstyled">
                <li class="mb-3 d-flex align-items-start"><i class="fas fa-arrow-right text-primary me-2 mt-1"></i> <span>Présider les séances plénières et les réunions du Bureau.</span></li>
                <li class="mb-3 d-flex align-items-start"><i class="fas fa-arrow-right text-primary me-2 mt-1"></i> <span>Représenter le CES dans les instances nationales et internationales.</span></li>
                <li class="mb-3 d-flex align-items-start"><i class="fas fa-arrow-right text-primary me-2 mt-1"></i> <span>Signer les avis et recommandations adoptés par l'Assemblée.</span></li>
                <li class="mb-3 d-flex align-items-start"><i class="fas fa-arrow-right text-primary me-2 mt-1"></i> <span>Veiller au bon fonctionnement administratif de l'institution.</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar droite -->
      <aside class="col-lg-4">
        <div class="sidebar-box mb-4 p-4 border rounded bg-white shadow-sm">
          <h5 class="mb-3"><i class="fas fa-users me-2 text-primary"></i> Le Bureau</h5>
          <ul class="list-unstyled small">
            <li class="mb-2 d-flex justify-content-between"><span>J.P. Kiwakana</span> <span class="badge bg-primary">Président</span></li>
            <li class="mb-2 d-flex justify-content-between"><span>L. Kyaboba</span> <span class="badge bg-secondary">1er VP</span></li>
            <li class="mb-2 d-flex justify-content-between"><span>C. Tshibwabwa</span> <span class="badge bg-secondary">2ème VP</span></li>
            <li class="mb-2 d-flex justify-content-between"><span>R. Ngongo</span> <span class="badge bg-info">Rapporteur</span></li>
          </ul>
          <a href="{{ url('bureau') }}" class="btn btn-sm btn-link ps-0 mt-2">Détails du Bureau <i class="fas fa-chevron-right ms-1"></i></a>
        </div>
        
        <div class="sidebar-highlight p-4 rounded text-white bg-dark mb-4">
          <h5><i class="fas fa-envelope me-2"></i> Protocole</h5>
          <p class="small">Pour toute correspondance officielle adressée au Président du CES.</p>
          <a href="{{ url('contact') }}" class="btn btn-sm btn-outline-light">Nous écrire</a>
        </div>
      </aside>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.style.opacity = '1';
          e.target.style.transform = 'translateY(0)';
        }
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      observer.observe(el);
    });
  });
</script>
@endsection