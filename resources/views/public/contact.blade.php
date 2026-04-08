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
  <div class="container">
    <div class="row g-5">
      <!-- Colonne principale : formulaire -->
      <div class="col-lg-8">
        <div class="s-tag">Formulaire de contact</div>
        <h2 class="s-title">Envoyez-nous un <span>message</span></h2>
        <form class="mt-4" onsubmit="return false">
          <!-- Deux champs côte à côte -->
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nom complet <span style="color:var(--rouge)">*</span></label>
                <input type="text" class="form-control" placeholder="Votre nom et prénom" style="border:1.5px solid #d8e4f0; border-radius:8px;">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Adresse email <span style="color:var(--rouge)">*</span></label>
                <input type="email" class="form-control" placeholder="votre@email.com" style="border:1.5px solid #d8e4f0; border-radius:8px;">
              </div>
            </div>
          </div>
          <!-- Organisation -->
          <div class="form-group">
            <label>Organisation / Institution</label>
            <input type="text" class="form-control" placeholder="Nom de votre organisation" style="border:1.5px solid #d8e4f0; border-radius:8px;">
          </div>
          <!-- Objet -->
          <div class="form-group">
            <label>Objet du message <span style="color:var(--rouge)">*</span></label>
            <select class="form-select" style="border:1.5px solid #d8e4f0; border-radius:8px;">
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
          <div class="form-group">
            <label>Votre message <span style="color:var(--rouge)">*</span></label>
            <textarea class="form-control" placeholder="Rédigez votre message ici..." rows="5" style="border:1.5px solid #d8e4f0; border-radius:8px;"></textarea>
          </div>
          <!-- Case à cocher RGPD -->
          <div class="form-group d-flex align-items-center gap-2">
            <input type="checkbox" id="rgpd" style="width:auto; padding:0;">
            <label for="rgpd" style="margin-bottom:0; font-weight:400; font-size:.84rem; cursor:pointer;">J'accepte que mes données soient traitées conformément à la politique de confidentialité du CES.</label>
          </div>
          <!-- Bouton -->
          <button type="submit" class="btn-primary"><i class="fas fa-paper-plane"></i> Envoyer le message</button>
        </form>
      </div>

      <!-- Sidebar droite -->
      <aside class="col-lg-4">
        <div class="info-card reveal">
          <h3><i class="fas fa-map-marker-alt" style="background:var(--bleu-fonce)"></i> Adresse</h3>
          <ul><li><i class="fas fa-building"></i> 161, Avenue Lupungu, Immeuble BOBO<br>Kinshasa / Gombe — RDC</li></ul>
        </div>
        <div class="info-card reveal">
          <h3><i class="fas fa-phone" style="background:var(--bleu-fonce)"></i> Coordonnées</h3>
          <ul>
            <li><i class="fas fa-envelope"></i> infos@ces.cd</li>
            <li><i class="fas fa-globe"></i> www.ces.cd</li>
          </ul>
        </div>
        <div class="info-card reveal">
          <h3><i class="fas fa-share-nodes" style="background:var(--bleu-fonce)"></i> Réseaux sociaux</h3>
          <ul>
            <li><i class="fab fa-facebook" style="color:#1877F2"></i> <a href="https://www.facebook.com/share/184aGHRW8M/" target="_blank" style="color:var(--bleu)">Conseil Economique et Social/CES-RDC</a></li>
            <li><i class="fab fa-x-twitter" style="color:#222"></i> <a href="https://x.com/ConseilEco_RDC" target="_blank" style="color:var(--bleu)">@ConseilEco_RDC</a></li>
            <li><i class="fab fa-youtube" style="color:#FF0000"></i> <a href="https://www.youtube.com/@cesdrc" target="_blank" style="color:var(--bleu)">youtube.com/@cesdrc</a></li>
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