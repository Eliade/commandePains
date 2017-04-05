<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    public function produits()
    {
        return $this->belongsToMany('App\Produit')->withPivot('qte');
    }

    public function depot()
    {
        return $this->belongsTo('App\Depot');
    }


}
