<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public function commandes()
    {
        return $this->belongsToMany('App\Quantite')->withPivot('qte');
    }
}
