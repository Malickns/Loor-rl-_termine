<div class="row g-4">
    @php
        $objets = App\Models\Objet::orderBy('created_at', 'desc')->take(6)->get();
    @endphp
    
    @foreach($objets as $objet)
    <div class="col-md-6 col-lg-4">
        <div class="bien-card">
            <div class="position-relative">
                @if($objet->photo)
                    <img src="{{ asset('storage/' . $objet->photo) }}" class="bien-image" alt="{{ $objet->titre }}">
                @else
                    <img src="/api/placeholder/400/200" class="bien-image" alt="{{ $objet->titre }}">
                @endif
                <span class="bien-status {{ $objet->statut == 'perdu' ? 'status-perdu' : 'status-retrouve' }}">
                    {{ $objet->statut == 'perdu' ? 'Perdu' : 'Retrouvé' }}
                </span>
            </div>
            <div class="bien-details">
                <h3 class="bien-title">{{ $objet->titre }}</h3>
                <p class="bien-description">{{ Str::limit($objet->description, 100) }}</p>
                <div class="bien-metadata">
                    <span><i class="fas fa-map-marker-alt me-1"></i>{{ $objet->lieu_perte_trouvaille }}</span>
                    <span><i class="far fa-calendar-alt me-1"></i>{{ $objet->date_perte_trouvaille }}</span>
                </div>
                <div class="bien-actions">
                    <!-- Bouton Modifier -->
                    <a href="{{ route('objets.edit', $objet->id) }}" class="action-button edit">
                        <i class="fas fa-edit"></i>
                    </a>
                
                    <!-- Bouton Supprimer -->
                    <form action="{{ route('objets.destroy', $objet->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-button delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet objet ?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                
                    <!-- Bouton Valider (changer statut) -->
                    @if($objet->statut == 'perdu')
                        <form action="{{ route('objets.changerStatut', $objet->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="action-button success" onclick="return confirm('Êtes-vous sûr de vouloir marquer cet objet comme trouvé ?')">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>