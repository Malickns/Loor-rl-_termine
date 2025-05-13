@extends('admin.layouts.app')

@section('title', 'Modifier un objet')

@section('content')
<div class="container">
    <h1>Modifier l'objet</h1>
    <form action="{{ route('objets.update', $objet->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ $objet->titre }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $objet->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="lieu_perte_trouvaille">Lieu</label>
            <input type="text" name="lieu_perte_trouvaille" id="lieu_perte_trouvaille" class="form-control" value="{{ $objet->lieu_perte_trouvaille }}">
        </div>
        <div class="form-group">
            <label for="date_perte_trouvaille">Date</label>
            <input type="date" name="date_perte_trouvaille" id="date_perte_trouvaille" class="form-control" value="{{ $objet->date_perte_trouvaille }}">
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection