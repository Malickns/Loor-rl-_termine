<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class utilisateur extends Model
{
    protected $fillable = [
        'prenom', 'nom', 'email', 'password', 'role', 'etat', 'photo'
    ];

    // Méthode pour enregistrer un utilisateur
    public static function createUser($prenom, $nom, $email, $password, $role, $etat, $photo = null)
    {
        return self::create([
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $role,
            'etat' => $etat,
            'photo' => $photo,
        ]);

        
    }

   
}