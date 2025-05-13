<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Services</p>
            <h1>Objets Perdus et Retrouvés</h1>
        </div>
        <div class="row g-4">
            @php
                $objets = App\Models\Objet::orderBy('created_at', 'desc')->take(6)->get();
            @endphp
            
            @foreach($objets as $objet)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-light rounded h-100 p-5">
                    <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                        @if($objet->statut == 'perdu')
                            <i class="fa fa-search text-primary fs-4"></i>
                        @else
                            <i class="fa fa-check text-primary fs-4"></i>
                        @endif
                    </div>
                    <h4 class="mb-3">{{ $objet->titre }}</h4>
                    <p class="mb-4">
                        {{ Str::limit($objet->description, 100) }}
                    </p>
                    <button class="btn show-details" 
                            data-id="{{ $objet->id }}"
                            data-titre="{{ $objet->titre }}"
                            data-description="{{ $objet->description }}"
                            data-proprietaire="{{ $objet->proprietaire }}"
                            data-telephone="{{ $objet->telephone }}"
                            data-date="{{ $objet->date_perte_trouvaille }}"
                            data-lieu="{{ $objet->lieu_perte_trouvaille }}"
                            data-statut="{{ $objet->statut }}"
                            data-photo="{{ $objet->photo ? asset('storage/' . $objet->photo) : '' }}">
                        <i class="fa fa-plus text-primary me-3"></i>Voir Plus
                    </button>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>