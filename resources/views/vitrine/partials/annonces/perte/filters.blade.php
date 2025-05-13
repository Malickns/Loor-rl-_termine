<section class="section-filtres mb-4">
    <div class="container">
        <div class="card carte-filtre">
            <div class="card-body">
                <form id="filterForm" class="row g-3">
                    <div class="col-md-3">
                        <div class="recherche-conteneur">
                            <i class="fas fa-search recherche-icone"></i>
                            <input type="text" name="search" class="form-control recherche-champ" placeholder="Rechercher un objet...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select select-personnalise" name="categorie_id" id="categorie_id">
                            <option value="">Toutes les catégories</option>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select select-personnalise" name="sous_categorie_id" id="sous_categorie_id">
                            <option value="">Toutes les sous-catégories</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary w-100 bouton-filtre">
                            <i class="fas fa-filter me-2"></i>Filtrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>