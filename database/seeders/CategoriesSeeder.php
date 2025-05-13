<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SousCategorie;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronique' => ['Téléphones', 'Ordinateurs', 'Accessoires'],
            'Documents' => ['Carte d’identité', 'Passeport', 'Permis de conduire'],
            'Accessoires' => ['Montres', 'Sacs', 'Lunettes'],
            'Vêtements' => ['Chaussures', 'Vestes', 'Pantalons'],
            'Mobilier' => ['Chaises', 'Tables', 'Lits']
        ];

        foreach ($categories as $nom => $sous_categories)
        {
            $categorie = Category::create(['nom' => $nom]);

            foreach ($sous_categories as $sous_nom) {
                SousCategorie::create([
                    'nom' => $sous_nom,
                    'categorie_id' => $categorie->id
                ]);
            }
        }
    }
}
