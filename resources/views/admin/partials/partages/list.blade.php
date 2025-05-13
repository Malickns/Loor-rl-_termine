<div class="container mx-auto px-4 py-6">
    <div class="objets-grid">
        @foreach($objets as $objet)
        <div class="objet-card">
            <div class="objet-image-container">
                @if($objet->photo)
                    <img src="{{ asset('storage/' . $objet->photo) }}" class="objet-image" alt="{{ $objet->titre }}">
                @else
                    <img src="/api/placeholder/400/200" class="objet-image" alt="{{ $objet->titre }}">
                @endif
                <span class="status-badge {{ $objet->statut == 'perdu' ? 'status-perdu' : 'status-retrouve' }}">
                    {{ $objet->statut == 'perdu' ? 'Perdu' : 'Retrouvé' }}
                </span>
            </div>
            
            <div class="objet-content">
                <h3 class="objet-title">{{ $objet->titre }}</h3>
                <p class="objet-description">{{ $objet->description }}</p>
                
                <div class="objet-metadata">
                    <span>
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        {{ $objet->lieu_perte_trouvaille }}
                    </span>
                    <span>
                        <i class="far fa-calendar-alt mr-1"></i>
                        {{ \Carbon\Carbon::parse($objet->date_perte_trouvaille)->format('d/m/Y') }}
                    </span>
                </div>

                <div class="share-buttons">
                    <a href="#" 
                       class="share-button share-whatsapp" 
                       onclick="event.preventDefault(); shareWhatsApp('{{ $objet->titre }}', '{{ $objet->description }}', '{{ $objet->lieu_perte_trouvaille }}', '{{ $objet->date_perte_trouvaille }}', '{{ $objet->telephone }}', '{{ $objet->proprietaire }}', '{{ $objet->statut }}')">
                        <i class="fab fa-whatsapp"></i>
                        WhatsApp
                    </a>
                    <a href="#" 
                       class="share-button share-facebook"
                       onclick="event.preventDefault(); shareFacebook('{{ $objet->titre }}', '{{ $objet->description }}', '{{ $objet->lieu_perte_trouvaille }}', '{{ $objet->date_perte_trouvaille }}', '{{ $objet->statut }}')">
                        <i class="fab fa-facebook"></i>
                        Facebook
                    </a>
                </div>

                <div class="admin-actions">
                    <a href="{{ route('objets.edit', $objet->id) }}" class="admin-button edit-button">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('objets.destroy', $objet->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="admin-button delete-button" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet objet ?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>