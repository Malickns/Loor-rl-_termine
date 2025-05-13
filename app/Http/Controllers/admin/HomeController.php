<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Http\Controllers\ObjetController;
use App\Models\utilisateur;
use App\Models\objet;



class HomeController extends Controller
{
    public function index()
    {
        $utilisateurs = utilisateur::all();
        return view('admin.index', compact('utilisateurs'));
    }

   

  

    public function message()
    {
        return view('admin.message');
    }

    public function notification()
    {
        return view('admin.notification');
    }

    public function bien()
    {
        // Récupérer les statistiques depuis ObjetController
        $objetController = new ObjetController();
        $statistiques = $objetController->getStatistiques();

        // Passer les statistiques à la vue
        return view('admin.bien', compact('statistiques'));
    }

   
    public function partage()
    {
        $objets = Objet::all();
        return view('admin.partage', compact('objets'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function signalement()
    {
        return view('admin.signalement');
    }

    public function statistique()
    {
        return view('admin.statistique');
    }

    public function utilisateur()
    {
        //définissons une variable $utilisateurs qui contiendra la liste des utilisateurs
        $utilisateurs = utilisateur::all();
        return view('admin.utilisateur', compact('utilisateurs') );
    }
}
