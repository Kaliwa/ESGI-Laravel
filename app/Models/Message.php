<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        // Ajoutez d'autres colonnes ici au besoin
    ];

    // Exemple de relation avec l'utilisateur qui a créé le post
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Exemple de méthode pour obtenir le formatage de la date
    public function getFormattedDate()
    {
        return $this->created_at->format('d/m/Y H:i:s');
    }
}
