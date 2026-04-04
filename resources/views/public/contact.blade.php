@extends('layouts.public')

@section('title', 'Contactez le CES | Conseil Économique et Social - RDC')

@section('content')
<!-- HERO DE PAGE -->
<div class="page-hero">
  <div class="hero-inner">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Accueil</a><i class="fas fa-chevron-right"></i><span>Contact</span>
    </div>
    <div class="hero-tag"><i class="fas fa-envelope"></i> Nous écrire</div>
    <h1><em>Contactez</em> le CES</h1>
    <p>Retrouvez toutes les coordonnées du Conseil Économique et Social et adressez-nous vos demandes via le formulaire ci-dessous.</p>
  </div>
</div>

<!-- CONTENU PRINCIPAL AVEC BOOTSTRAP -->
<div class="content-wrap">
  <div class="container py-5">
    <div class="row g-5">
      <!-- Colonne principale : formulaire -->
      <div class="col-lg-8">
        <div class="s-tag">Formulaire de contact</div>
        <h2 class="s-title">Envoyez-nous un <span>message</span></h2>
        <form class="mt-4 shadow-sm p-4 border rounded bg-white" onsubmit="return false">
          <!-- Deux champs côte à côte -->
          <div class="row g-3">
            <div class="col-md-6 mb-3">
              <label class="form-label small fw-bold">Nom complet <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="Votre nom et prénom">
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label small fw-bold">Adresse email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" placeholder="votre@email.com">
            </div>
          </div>
          <!-- Organisation -->
          <div class="mb-3">
            <label class="form-label small fw-bold">Organisation / Institution</label>
            <input type="text" class="form-control" placeholder="Nom de votre organisation">
          </div>
          <!-- Objet -->
          <div class="mb-3">
            <label class="form-label small fw-bold">Objet du message <span class="text-danger">*</span></label>
            <select class="form-select">
              <option value="">-- Sélectionnez un objet --</option>
              <option>Demande d'information générale</option>
              <option>Saisine officielle du CES</option>
              <option>Demande de document / publication</option>
              <option>Accréditation presse</option>
              <option>Partenariat institutionnel</option>
              <option>Autre</option>
            </select>
          </div>
          <!-- Message -->
          <div class="mb-3">
            <label class="form-label small fw-bold">Votre message <span class="text-danger">*</span></label>
            <textarea class="form-control" placeholder="Rédigez votre message ici..." rows="5"></textarea>
          </div>
          <!-- Case à cocher RGPD -->
          <div class="mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="rgpd">
            <label class="form-check-label small text-muted" for="rgpd">J'accepte que mes données soient traitées conformément à la politique de confidentialité du CES.</label>
          </div>
          <!-- Bouton -->
          <button type="submit" class="btn btn-primary px-4 py-2"><i class="fas fa-paper-plane me-2"></i> Envoyer le message</button>
        </form>
      </div>

      <!-- Sidebar droite -->
      <aside class="col-lg-4">
        <div class="info-card reveal mb-4 p-4 border rounded bg-white shadow-sm">
          <h5 class="mb-3"><span class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width:32px;height:32px"><i class="fas fa-map-marker-alt small"></i></span> Adresse</h5>
          <address class="small text-muted mb-0">
            161, Avenue Lupungu, Immeuble BOBO<br>
            Kinshasa / Gombe — RDC
          </address>
        </div>
        <div class="info-card reveal mb-4 p-4 border rounded bg-white shadow-sm">
          <h5 class="mb-3"><span class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width:32px;height:32px"><i class="fas fa-phone small"></i></span> Coordonnées</h5>
          <ul class="list-unstyled small text-muted mb-0">
            <li class="mb-2"><i class="fas fa-envelope me-2 text-primary"></i> <a href="mailto:infos@ces.cd" class="text-decoration-none">infos@ces.cd</a></li>
            <li><i class="fas fa-globe me-2 text-primary"></i> <a href="https://www.ces.cd" target="_blank" class="text-decoration-none">www.ces.cd</a></li>
          </ul>
        </div>
        <div class="info-card reveal p-4 border rounded bg-white shadow-sm">
          <h5 class="mb-3"><span class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width:32px;height:32px"><i class="fas fa-share-nodes small"></i></span> Réseaux sociaux</h5>
          <ul class="list-unstyled small mb-0">
            <li class="mb-2"><i class="fab fa-facebook text-primary me-2"></i> <a href="https://www.facebook.com/share/184aGHRW8M/" target="_blank" class="text-decoration-none text-muted">CES-RDC Officiel</a></li>
            <li class="mb-2"><i class="fab fa-x-twitter text-dark me-2"></i> <a href="https://x.com/ConseilEco_RDC" target="_blank" class="text-decoration-none text-muted">@ConseilEco_RDC</a></li>
            <li><i class="fab fa-youtube text-danger me-2"></i> <a href="https://www.youtube.com/@cesdrc" target="_blank" class="text-decoration-none text-muted">Youtube CES DRC</a></li>
          </ul>
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