<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    
    protected $fillable = ['nom_voiture', 'boite', 'tarif', 'puissance', 'dispo'];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
