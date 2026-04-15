<!-- Modal de Visualisation Public -->
<div class="modal fade" id="publicViewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; overflow: hidden;">
      <div class="modal-header border-0 bg-light p-4">
        <h5 class="modal-title fw-bold" id="publicViewModalLabel" style="font-family: 'Playfair Display', serif; color: var(--bleu-fonce);">Détails</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body p-4" id="publicViewModalBody">
        <!-- Contenu injecté par JS -->
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="mt-3 text-muted">Chargement en cours...</p>
        </div>
      </div>
      <div class="modal-footer border-0 bg-light p-3">
          <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<script>
  function openViewModal(type, id) {
      const body = document.getElementById('publicViewModalBody');
      const title = document.getElementById('publicViewModalLabel');
      
      body.innerHTML = '<div class="text-center py-5"><div class="spinner-border text-primary" role="status"></div><p class="mt-3 text-muted">Chargement en cours...</p></div>';
      title.innerText = type === 'post' ? 'Actualité' : (type === 'avi' ? 'Avis du CES' : 'Détails');

      const modal = new bootstrap.Modal(document.getElementById('publicViewModal'));
      modal.show();

      fetch(`/api/${type}s?id=${id}`)
          .then(response => {
              if (!response.ok) throw new Error('Network response was not ok');
              return response.json();
          })
          .then(data => {
              const item = Array.isArray(data) ? data.find(i => i.id == id) : data;
              if (!item) {
                  body.innerHTML = '<div class="alert alert-danger">Contenu introuvable.</div>';
                  return;
              }

              let html = '';
              if (type === 'post') {
                  const datePub = new Date(item.date_publication).toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' });
                  html = `
                      <div class="text-center mb-4">
                          ${item.image_url ? `<img src="${item.image_url}" class="rounded shadow-sm mb-4 img-fit-contain" style="max-height: 400px; width: 100%;" alt="${item.titre}">` : ''}
                          <h3 class="fw-bold mb-3" style="font-family: 'Playfair Display', serif; color: var(--bleu-fonce);">${item.titre}</h3>
                          <div class="d-flex justify-content-center align-items-center gap-3">
                              <span class="badge bg-primary-subtle text-primary">${item.categorie || 'Actualité'}</span>
                              <span class="text-muted small"><i class="fas fa-calendar-alt me-1"></i> ${datePub}</span>
                          </div>
                      </div>
                      ${item.resume ? `<div class="p-4 bg-light rounded-3 mb-4 border-start border-4 border-primary"><strong class="d-block mb-2 text-primary">Résumé</strong> <em class="text-muted">${item.resume}</em></div>` : ''}
                      <div class="article-content" style="line-height: 1.8; color: var(--texte); font-size: 1.05rem;">
                          ${item.contenu}
                      </div>
                  `;
              } else if (type === 'avi') {
                  const datePub = new Date(item.created_at).toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' });
                  html = `
                      <div class="mb-4 text-center">
                          <div class="mb-3 d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle" style="width: 80px; height: 80px;">
                              <i class="fas fa-file-signature fa-2x"></i>
                          </div>
                          <h3 class="fw-bold mb-3" style="font-family: 'Playfair Display', serif; color: var(--bleu-fonce);">${item.titre}</h3>
                          <div class="d-flex justify-content-center align-items-center gap-3 mb-4">
                              <span class="badge bg-secondary-subtle text-secondary px-3 py-2"><i class="fas fa-users-gear me-1"></i> ${item.commission}</span>
                              <span class="text-muted small"><i class="fas fa-calendar-alt me-1"></i> ${datePub}</span>
                          </div>
                      </div>
                      ${item.resume ? `<div class="p-4 bg-light rounded-3 mb-4 border-start border-4 border-primary"><strong class="d-block mb-2 text-primary">Résumé de l'avis</strong><p class="mb-0 text-muted" style="line-height: 1.7;">${item.resume}</p></div>` : ''}
                      
                      ${item.pdf_url ? `
                      <div class="text-center mt-5 mb-3">
                          <a href="${item.pdf_url}" target="_blank" class="btn btn-outline-primary btn-lg rounded-pill px-5 shadow-sm">
                              <i class="fas fa-file-pdf me-2 text-danger"></i> Lire le document complet en PDF
                          </a>
                      </div>` : ''}
                  `;
              }
              body.innerHTML = html;
          })
          .catch(error => {
              console.error('Erreur:', error);
              body.innerHTML = '<div class="alert alert-danger rounded-3"><i class="fas fa-exclamation-triangle me-2"></i> Une erreur est survenue lors du chargement des données.</div>';
          });
  }
</script>
