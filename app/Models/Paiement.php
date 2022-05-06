<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
            'client_id',
            'boutique_id',
            'mois_id',
            'prixp',
            'date'
            
    ];
}
