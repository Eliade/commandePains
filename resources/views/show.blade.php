Nom : {{$commande->nom}}<br>
Prenom : {{$commande->prenom}}<br>
Email : {{$commande->email}}<br>
<table class="table">
    <thead>
        <tr>
            <td>NOM</td>
            <td>quantité</td>
        </tr>
    </thead>
    <tbody>
@foreach($commande->produits as $article)

        <tr>
            <td>{{$article->nom}}</td>
            <td>{{$article->pivot->qte}}</td>
        </tr>


@endforeach
    </tbody>
</table>