document.addEventListener('DOMContentLoaded', () => {
    // === 1. NAVIGATION MOBILE ===
    const mobileToggle = document.getElementById('mobileToggle');
    const mainNav = document.getElementById('mainNav');
    const navItems = document.querySelectorAll('.site-nav-item.has-dropdown, .site-nav-item.has-mega');

    if (mobileToggle && mainNav) {
        mobileToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            const expanded = mobileToggle.getAttribute('aria-expanded') === 'true';
            mobileToggle.setAttribute('aria-expanded', !expanded);
            mainNav.classList.toggle('active');
        });

        // Gestion des sous-menus en mobile
        navItems.forEach(item => {
            const link = item.querySelector('.site-nav-link');
            if (link) {
                link.addEventListener('click', (e) => {
                    if (window.innerWidth <= 991) {
                        e.preventDefault();
                        const isOpen = item.classList.contains('open');
                        navItems.forEach(i => i.classList.remove('open'));
                        if (!isOpen) item.classList.add('open');
                    }
                });
            }
        });

        // Fermer le menu au clic extérieur
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 991 && !mainNav.contains(e.target) && !mobileToggle.contains(e.target)) {
                mainNav.classList.remove('active');
                mobileToggle.setAttribute('aria-expanded', 'false');
                navItems.forEach(i => i.classList.remove('open'));
            }
        });
    }

    // === 2. RECHERCHE DANS L'EN-TÊTE (Barre visible) ===
    const headerSearchInput = document.getElementById('headerSearchInput');
    const headerSearchPreview = document.getElementById('header-search-preview');

    if (headerSearchInput && headerSearchPreview) {
        let debounceTimer;

        headerSearchInput.addEventListener('input', () => {
            clearTimeout(debounceTimer);
            const query = headerSearchInput.value.trim();

            if (query.length < 2) {
                headerSearchPreview.innerHTML = '';
                headerSearchPreview.style.display = 'none';
                return;
            }

            debounceTimer = setTimeout(() => {
                fetch(`/api/search-preview?q=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.length > 0) {
                            let html = '';
                            data.forEach(item => {
                                html += `
                                    <a href="${item.url}" class="search-preview-item">
                                        <span class="search-preview-type">${item.type}</span>
                                        <span class="search-preview-title">${item.title}</span>
                                    </a>
                                `;
                            });
                            html += `<a href="/recherche?q=${encodeURIComponent(query)}" class="search-preview-all">Voir tous les résultats</a>`;
                            headerSearchPreview.innerHTML = html;
                            headerSearchPreview.style.display = 'block';
                        } else {
                            headerSearchPreview.innerHTML = '<div class="p-3 text-center small text-muted">Aucun résultat trouvé</div>';
                            headerSearchPreview.style.display = 'block';
                        }
                    })
                    .catch(err => console.error('Erreur recherche preview:', err));
            }, 300);
        });

        // Fermer la prévisualisation au clic extérieur
        document.addEventListener('click', (e) => {
            if (!headerSearchInput.contains(e.target) && !headerSearchPreview.contains(e.target)) {
                headerSearchPreview.style.display = 'none';
            }
        });
    }

    // === 3. FILTRAGE AJAX DYNAMIQUE (Actualités, Avis, Agenda) ===
    const filterForm = document.getElementById('filterForm');
    const resultsContainer = document.getElementById('ajax-results');

    if (filterForm && resultsContainer) {
        const inputs = filterForm.querySelectorAll('input, select');
        const loadingOverlay = resultsContainer.querySelector('.loading-overlay');

        const performUpdate = () => {
            const formData = new FormData(filterForm);
            const params = new URLSearchParams(formData);
            const url = `${window.location.pathname}?${params.toString()}`;

            // Afficher le chargement
            if (loadingOverlay) loadingOverlay.classList.remove('d-none');
            resultsContainer.style.opacity = '0.6';

            fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                resultsContainer.innerHTML = html;
                resultsContainer.style.opacity = '1';
                // L'overlay est remplacé par le nouveau HTML s'il n'est pas dans le partial, 
                // mais ici il est dans la page parente donc il reste. 
                // S'il est dans la page parente, le innerHTML le supprime si c'est le conteneur lui-même.
                // Correction : on cible une zone interne si possible ou on remet l'overlay.
                
                // Mettre à jour l'URL
                window.history.pushState({}, '', url);
                
                // Ré-attacher la pagination
                attachPaginationEvents();
            })
            .catch(err => {
                console.error('Erreur filtrage AJAX:', err);
                resultsContainer.style.opacity = '1';
            });
        };

        let filterDebounce;
        inputs.forEach(input => {
            if (input.type === 'text') {
                input.addEventListener('input', () => {
                    clearTimeout(filterDebounce);
                    filterDebounce = setTimeout(performUpdate, 500);
                });
            } else {
                input.addEventListener('change', performUpdate);
            }
        });

        // Empêcher la soumission classique du formulaire
        filterForm.addEventListener('submit', (e) => e.preventDefault());

        // Gestion de la pagination AJAX
        function attachPaginationEvents() {
            const paginationLinks = document.querySelectorAll('.pagination a, .pagination-wrapper a');
            paginationLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const url = link.href;

                    resultsContainer.style.opacity = '0.6';
                    
                    fetch(url, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                    .then(res => res.text())
                    .then(html => {
                        resultsContainer.innerHTML = html;
                        resultsContainer.style.opacity = '1';
                        window.history.pushState({}, '', url);
                        attachPaginationEvents();
                        window.scrollTo({ top: resultsContainer.offsetTop - 100, behavior: 'smooth' });
                    });
                });
            });
        }

        attachPaginationEvents();
    }
});