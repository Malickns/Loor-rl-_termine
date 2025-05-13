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