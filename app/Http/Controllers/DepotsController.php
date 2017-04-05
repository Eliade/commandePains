<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Depot;
use App\Produit;
use Illuminate\Http\Request;
use Mockery\Exception;

class DepotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depots = Depot::all();
        return view('depot.index',['depots'=>$depots]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('depot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nomDepot = $request->get('nomDepot');
        $depot = new Depot();
        $depot->setAttribute('nom',$nomDepot);
        $depot->save();

        return redirect()->action('DepotsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function show(Depot $depot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function edit(Depot $depot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depot $depot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depot $depot)
    {

        // Recherche des commandes liées au dépot
        $commandes = Commande::where("depot_id", $depot->id)->get();

        // Détache les produits liés aux commandes trouvées, et supprime la commande
        foreach ($commandes as $commande){
            $commande->produits()->detach();
            $commande->save();
            $commande->delete();
        }

        // Supprime le dépot en BDD
        $depot->delete();




    }
}
