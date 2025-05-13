<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nom']; // Ajoutez les colonnes nécessaires ici

    public function sousCategories()
    {
        // Le >hasMany Une catégorie peut avoir plusieurs sous-catégories
        return $this->hasMany(SousCategorie::class);
    }
    
}
