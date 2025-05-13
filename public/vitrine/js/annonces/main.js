document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filterForm');
    const categorieSelect = document.getElementById('categorie_id');
    const sousCategorieSelect = document.getElementById('sous_categorie_id');
    let searchTimeout;

    // Mise à jour des sous-catégories
    categorieSelect.addEventListener('change', function() {
        const categorieId = this.value;
        fetchSousCategories(categorieId);
    });

    function fetchSousCategories(categorieId) {
        if (!categorieId) {
            sousCategorieSelect.innerHTML = '<option value="">Toutes les sous-catégories</option>';
            return;
        }

        fetch(`/api/categories/${categorieId}/sous-categories`)
            .then(response => response.json())
            .then(data => {
                sousCategorieSelect.innerHTML = '<option value="">Toutes les sous-catégories</option>';
                data.forEach(sousCategorie => {
                    sousCategorieSelect.innerHTML += `<option value="${sousCategorie.id}">${sousCategorie.nom}</option>`;
                });
            });
    }

    // Recherche avec délai
    filterForm.querySelectorAll('input, select').forEach(element => {
        element.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(performSearch, 500);
        });
    });

    function performSearch() {
        const formData = new FormData(filterForm);
        const searchParams = new URLSearchParams(formData);

        fetch(`/objets/search?${searchParams.toString()}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('items-container').innerHTML = data.html;
                document.querySelector('.pagination-container').innerHTML = data.pagination;
                initializeSweetAlert();
            });
    }

    // Initialisation de SweetAlert
    function initializeSweetAlert() {
        document.querySelectorAll('.show-details').forEach(button => {
            button.addEventListener('click', function() {
                const data = this.dataset;
                let photoHtml = '';
                
                if (data.photo) {
                    photoHtml = `<img src="${data.photo}" class="img-fluid mb-3" style="max-height: 200px;">`;
                }

                Swal.fire({
                    title: data.titre,
                    html: `
                        ${photoHtml}
                        <div class="text-start">
                            <p><strong>Description:</strong> ${data.description}</p>
                            <p><strong>Propriétaire:</strong> ${data.proprietaire}</p>
                            <p><strong>Téléphone:</strong> ${data.telephone}</p>
                            <p><strong>Date:</strong> ${data.date}</p>
                            <p><strong>Lieu:</strong> ${data.lieu}</p>
                        </div>
                    `,
                    width: '600px',
                    showCloseButton: true,
                    showConfirmButton: false,
                    customClass: {
                        popup: 'swal-wide',
                        content: 'text-start'
                    }
                });
            });
        });
    }

    // Initialisation au chargement
    initializeSweetAlert();
});