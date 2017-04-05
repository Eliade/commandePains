@include('header')
<div class="container">
    <div class="row">
        <div class="col-lg-12">


<h1>commande acceptée</h1>

<h2>{{$commande->nom}} - {{$commande->prenom}}</h2>
<h3>commande n°{{$commande->id}}</h3>
<table class="table">
    <thead>
    <tr>
        <td>nom</td>
        <td>quantité</td>
        <td>pu</td>
        <td>total</td>
    </tr>
    </thead>
    <tbody>
    @foreach($commande->produits()->get() as $produit)
        @if($produit->pivot->qte >0)
        <tr>

            <td>{{$produit->nom}}</td>
            <td>{{$produit->pivot->qte}}</td>
            <td>{{$produit->prixTtc}}</td>
            <td>0</td>
        </tr>
        @endif

    @endforeach
    </tbody>

</table>
        </div>
    </div>
</div>
@include('footer')