<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['voiture_id', 'client_id', 'date_depart', 'date_retour', 'lieu_depart', 'lieu_retour', 'assurance', 'payement'];

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
