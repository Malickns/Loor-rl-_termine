<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Objet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titre',
        'description',
        'categorie_id',
        'date_perte_trouvaille',
        'lieu_perte_trouvaille',
        'photo',
        'statut',
        'telephone',
    ];

    public function categorie()
    {
        return $this->belongsTo(Category::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
