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
  <div class="container">
    <div class="s-tag">Membres élus</div>
    <h2 class="s-title">Composition du <span>Bureau</span></h2>
    <p class="prose mb-5" style="max-width:680px;">Le Bureau est l'organe moteur, permanent et décisionnel du CES. Il assure la gestion courante de l'institution et statue par voie de décision. Il comprend sept membres élus par l'Assemblée Générale pour la durée de la mandature.</p>

    <!-- Grille des membres -->
    <div class="row g-4">
      <!-- Président -->
      <div class="col-lg-3 col-md-6">
        <div class="membre-card reveal" style="border-top:4px solid var(--jaune)">
          <img src="https://ik.imagekit.io/ces/bureau/Pr_JKK__(1)_1_.webp?updatedAt=1774448219113" alt="Président" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
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
          <img src="https://ik.imagekit.io/ces/bureau/1VP_LKK_.webp?updatedAt=1774449073714" alt="1er VP" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
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
          <img src="https://ik.imagekit.io/ces/bureau/2VP_CTK.webp?updatedAt=1774448924923" alt="2e VP" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
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
          <img src="https://ik.imagekit.io/ces/bureau/Rapp_RNM_.webp?updatedAt=1774448978783" alt="Rapporteur" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
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
          <img src="https://ik.imagekit.io/ces/bureau/Rapp_Adj%20SMT_.webp?updatedAt=1774448958778" alt="Rapp. Adj." onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
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
          <img src="https://ik.imagekit.io/ces/bureau/Quest_AMK.webp?updatedAt=1774449132444" alt="Questeur" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
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
          <img src="https://ik.imagekit.io/ces/bureau/Quest_Adj_BM_.webp?updatedAt=1774449118409" alt="Questeur Adj." onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
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