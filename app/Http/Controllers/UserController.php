<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\utilisateur;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    private $utilisateur;

    public function __construct(utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;
    }
    /*public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }*/

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Vérifier si Super Admin
        if ($request->email === "malick@gmail.com" && $request->password === "Passer@123") {
            Session::put('id', 1);
            Session::put('nom', 'Malick Ndiaye');
            Session::put('email', $request->email);
            return redirect()->route('/admin')->with('success', 'Connexion réussie');
        }

        // Vérifier si utilisateur existe
        $user = $this->utilisateur->login($request->email, $request->password);

        if ($user) {
            Session::put('id', $user->id);
            Session::put('email', $user->email);
            Session::put('nom', $user->nom);

            if ($request->has('remember')) {
                // Créer un cookie
                cookie()->queue('remember_me', $user->id, 43200);
            }

            return redirect()->route('/admin')->with('success', 'Connexion réussie');
        }

        return redirect()->route('login')->with('error', 'Identifiants incorrects');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login')->with('success', 'Déconnexion réussie');
    }

    //Ajouter un utilisateur
    public function addUser_traitement(Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:SuperAdmin,Admin',
            'etat' => 'required|in:1,0',
            'photo' => 'nullable|image'
        ]);
    
        $utilisateur = utilisateur::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'etat' => $request->etat,
            'photo' => $request->hasFile('photo') ? $request->file('photo')->store('photos', 'public') : null,
        ]);
    
        return redirect()->route('admin.index')->with('success', 'Utilisateur ajouté avec succès');
    }
    

    //Afficher la liste des utilisateurs
   public function ListUser()
    {
        $utilisateurs = utilisateur::all();
        return view('admin.utilisateur', compact('utilisateurs'));
    }


    /*public function addUser_traitement (Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            //Le role doit être soit admin soit superAdmin
            'role' => 'required|in:admin,superAdmin',
            // L'etat doit être soit actif soit inactif
            'etat' => 'required|in:actif,inactif',
            //la photo n'est pas obligatoire
            'photo' => 'nullable|image'

        ]);

        $user = $this->user->addUser($request->prenom,
                                               $request->nom, 
                                               $request->email, 
                                               $request->password, 
                                               $request->role, 
                                               $request->etat, 
                                               $request->photo,
                                               //J'enregistre l'utilisateur ajouter dans la base de données avec save()
                                                $request->save()
                                               
                                               );

        if ($user) {
            return redirect()->route('admin.index')->with('success', 'Utilisateur ajouté avec succès');
        }

        return redirect()->route('admin.index')->with('error', 'Erreur lors de l\'ajout de l\'utilisateur');
    }*/
}
