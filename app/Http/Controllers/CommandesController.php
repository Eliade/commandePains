<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Depot;
use App\Produit;
use App\Quantites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Monolog\Logger;

class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$commandes = Commande::all()->where('archive','<>',1);
        $commandes = Commande::paginate(15);

        return view('index',array('commandes' => $commandes));
    }

    public function indexDepot($depot)
    {
        $commandes = Commande::all()->where('depot_id','=',$depot);
        $depot = Depot::find($depot);
        return view('index',array('commandes' => $commandes,'depot' => $depot));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produits = Produit::all();
        $depots = Depot::all()->pluck('nom','id');
        return view('create',['depots'=> $depots,'produits'=> $produits]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idDepot = $request->get('depot');
        $commande = new Commande();
        $commande->setAttribute('nom',$request->get('nom'));
        $commande->setAttribute('prenom',$request->get('prenom'));
        $commande->setAttribute('email',$request->get('email'));
        $depot = Depot::find($idDepot);
        $commande->depot()->associate($depot)->save();
        for($i = 1; $i < 4; $i++ ){
            $produit = Produit::find($request->get('product_'.$i));
            $quantiteName = 'qte_'.$i;
            $commande->produits()->save($produit,['qte'=>$request->get($quantiteName)]);
        }

        return redirect()->action('CommandesController@index');
        //return view('total',array('commande'=> $commande));




    }

    public function archive($id){
        $commande = Commande::find($id);
        $commande->setAttribute('archive',1);
        $commande->save();

        return redirect()->action('CommandesController@show',[$id]);

    }

    public function unArchive($id){
        $commande = Commande::find($id);
        $commande->setAttribute('archive',null);
        $commande->save();

        return redirect()->action('CommandesController@show',[$id]);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commande = Commande::find($id);
        return view('show',['commande' => $commande]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ajaxDestroy($request)
    {
        //
    }
}
