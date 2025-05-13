<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Objet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObjetController extends Controller
{
    public function getObjetsRetrouver(Request $request)
{
    // Récupérer les paramètres de recherche et de filtre
    $search = $request->query('search', '');
    $category = $request->query('category', '');
    $perPage = 10; // Nombre d'éléments par page

    // Construire la requête pour récupérer les objets retrouvés
    $query = Objet::where('statut', 'retrouve')
        ->when($search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('titre', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        })
        ->when($category, function ($query, $category) {
            return $query->where('categorie_id', $category);
        });

    // Paginer les résultats
    $objets = $query->paginate($perPage);

    // Retourner la vue avec les objets retrouvés
    return view('vitrine.objetRetrouver', compact('objets'));
}



public function index(Request $request)
{
    $statut = $request->query('statut', 'perdu');  // Par défaut 'perdu'
    $objets = Objet::where('statut', $statut)
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    // Retourner la vue appropriée selon le statut
    if ($statut === 'perdu') {
        return view('objets.objetPerdus', compact('objets'));
    } else {
        return view('objets.objetRetrouver', compact('objets'));
    }
}


      
    // Fonction pour ajouter un objet (votre fonction existante)
    public function ajouterObjet_traitement(Request $request)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required',
        'categorie_id' => 'required|exists:categories,id',
        'date_perte_trouvaille' => 'nullable|date',
        'lieu_perte_trouvaille' => 'nullable|string',
        'proprietaire' => 'required|string|max:255',
        'telephone' => 'required|string|max:20',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $objet = new Objet();
    $objet->titre = $request->titre;
    $objet->description = $request->description;
    $objet->categorie_id = $request->categorie_id;
    $objet->date_perte_trouvaille = $request->date_perte_trouvaille;
    $objet->lieu_perte_trouvaille = $request->lieu_perte_trouvaille;
    $objet->proprietaire = $request->proprietaire;
    $objet->telephone = $request->telephone;

    // Vérifier l'origine de la requête et définir le statut en conséquence
    if ($request->is('vitrine.declarerPerte')) {
        $objet->statut = 'perdu';
    } elseif ($request->is('vitrine.declarerBienRetrouve')) {
        $objet->statut = 'trouve';
    } else {
        $objet->statut = 'perdu'; // Par défaut, au cas où
    }

    if ($request->hasFile('photo')) {
        $objet->photo = $request->file('photo')->store('objets', 'public');
    }

    $objet->save();

    return redirect('/')->with('success', 'Votre déclaration a été enregistrée avec succès.');
}


    // Fonction pour modifier un objet
    public function modifierObjet_traitement(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'categorie_id' => 'required|exists:categories,id',
            'date_perte_trouvaille' => 'nullable|date',
            'lieu_perte_trouvaille' => 'nullable|string',
            'proprietaire' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'statut' => 'required|in:perdu,retrouve,restitue'
        ]);

        $objet = Objet::findOrFail($id);
        $objet->titre = $request->titre;
        $objet->description = $request->description;
        $objet->categorie_id = $request->categorie_id;
        $objet->date_perte_trouvaille = $request->date_perte_trouvaille;
        $objet->lieu_perte_trouvaille = $request->lieu_perte_trouvaille;
        $objet->proprietaire = $request->proprietaire;
        $objet->telephone = $request->telephone;
        $objet->statut = $request->statut;

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($objet->photo) {
                Storage::disk('public')->delete($objet->photo);
            }
            $objet->photo = $request->file('photo')->store('objets', 'public');
        }

        $objet->save();

        return redirect('/')->with('success', 'L\'objet a été modifié avec succès.');
    }

    // Fonction pour supprimer un objet
    public function supprimerObjet($id)
    {
        $objet = Objet::findOrFail($id);
        
        // Supprimer la photo si elle existe
        if ($objet->photo) {
            Storage::disk('public')->delete($objet->photo);
        }
        
        $objet->delete();

        return redirect('/')->with('success', 'L\'objet a été supprimé avec succès.');
    }


    public function changerStatut(Request $request, $id)
    {
        $objet = Objet::findOrFail($id);
        $objet->statut = 'trouve'; // Changer le statut
        $objet->save();
    
        return redirect()->route('admin.bien')->with('success', 'Le statut de l\'objet a été mis à jour.');
    }

public function destroy($id)
{
    $objet = Objet::findOrFail($id);

    // Supprimer la photo si elle existe
    if ($objet->photo) {
        Storage::disk('public')->delete($objet->photo);
    }

    $objet->delete();

    return redirect()->route('admin.bien')->with('success', 'L\'objet a été supprimé avec succès.');
}

public function edit($id)
{
    $objet = Objet::findOrFail($id);
    return view('admin.partials.biens.edit-objet', compact('objet'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required',
        'lieu_perte_trouvaille' => 'nullable|string',
        'date_perte_trouvaille' => 'nullable|date',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $objet = Objet::findOrFail($id);
    $objet->titre = $request->titre;
    $objet->description = $request->description;
    $objet->lieu_perte_trouvaille = $request->lieu_perte_trouvaille;
    $objet->date_perte_trouvaille = $request->date_perte_trouvaille;

    if ($request->hasFile('photo')) {
        // Supprimer l'ancienne photo si elle existe
        if ($objet->photo) {
            Storage::disk('public')->delete($objet->photo);
        }
        $objet->photo = $request->file('photo')->store('objets', 'public');
    }

    $objet->save();

    return redirect()->route('admin.bien')->with('success', 'L\'objet a été modifié avec succès.');
}
    // Fonctions pour obtenir des statistiques
    public function getStatistiques()
    {
        $total = Objet::count();
        $perdus = Objet::where('statut', 'perdu')->count();
        $retrouves = Objet::where('statut', 'trouve')->count();
        $restitues = Objet::where('statut', 'restitue')->count();

        return [
            'total' => $total,
            'perdus' => $perdus,
            'retrouves' => $retrouves,
            'restitues' => $restitues
        ];
    }

    public function search(Request $request)
{
    $search = $request->query('search', '');
    $category = $request->query('categorie_id', '');
    $statut = $request->query('statut', 'perdu');  // Par défaut 'perdu'
    $perPage = 10;

    $query = Objet::where('statut', $statut)
        ->when($search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('titre', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        })
        ->when($category, function ($query, $category) {
            return $query->where('categorie_id', $category);
        });

    // Récupérer les objets et appliquer la pagination
    $objets = $query->paginate($perPage);

    // Retourner la vue appropriée selon le statut
    if ($statut === 'perdu') {
        return response()->json([
            'html' => view('objets.objetPerdus', ['objets' => $objets])->render(),
            'pagination' => $objets->links()->toHtml(),
        ]);
    } else {
        return response()->json([
            'html' => view('objets.objetRetrouve', ['objets' => $objets])->render(),
            'pagination' => $objets->links()->toHtml(),
        ]);
    }
}


    }
    
