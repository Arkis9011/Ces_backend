<!-- ===== RÉSEAUX SOCIAUX ===== -->
<div class="social-band py-4 bg-white border-top border-bottom">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center gap-3">
      <span class="fw-semibold text-secondary">Suivez-nous :</span>
      <a href="https://www.facebook.com/share/184aGHRW8M/" class="social-btn btn d-flex align-items-center gap-2" style="background:#1877F2; color:#fff; border:none; padding:10px 18px; border-radius:8px; font-size:0.85rem; font-weight:600; transition:all 0.7s ease;" onmouseover="this.style.opacity='0.88'; this.style.transform='translateY(-2px)';" onmouseout="this.style.opacity='1'; this.style.transform='translateY(0)';"><i class="fab fa-facebook-f"></i> Conseil Économique et Social/CES-RDC</a>
      <a href="https://x.com/ConseilEco_RDC" class="social-btn btn d-flex align-items-center gap-2" style="background:#1DA1F2; color:#fff; border:none; padding:10px 18px; border-radius:8px; font-size:0.85rem; font-weight:600; transition:all 0.7s ease;" onmouseover="this.style.opacity='0.88'; this.style.transform='translateY(-2px)';" onmouseout="this.style.opacity='1'; this.style.transform='translateY(0)';"><i class="fab fa-x-twitter"></i> @ConseilEco_RDC</a>
      <a href="https://www.youtube.com/@cesdrc" class="social-btn btn d-flex align-items-center gap-2" style="background:#FF0000; color:#fff; border:none; padding:10px 18px; border-radius:8px; font-size:0.85rem; font-weight:600; transition:all 0.7s ease;" onmouseover="this.style.opacity='0.88'; this.style.transform='translateY(-2px)';" onmouseout="this.style.opacity='1'; this.style.transform='translateY(0)';"><i class="fab fa-youtube"></i> YouTube</a>
    </div>
  </div>
</div>

<!-- ===== NEWSLETTER ===== -->
<!--<section class="newsletter-section py-5" style="background: var(--gris-clair);">-->
<!--  <div class="container">-->
<!--    <div class="text-center" style="max-width:680px; margin:auto; color: var(--texte);">-->
<!--      <h2 class="h1" style="font-family:'Playfair Display'; font-weight: 700;">Lettre d'information</h2>-->
<!--      <p class="mb-4 opacity-75">Recevez directement sur votre adresse email les dernières informations et actualités sur l'institution.</p>-->
<!--      <div class="d-flex flex-column flex-sm-row gap-3">-->
<!--        <input type="email" class="form-control" placeholder="Votre adresse email..." style="border:1px solid rgba(0,0,0,0.1); padding: 12px 20px; border-radius: 8px;">-->
<!--        <button class="btn btn-warning fw-bold px-4" style="background:var(--jaune); border:none; border-radius: 8px; color: var(--texte);">S'abonner <i class="fas fa-paper-plane ms-2"></i></button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</section>-->

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
