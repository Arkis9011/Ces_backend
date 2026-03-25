document.addEventListener('DOMContentLoaded', function() {
  const mobileToggle = document.getElementById('mobileToggle');
  const nav = document.getElementById('mainNav');
  const navItems = document.querySelectorAll('.site-nav-item.has-dropdown, .site-nav-item.has-mega');

  // Ouverture/fermeture du menu mobile
  if (mobileToggle) {
    mobileToggle.addEventListener('click', function(e) {
      e.stopPropagation();
      const expanded = this.getAttribute('aria-expanded') === 'true' ? false : true;
      this.setAttribute('aria-expanded', expanded);
      nav.classList.toggle('active');

      // Réinitialiser les sous-menus ouverts à la fermeture
      if (!expanded) {
        navItems.forEach(item => {
          item.classList.remove('open');
          const link = item.querySelector('.site-nav-link');
          if (link) link.setAttribute('aria-expanded', 'false');
        });
      }
    });
  }

  // Gestion des sous-menus en mode mobile (clic sur le lien parent)
  navItems.forEach(item => {
    const link = item.querySelector('.site-nav-link');
    const dropdown = item.querySelector('.site-dropdown, .site-mega-dropdown');

    if (link && dropdown) {
      link.addEventListener('click', function(e) {
        // Uniquement en mode mobile (quand le nav est en colonne)
        if (window.innerWidth <= 768) {
          e.preventDefault();
          const isOpen = item.classList.contains('open');

          // Fermer tous les autres avant d'ouvrir celui-ci (optionnel)
          // navItems.forEach(i => i.classList.remove('open'));

          item.classList.toggle('open');
          this.setAttribute('aria-expanded', !isOpen);
        }
      });
    }
  });

  // Fermer le menu mobile si on clique en dehors (optionnel)
  document.addEventListener('click', function(e) {
    if (window.innerWidth <= 768 && nav.classList.contains('active')) {
      if (!nav.contains(e.target) && !mobileToggle.contains(e.target)) {
        nav.classList.remove('active');
        mobileToggle.setAttribute('aria-expanded', 'false');
        // Réinitialiser les sous-menus
        navItems.forEach(item => item.classList.remove('open'));
      }
    }
  });

  // Réinitialiser quand on redimensionne au-dessus de 768px
  window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
      nav.classList.remove('active');
      mobileToggle.setAttribute('aria-expanded', 'false');
      navItems.forEach(item => item.classList.remove('open'));
    }
  });
});





  // Gestion du bouton de recherche
  const searchToggle = document.querySelector('.search-toggle');
  const searchItem = document.querySelector('.search-item');
  const searchForm = searchItem ? searchItem.querySelector('form') : null;
  const searchInput = searchItem ? searchItem.querySelector('input[type="search"]') : null;

  if (searchToggle && searchItem) {
    searchToggle.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      const isOpen = searchItem.classList.contains('open');
      // Fermer tous les autres éventuels
      document.querySelectorAll('.site-nav-item.open').forEach(item => {
        if (item !== searchItem) item.classList.remove('open');
      });
      searchItem.classList.toggle('open');
      this.setAttribute('aria-expanded', !isOpen);
      if (!isOpen && searchInput) {
        setTimeout(() => searchInput.focus(), 100);
      }
    });

    // Fermer en cliquant ailleurs
    document.addEventListener('click', function(e) {
      if (!searchItem.contains(e.target)) {
        searchItem.classList.remove('open');
        searchToggle.setAttribute('aria-expanded', 'false');
      }
    });

    // Empêcher la fermeture si on clique dans le dropdown
    const searchDropdown = searchItem.querySelector('.search-dropdown');
    if (searchDropdown) {
      searchDropdown.addEventListener('click', function(e) {
        e.stopPropagation();
      });
    }

    // Logique de recherche (Filtrage sur la page actuelle)
    if (searchForm && searchInput) {
      searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const query = searchInput.value.toLowerCase().trim();
        if (query === "") return;

        // Cibles de recherche (cards, agenda, etc.)
        const targets = document.querySelectorAll('.doc-card, .info-card, .agenda-item, .membre-card, .categorie-card');
        let found = 0;

        targets.forEach(target => {
          const text = target.textContent.toLowerCase();
          if (text.includes(query)) {
            target.style.display = '';
            target.style.animation = 'highlight 1s ease';
            found++;
          } else {
            target.style.display = 'none';
          }
        });

        // Fermer le dropdown après la recherche
        searchItem.classList.remove('open');
        searchToggle.setAttribute('aria-expanded', 'false');

        // Message si rien n'est trouvé
        if (found === 0 && targets.length > 0) {
          alert("Aucun résultat trouvé sur cette page pour : " + query);
          // Réinitialiser l'affichage après un court délai
          setTimeout(() => {
            targets.forEach(t => t.style.display = '');
          }, 3000);
        }
      });
    }
  }


// ===== SLIDER =====
class Slider {
  constructor(container) {
    this.container = container;
    this.slides = container.querySelectorAll('.slide');
    this.dots = container.querySelectorAll('.dot');
    this.prevBtn = container.querySelector('.prev');
    this.nextBtn = container.querySelector('.next');
    this.slidesContainer = container.querySelector('.slides');
    
    this.currentIndex = 0;
    this.totalSlides = this.slides.length;
    this.interval = null;
    this.autoPlayDelay = 5000; // 5 secondes
    
    this.init();
  }

  init() {
    this.updateActiveSlide(this.currentIndex);
    
    this.prevBtn.addEventListener('click', () => this.prev());
    this.nextBtn.addEventListener('click', () => this.next());
    
    this.dots.forEach((dot, index) => {
      dot.addEventListener('click', () => this.goTo(index));
    });

    this.container.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft') {
        this.prev();
        e.preventDefault();
      } else if (e.key === 'ArrowRight') {
        this.next();
        e.preventDefault();
      }
    });

    this.container.addEventListener('mouseenter', () => this.stopAutoPlay());
    this.container.addEventListener('mouseleave', () => this.startAutoPlay());

    this.startAutoPlay();
    this.updateAria();
  }

  updateActiveSlide(index) {
    this.slidesContainer.style.transform = `translateX(-${index * 100}%)`;

    this.slides.forEach((slide, i) => {
      slide.classList.toggle('active', i === index);
      slide.setAttribute('aria-hidden', i !== index);
    });

    this.dots.forEach((dot, i) => {
      dot.classList.toggle('active', i === index);
      dot.setAttribute('aria-current', i === index ? 'true' : 'false');
    });

    this.currentIndex = index;
  }

  prev() {
    const newIndex = (this.currentIndex - 1 + this.totalSlides) % this.totalSlides;
    this.updateActiveSlide(newIndex);
    this.resetAutoPlay();
  }

  next() {
    const newIndex = (this.currentIndex + 1) % this.totalSlides;
    this.updateActiveSlide(newIndex);
    this.resetAutoPlay();
  }

  goTo(index) {
    if (index >= 0 && index < this.totalSlides) {
      this.updateActiveSlide(index);
      this.resetAutoPlay();
    }
  }

  startAutoPlay() {
    if (this.interval) return;
    this.interval = setInterval(() => this.next(), this.autoPlayDelay);
  }

  stopAutoPlay() {
    if (this.interval) {
      clearInterval(this.interval);
      this.interval = null;
    }
  }

  resetAutoPlay() {
    this.stopAutoPlay();
    this.startAutoPlay();
  }

  updateAria() {
    this.container.setAttribute('aria-roledescription', 'carrousel');
    this.slidesContainer.setAttribute('aria-live', 'polite');
    this.slides.forEach((slide, i) => {
      slide.setAttribute('role', 'group');
      slide.setAttribute('aria-roledescription', 'slide');
      slide.setAttribute('aria-label', `${i + 1} sur ${this.totalSlides}`);
    });
  }
}

// Initialisation du slider
document.addEventListener('DOMContentLoaded', () => {
  const hero = document.querySelector('.hero');
  if (hero) {
    new Slider(hero);
  }
});



class Carousel {
  constructor(container) {
    this.container = container;
    this.track = container.querySelector('.carousel__track');
    this.slides = Array.from(container.querySelectorAll('.carousel__slide'));
    this.dots = Array.from(container.querySelectorAll('.carousel__dot'));
    this.prevBtn = container.querySelector('.carousel__arrow--prev');
    this.nextBtn = container.querySelector('.carousel__arrow--next');
    this.playPauseBtn = container.querySelector('.carousel__playpause');
    this.playIcon = this.playPauseBtn?.querySelector('i');

    this.currentIndex = 0;
    this.totalSlides = this.slides.length;
    this.autoPlayInterval = null;
    this.autoPlayDelay = 5000;
    this.isPlaying = true;

    this.init();
  }

  init() {
    this.updateClasses();
    this.attachEvents();
    this.startAutoPlay();
  }

  updateClasses() {
    // Met à jour les classes actives sur les slides et dots
    this.slides.forEach((slide, index) => {
      slide.classList.toggle('carousel__slide--active', index === this.currentIndex);
    });
    this.dots.forEach((dot, index) => {
      dot.classList.toggle('carousel__dot--active', index === this.currentIndex);
      dot.setAttribute('aria-current', index === this.currentIndex ? 'true' : 'false');
    });

    // Déplace le track
    this.track.style.transform = `translateX(-${this.currentIndex * 100}%)`;
  }

  goTo(index) {
    if (index < 0) index = this.totalSlides - 1;
    if (index >= this.totalSlides) index = 0;
    this.currentIndex = index;
    this.updateClasses();
    this.resetAutoPlay();
  }

  prev() {
    this.goTo(this.currentIndex - 1);
  }

  next() {
    this.goTo(this.currentIndex + 1);
  }

  attachEvents() {
    // Flèches
    this.prevBtn.addEventListener('click', () => this.prev());
    this.nextBtn.addEventListener('click', () => this.next());

    // Dots
    this.dots.forEach((dot, index) => {
      dot.addEventListener('click', () => this.goTo(index));
    });

    // Pause/Play
    if (this.playPauseBtn) {
      this.playPauseBtn.addEventListener('click', () => this.toggleAutoPlay());
    }

    // Arrêt au survol
    this.container.addEventListener('mouseenter', () => this.stopAutoPlay());
    this.container.addEventListener('mouseleave', () => this.startAutoPlay());

    // Arrêt au focus sur éléments interactifs
    const interactive = this.container.querySelectorAll('a, button');
    interactive.forEach(el => {
      el.addEventListener('focusin', () => this.stopAutoPlay());
      el.addEventListener('focusout', () => this.startAutoPlay());
    });

    // Navigation clavier
    this.container.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft') {
        this.prev();
        e.preventDefault();
      } else if (e.key === 'ArrowRight') {
        this.next();
        e.preventDefault();
      }
    });

    // Swipe tactile
    let touchStartX = 0;
    let touchEndX = 0;
    const minSwipe = 50;

    this.container.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    this.container.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      const diff = touchStartX - touchEndX;
      if (Math.abs(diff) > minSwipe) {
        diff > 0 ? this.next() : this.prev();
      }
    }, { passive: true });
  }

  startAutoPlay() {
    if (!this.isPlaying || this.autoPlayInterval) return;
    this.autoPlayInterval = setInterval(() => this.next(), this.autoPlayDelay);
  }

  stopAutoPlay() {
    if (this.autoPlayInterval) {
      clearInterval(this.autoPlayInterval);
      this.autoPlayInterval = null;
    }
  }

  resetAutoPlay() {
    this.stopAutoPlay();
    this.startAutoPlay();
  }

  toggleAutoPlay() {
    this.isPlaying = !this.isPlaying;
    if (this.isPlaying) {
      this.startAutoPlay();
      if (this.playIcon) {
        this.playIcon.className = 'fas fa-pause';
      }
      this.playPauseBtn.setAttribute('aria-label', 'Mettre en pause le défilement automatique');
    } else {
      this.stopAutoPlay();
      if (this.playIcon) {
        this.playIcon.className = 'fas fa-play';
      }
      this.playPauseBtn.setAttribute('aria-label', 'Lancer le défilement automatique');
    }
  }
}

// Initialisation
document.addEventListener('DOMContentLoaded', () => {
  const carousel = document.querySelector('.carousel');
  if (carousel) {
    new Carousel(carousel);
  }
});




     // Données des membres (fournies par L'institution)
        const membresData = {
            1: [
                { nom: "J.P. KIWAKANA KIMAYALA", fonction: "Conseiller" },
                { nom: "R. MALUMBA KALOMBO", fonction: "Conseiller" },
                { nom: "S.C. NSIKU wa NSIKU", fonction: "Conseiller" },
                { nom: "V.N. VIKA DI PANZU", fonction: "Conseiller" },
                { nom: "J. KALOMBO SHAMBUYI", fonction: "Conseiller" },
               ],
            2: [
                { nom: "G. KUKU GEDILA", fonction: "Conseiller" },
                { nom: "M. NDONGALA NSIBU", fonction: "Conseiller" },
                { nom: "J. KINYAMBA LUSAMANYA", fonction: "Conseiller" },
                { nom: "J.C. AKONDA EKONGOLO", fonction: "Conseiller" },
                { nom: "A.ATUM KASSUMIN", fonction: "Conseiller" },
                
               ],
            3: [
                { nom: "R. NGONGO MATESO", fonction: "Conseiller" },
                { nom: "G. MUDUMBULA MAKOLA", fonction: "Conseiller" },
                { nom: "R. TSHIMANGA MUAMBA", fonction: "Conseiller" },
                { nom: "A. YOKA LYE MUDABI", fonction: "Conseiller" },
                { nom: "A. MASHIKA BIN KASONGO", fonction: "Conseiller" },
               ],
            4: [
                { nom: "C. DIMANDJA ELUY'A KONDO", fonction: "Conseiller" },
                { nom: "I. MBUMBA TSHIMANKINDA", fonction: "Conseiller" },
                { nom: "J. MFUNA PULULU", fonction: "Conseiller" },
                { nom: "S. NZINGA MALUKA", fonction: "Conseiller" },
                { nom: "A. MBUTA KABAMBA", fonction: "Conseiller" },
               ],
            5: [
                { nom: "A. LUTETE NKAHILU", fonction: "Conseillère" },
                { nom: "W. MUKENDI BATULEKELA", fonction: "Conseiller" },
                { nom: "C. LUETETA A LUETETA", fonction: "Conseiller" },
                { nom: "S. MBAKATA THULA", fonction: "Conseillère" },
                { nom: "M. KONGOTA NDELO", fonction: "Conseiller" },
               ],
            6: [
                { nom: "G. KAVIRA KABUO", fonction: "Conseillère" },
                { nom: "E. ASANEMANE MAWAY", fonction: "Conseillère" },
                { nom: "Y. TABIA MULAMBA", fonction: "Conseillère" },
               ],
            7: [
                { nom: "H. LUYELA YENGAY YENG", fonction: "Conseiller" },
                { nom: "J. OBOTE SIRIKA", fonction: "Conseiller" },
                { nom: "E. BEKANGA BOKUTA", fonction: "Conseiller" },
               ],
            8: [
                { nom: "L. KYABOBA KASOBWA", fonction: "Conseiller" },
                { nom: "N. OBOTELA RASHID", fonction: "Conseiller" },
                { nom: "C.J. TIKER TIKER", fonction: "Conseiller" },
               ],
            9: [
                { nom: "C. TSHIBUABUA KANYAMA", fonction: "Conseiller" },
                { nom: "C. NZAU TSOBO", fonction: "Conseiller" },
                { nom: "E. BELAU LILA", fonction: "Conseillère" },
               ],
            10: [
                { nom: "A.E. MARTINS", fonction: "Conseillère" },
                { nom: "B. MUBENGA NGALULA", fonction: "Conseiller" },
                { nom: "C.R. MUKENDI MEMBU", fonction: "Conseiller" },
                ],
            11: [
                { nom: "R. KILOKA NGOY", fonction: "Conseiller" },
                { nom: "C. TSHIAMALA BANUNGANA", fonction: "Conseiller" },
                ],
            12: [
                { nom: "P. MADEBE NKAMANYAPALA", fonction: "Conseillère (Bas-Uele)" },
                { nom: "B. MPULU YEMBELA", fonction: "Conseillère (Equateur)" },
                { nom: "F. LUKUNGA KATANGA", fonction: "Conseiller (Haut-Katanga)" },
                { nom: "M. NUMBI WA KASONGO", fonction: "Conseiller (Haut-Lomami)" },
                { nom: "S. ATADRA SURA", fonction: "Conseillère (Haut-Uele)" },
                { nom: "D. BIKINDU DITOMENE", fonction: "Conseiller (Kinshasa)" },
                { nom: "P. PILO KAMARAGI", fonction: "Conseiller (Ituri)" },
                { nom: "J.B. MUKENDI MUCI", fonction: "Conseiller (Kasaï Oriental) " },
                { nom: "M.E. NGALULA KALALA", fonction: "Conseillère (Kasaï Central)" },
                { nom: "M. KIKA MAVUNDA", fonction: "Conseiller (Kwilu)" },
                { nom: "C. NSENDA NSENDA ", fonction: "Conseiller (Kasaï)" },
                { nom: "J.C. NDJIBU NDJIBU", fonction: "Conseiller (Lomami)" },
                { nom: "W. NLANDU KAVIDI", fonction: "Conseillère (Kongo-Central)" },
                { nom: "R. BOLA DULA", fonction: "Conseillère (Maï-Ndombe)" },
                { nom: "P. MATADIWAMBA KAMBAMUTU", fonction: "Conseiller (Kwango)" },
                { nom: "L. BINUMBI WAKUZIA", fonction: "Conseillère (Maniema)" },
                { nom: "D. MANZENGE BOKONGO", fonction: "Conseiller (Mongala)" },
                { nom: "P. OMEKENGE OSANGA", fonction: "Conseiller (Sankuru)" },
                { nom: "J. IKONGO ISEKOTOKO BOOYO", fonction: "Conseiller (Tshuapa)" },
                { nom: "T. KAZIMA TAMUGO", fonction: "Conseillère (Sud-Kivu)" },
                { nom: "J.P. AGBOKUMA BITA NZALE", fonction: "Conseiller (Sud-Ubangi)" },
                { nom: "P. NDIVITO KIKWAYA", fonction: "Conseiller (Nord-Kivu)" },
                { nom: "R.N. MWANGE KALIMA", fonction: "Conseiller (Tanganyika)" },
                { nom: "B. KASUSULA DJUMA LOKALI", fonction: "Conseiller (Tshopo)" },
                { nom: "BELADE WAPU KOKO", fonction: "Conseiller (Nord-Ubangi)" },
                { nom: "C. IPANGA TSHIBWILA", fonction: "Conseiller (Lualaba)" },

              ]
        };

        // Récupération des éléments DOM
        const overlay = document.getElementById('modalOverlay');
        const modalTitle = document.getElementById('modalCategoryTitle');
        const tableBody = document.getElementById('modalTableBody');
        const closeBtn = document.getElementById('closeModalBtn');
        const cards = document.querySelectorAll('.categorie-card');

        // Fonction pour ouvrir la modale
        function openModal(categoryNumber, categoryName) {
            modalTitle.textContent = categoryName;

            const membres = membresData[categoryNumber] || [];
            tableBody.innerHTML = '';

            if (membres.length === 0) {
                const emptyRow = document.createElement('tr');
                emptyRow.innerHTML = '<td colspan="2" class="empty-message">Aucun membre disponible pour cette catégorie</td>';
                tableBody.appendChild(emptyRow);
            } else {
                membres.forEach(membre => {
                    const row = document.createElement('tr');
                    row.innerHTML = `<td>${membre.nom}</td><td>${membre.fonction}</td>`;
                    tableBody.appendChild(row);
                });
            }

            overlay.style.display = 'flex';
            document.body.style.overflow = 'hidden'; // Empêche le scroll derrière la modale
        }

        // Fonction pour fermer la modale
        function closeModal() {
            overlay.style.display = 'none';
            document.body.style.overflow = ''; // Restaure le scroll
        }

        // Événement clic sur chaque carte
        cards.forEach(card => {
            card.addEventListener('click', function() {
                const categoryNumber = this.dataset.category;
                const categoryName = this.querySelector('.categorie-nom').textContent;
                openModal(categoryNumber, categoryName);
            });
        });

        // Fermeture par le bouton X
        closeBtn.addEventListener('click', closeModal);

        // Fermeture en cliquant sur l'overlay
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) {
                closeModal();
            }
        });

        // Fermeture avec la touche Échap
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && overlay.style.display === 'flex') {
                closeModal();
            }
        });