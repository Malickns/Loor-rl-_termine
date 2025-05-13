<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function ShowLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
    
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Récupérer le nom de l'utilisateur connecté
            $userName = auth()->user()->prenom;
    
            return redirect()->route('admin.index')->with('success', "Bienvenue, $userName !");
        }
    
        return back()->withInput($request->only('email'));
    }
    

    // public function logout()
    public function logout(Request $request)
{
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Déconnexion réussie !');
}

}