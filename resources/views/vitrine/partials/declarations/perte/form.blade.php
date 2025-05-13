<div class="container">
    <div class="form-section">
        <h2>Formulaire de déclaration de bien perdu</h2>

        <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" style="width: 0%"></div>
        </div>
        <form id="lostItemForm" class="needs-validation" novalidate method="POST" action="ajouter/traitement" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <!-- Informations sur l'objet -->
                <div class="col-md-6">
                    <label class="form-label">Titre de l'annonce *</label>
                    <input type="text" class="form-control" name="titre" placeholder="Exemple : Perte d'un portefeuille à Dakar" required>
                </div>
                <div class="col-md-6"> 
                    <label class="form-label">Catégorie *</label>
                    <select class="form-select" name="categorie_id" id="categorie" required>
                        <option value="">Sélectionner une catégorie</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Sous-catégorie *</label>
                    <select class="form-select" name="sous_categorie_id" id="sous_categorie" required>
                        <option value="">Sélectionner une sous-catégorie</option>
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Description détaillée *</label>
                    <textarea class="form-control" name="description" rows="4" placeholder="Décrivez le bien perdu..." required></textarea>
                </div>

                <!-- Informations personnelles -->
                <div class="col-md-6">
                    <label class="form-label">Nom complet *</label>
                    <input type="text" name="proprietaire" class="form-control" placeholder="Votre nom complet" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Numéro de téléphone *</label>
                    <input type="tel" name="telephone" class="form-control" placeholder="Numéro de téléphone" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Numéro WhatsApp</label>
                    <input type="tel" class="form-control" placeholder="Numéro WhatsApp (facultatif)">
                </div>

                <!-- Informations sur le bien perdu -->
                <div class="col-md-6">
                    <label class="form-label">Lieu où le bien a été perdu *</label>
                    <input type="text" class="form-control" name="lieu_perte_trouvaille" placeholder="Exemple : Marché Sandaga" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Date de perte *</label>
                    <input type="date" class="form-control" name="date_perte_trouvaille" required>
                </div>

                <!-- Upload d'image -->
                <div class="col-12">
                    <div class="image-upload" id="dropZone">
                        <input type="file" id="fileInput" style="display: none;" name="photo" accept="image/*">
                        <i class="fas fa-cloud-upload-alt fa-3x mb-3" id="uploadIcon"></i>
                        <h5>Déposez une image du bien ici (si disponible)</h5>
                        <p class="text-muted">ou</p>
                        <button type="button" class="btn btn-outline-warning" id="uploadButton">
                            <i class="fas fa-image me-2"></i>
                            Sélectionner une image
                        </button>
                    </div>
                </div>

                <!-- Options et conditions -->
                <div class="col-12">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="showPhone">
                        <label class="form-check-label" for="showPhone">
                            Afficher mes numéros de téléphone dans l'annonce
                        </label>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" required id="terms">
                        <label class="form-check-label" for="terms">
                            J'ai lu et j'accepte les <a href="#">conditions d'utilisation</a> et la 
                            <a href="#">politique de confidentialité</a> *
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-paper-plane me-2"></i>
                        Soumettre ma déclaration
                    </button>
                </div>
            </div>
        </form>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
</div>