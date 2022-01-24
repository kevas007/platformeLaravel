<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    public function entreprises()
    {
        return $this->belongsTo(Entreprise::class,'entreprises_id');
    }
    public function statutTaches()
    {
        return $this->hasOne(StatutTache::class,'id','statut_taches_id');
    }
}
