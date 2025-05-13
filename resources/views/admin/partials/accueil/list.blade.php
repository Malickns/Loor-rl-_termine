<div class="row">
    @foreach($utilisateurs as $utilisateur)
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card slide-in" style="animation-delay: 0.{{ $loop->index * 2 }}s">
            <span class="role-badge bg-{{ $utilisateur->role === 'superAdmin' ? 'primary' : ($utilisateur->role === 'admin' ? 'success' : 'warning') }}">
                {{ $utilisateur->role === 'superAdmin' ? 'Super Admin' : ($utilisateur->role === 'admin' ? 'Admin' : 'En attente') }}
            </span>
            <div class="card-body text-center">
                <img src="{{ $utilisateur->photo ?? '/api/placeholder/120/120' }}" class="admin-avatar rounded-circle mb-3" alt="Admin">
                <h5>{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</h5>
                <p class="text-muted mb-2">{{ $utilisateur->email }}</p>
                <div class="d-flex justify-content-center gap-2 mb-3">
                    <span class="badge bg-light text-dark">
                        <i class="fas fa-calendar me-1"></i>
                        Inscrit le {{ $utilisateur->created_at ? $utilisateur->created_at->format('d/m/Y') : 'Date inconnue' }}
                    </span>
                </div>
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-edit me-1"></i>Modifier
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash me-1"></i>Supprimer
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>