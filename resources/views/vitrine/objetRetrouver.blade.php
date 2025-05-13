@extends('vitrine.layouts.app')

@section('title', 'Objets Retrouvés')

@section('content')

<link href="vitrine/css/declarations/style.css" rel="stylesheet">
    

<!-- Banner -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Objets Retrouvés</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Accueil</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Objets Retrouvés</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Filters -->
<section class="filters-section mb-4">
    <div class="container">
        <div class="card filter-card">
            <div class="card-body">
                <form id="filterForm" class="row g-3">
                    <div class="col-md-3">
                        <div class="search-wrapper">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" name="search" class="form-control search-input" placeholder="Rechercher un objet...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select custom-select" name="categorie_id" id="categorie_id">
                            <option value="">Toutes les catégories</option>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select custom-select" name="sous_categorie_id" id="sous_categorie_id">
                            <option value="">Toutes les sous-catégories</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary w-100 filter-btn">
                            <i class="fas fa-filter me-2"></i>Filtrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Items Grid -->
<div class="container mb-5">
    <div class="row g-4" id="items-container">
        @if($objets->count() > 0)
            @foreach($objets as $objet)
            <div class="col-lg-4 col-md-6 wow fadeInUp">
                <div class="item-card mb-5">
                    <div class="item-image">
                        @if($objet->photo)
                            <img src="{{ asset('storage/' . $objet->photo) }}" alt="{{ $objet->titre }}">
                        @else
                            <img src="/vitrine/assets/img/no-image.jpg" alt="No image">
                        @endif
                        
                        @if($objet->created_at && $objet->created_at->gt(now()->subDays(2)))
                            <div class="item-overlay"><span class="badge bg-primary">Nouveau</span></div>
                        @endif
                    </div>
                    <div class="item-content">
                        <h3>{{ $objet->titre }}</h3>
                        <div class="item-info">
                            <div class="info-item">
                                <div class="icon-circle">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <span>{{ $objet->lieu_perte_trouvaille ?? 'Non spécifié' }}</span>
                            </div>
                            <div class="info-item">
                                <div class="icon-circle">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <span>{{ $objet->date_perte_trouvaille ? date('d/m/Y', strtotime($objet->date_perte_trouvaille)) : 'Date non spécifiée' }}</span>
                            </div>
                            <div class="info-item">
                                <div class="icon-circle">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span>{{ $objet->proprietaire ?? 'Propriétaire inconnu' }}</span>
                            </div>
                        </div>
                        <button class="view-more-btn show-details" 
                                data-id="{{ $objet->id }}"
                                data-titre="{{ $objet->titre }}"
                                data-description="{{ $objet->description ?? '' }}"
                                data-proprietaire="{{ $objet->proprietaire ?? '' }}"
                                data-telephone="{{ $objet->telephone ?? '' }}"
                                data-date="{{ $objet->date_perte_trouvaille ? date('d/m/Y', strtotime($objet->date_perte_trouvaille)) : '' }}"
                                data-lieu="{{ $objet->lieu_perte_trouvaille ?? '' }}"
                                data-photo="{{ $objet->photo ? asset('storage/' . $objet->photo) : '' }}">
                            <i class="fa fa-plus text-primary me-3"></i>
                            <span class="btn">Voir plus</span>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12">
                <p class="text-center">Aucun objet perdu n'a été trouvé.</p>
            </div>
        @endif
    </div>

    <!-- Pagination -->
    @if($objets->count() > 0)
    <div class="pagination-container">
        {{ $objets->links() }}
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
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
</script>
@endpush