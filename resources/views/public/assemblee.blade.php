@extends('layouts.public')

@section('title', 'Assemblée Générale | Conseil Économique et Social - RDC')

@section('content')
<!-- PAGE HERO -->
<div class="page-hero">
  <div class="hero-inner">
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
<!-- Modal pour les conseillers -->
<div class="modal fade" id="councilorModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title fw-bold" id="modalTitle">Liste des Conseillers</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead class="bg-light">
              <tr>
                <th class="ps-4">Nom & Prénom</th>
                <th>Fonction / Mandat</th>
              </tr>
            </thead>
            <tbody id="modalTableBody">
              <tr>
                <td colspan="2" class="text-center py-4 text-muted small">Données en cours de chargement...</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Intersection Observer
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

    // Gestion du modal (simulation de données pour l'exemple)
    const modal = new bootstrap.Modal(document.getElementById('councilorModal'));
    const modalTitle = document.getElementById('modalTitle');
    const tableBody = document.getElementById('modalTableBody');

    document.querySelectorAll('.categorie-card').forEach(card => {
      card.addEventListener('click', () => {
        const catName = card.querySelector('h6').innerText;
        modalTitle.innerText = catName;
        tableBody.innerHTML = `<tr><td colspan="2" class="text-center py-4 text-muted small">Liste des conseillers pour "${catName}" bientôt disponible.</td></tr>`;
        modal.show();
      });
    });
  });
</script>
@endsection