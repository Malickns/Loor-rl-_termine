<?php


namespace App\Http\Controllers\Vitrine;

use App\Http\Controllers\Controller;

use App\Models\Category;

use App\Models\SousCategorie;

use App\Models\Objet;

use Illuminate\Http\Request;

use App\Models\UserController;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('vitrine.index');
    }

   
    public function apropos()
    {
        return view('vitrine.apropos');
    }

    public function declarerBienRetrouve()
    {
        $categories = Category::all();
        return view('vitrine.declarerBienRetrouve', compact('categories'));
    }

    public function declarerPerte()
    {
        //Ici, je Récupérer $catégories que je vais passé à ma view
        $categories = Category::all();
        return view('vitrine.declarerPerte', compact('categories'));
    }

    public function objetPerdus()
    {
        $categories = Category::all();
        $objets = Objet::where('statut', 'perdu')
                       ->orderBy('created_at', 'desc')
                       ->paginate(10);
        return view('vitrine.objetPerdus', compact('categories', 'objets'));
    }

    public function objetRetrouver()
    {
        $categories = Category::all();
        $objets = Objet::where('statut', 'retrouve')
                       ->orderBy('created_at', 'desc')
                       ->paginate(10);
        
        return view('vitrine.objetRetrouver', compact('categories', 'objets'));
    }

    public function contact()
    {
        return view('vitrine.contact');
    }

    public function barkeelou()
    {
        return view('vitrine.barkeelou');
    }


    public function getSousCategories($categorie_id)
{
    $sousCategories = SousCategorie::where('categorie_id', $categorie_id)->get();
    return response()->json($sousCategories);
}


public function showLoginForm()
    {
        return view('login.login'); // Vue située dans resources/views/login/login.blade.php
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            return response()->json(['success' => true], 200);
        }
    
        return response()->json(['success' => false, 'error' => 'Email ou mot de passe incorrect.'], 401);
    }
    
    



}
