@extends('layouts.public')

@section('title', 'Le Bureau | Conseil Économique et Social - RDC')

@section('content')
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
  <div class="container py-5">
    <div class="s-tag">Membres élus</div>
    <h2 class="s-title">Composition du <span>Bureau</span></h2>
    <p class="prose mb-5" style="max-width:680px;">Le Bureau est l'organe moteur, permanent et décisionnel du CES. Il assure la gestion courante de l'institution et statue par voie de décision. Il comprend sept membres élus par l'Assemblée Générale pour la durée de la mandature.</p>

    <!-- Grille des membres -->
    <div class="row g-4 mb-5">
      <!-- Président -->
      <div class="col-lg-3 col-md-6 text-center">
        <div class="membre-card reveal border-top border-4 border-warning bg-white p-3 rounded shadow-sm h-100">
          <img src="https://ik.imagekit.io/ces/bureau/Pr_JKK__(1)_1_.webp?updatedAt=1774448219113" alt="Président" class="img-fluid rounded mb-3" style="height:200px; object-fit:cover;" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph bg-light rounded d-none justify-content-center align-items-center mb-3" style="height:200px;"><i class="fas fa-user-tie fa-4x text-muted"></i></div>
          <div class="mc-body">
            <div class="small text-primary text-uppercase fw-bold mb-1">Président</div>
            <div class="h6 fw-bold">Jean Pierre Kiwakana KIMAYALA</div>
          </div>
        </div>
      </div>
      <!-- 1er VP -->
      <div class="col-lg-3 col-md-6 text-center">
        <div class="membre-card reveal bg-white p-3 rounded shadow-sm h-100">
          <img src="https://ik.imagekit.io/ces/bureau/1VP_LKK_.webp?updatedAt=1774449073714" alt="1er VP" class="img-fluid rounded mb-3" style="height:200px; object-fit:cover;" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph bg-light rounded d-none justify-content-center align-items-center mb-3" style="height:200px;"><i class="fas fa-user-tie fa-4x text-muted"></i></div>
          <div class="mc-body">
            <div class="small text-primary text-uppercase fw-bold mb-1">1er Vice-Président</div>
            <div class="h6 fw-bold">Léon Kyaboba KASOBWA</div>
          </div>
        </div>
      </div>
      <!-- 2ème VP -->
      <div class="col-lg-3 col-md-6 text-center">
        <div class="membre-card reveal bg-white p-3 rounded shadow-sm h-100">
          <img src="https://ik.imagekit.io/ces/bureau/2VP_CTK.webp?updatedAt=1774448924923" alt="2e VP" class="img-fluid rounded mb-3" style="height:200px; object-fit:cover;" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph bg-light rounded d-none justify-content-center align-items-center mb-3" style="height:200px;"><i class="fas fa-user-tie fa-4x text-muted"></i></div>
          <div class="mc-body">
            <div class="small text-primary text-uppercase fw-bold mb-1">2ème Vice-Président</div>
            <div class="h6 fw-bold">Célestin Tshibwabwa KANYAMA</div>
          </div>
        </div>
      </div>
      <!-- Rapporteur -->
      <div class="col-lg-3 col-md-6 text-center">
        <div class="membre-card reveal bg-white p-3 rounded shadow-sm h-100">
          <img src="https://ik.imagekit.io/ces/bureau/Rapp_RNM_.webp?updatedAt=1774448978783" alt="Rapporteur" class="img-fluid rounded mb-3" style="height:200px; object-fit:cover;" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph bg-light rounded d-none justify-content-center align-items-center mb-3" style="height:200px;"><i class="fas fa-user-tie fa-4x text-muted"></i></div>
          <div class="mc-body">
            <div class="small text-primary text-uppercase fw-bold mb-1">Rapporteur</div>
            <div class="h6 fw-bold">René Ngongo MATESO</div>
          </div>
        </div>
      </div>
      <!-- Rapporteur Adjoint -->
      <div class="col-lg-4 col-md-6 text-center">
        <div class="membre-card reveal bg-white p-3 rounded shadow-sm h-100">
          <img src="https://ik.imagekit.io/ces/bureau/Rapp_Adj%20SMT_.webp?updatedAt=1774448958778" alt="Rapp. Adj." class="img-fluid rounded mb-3" style="height:200px; object-fit:cover;" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph bg-light rounded d-none justify-content-center align-items-center mb-3" style="height:200px;"><i class="fas fa-user-tie fa-4x text-muted"></i></div>
          <div class="mc-body">
            <div class="small text-primary text-uppercase fw-bold mb-1">Rapporteur Adjoint</div>
            <div class="h6 fw-bold">Sylvie Mbakata THULA</div>
          </div>
        </div>
      </div>
      <!-- Questeur -->
      <div class="col-lg-4 col-md-6 text-center">
        <div class="membre-card reveal bg-white p-3 rounded shadow-sm h-100">
          <img src="https://ik.imagekit.io/ces/bureau/Quest_AMK.webp?updatedAt=1774449132444" alt="Questeur" class="img-fluid rounded mb-3" style="height:200px; object-fit:cover;" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph bg-light rounded d-none justify-content-center align-items-center mb-3" style="height:200px;"><i class="fas fa-user-tie fa-4x text-muted"></i></div>
          <div class="mc-body">
            <div class="small text-primary text-uppercase fw-bold mb-1">Questeur</div>
            <div class="h6 fw-bold">Astrid Martins Elias KABENGELE</div>
          </div>
        </div>
      </div>
      <!-- Questeur Adjoint -->
      <div class="col-lg-4 col-md-6 text-center">
        <div class="membre-card reveal bg-white p-3 rounded shadow-sm h-100">
          <img src="https://ik.imagekit.io/ces/bureau/Quest_Adj_BM_.webp?updatedAt=1774449118409" alt="Questeur Adj." class="img-fluid rounded mb-3" style="height:200px; object-fit:cover;" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
          <div class="membre-photo-ph bg-light rounded d-none justify-content-center align-items-center mb-3" style="height:200px;"><i class="fas fa-user-tie fa-4x text-muted"></i></div>
          <div class="mc-body">
            <div class="small text-primary text-uppercase fw-bold mb-1">Questeur Adjoint</div>
            <div class="h6 fw-bold">Béatrice Mpulu YEMBELA</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Section Attributions -->
    <div class="p-5" style="background:var(--gris-clair); border-radius:16px;">
      <div class="s-tag">Attributions</div>
      <h2 class="s-title" style="font-size:1.4rem;">Rôle du <span>Bureau</span></h2>
      <div class="prose row mt-4">
        <div class="col-md-6">
          <ul class="small">
            <li class="mb-2">Veiller au bon fonctionnement du Conseil</li>
            <li class="mb-2">Assurer la gestion quotidienne du Conseil et de son patrimoine</li>
            <li class="mb-2">Elaborer le programme de travail du Conseil</li>
            <li class="mb-2">Préparer et assurer l'exécution du budget du Conseil</li>
          </ul>
        </div>
        <div class="col-md-6">
          <ul class="small">
            <li class="mb-2">Organiser et assurer le suivi des échanges inter-conseils</li>
            <li class="mb-2">Déterminer l'organisation des services administratifs</li>
            <li class="mb-2">Examiner les demandes d'Avis et d'études déposées par les institutions</li>
            <li class="mb-2">Statuer de la recevabilité des pétitions</li>
          </ul>
        </div>
      </div>
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