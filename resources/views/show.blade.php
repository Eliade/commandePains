@include('header')
<div class="container">
    <div class="row">
        <div class="col-lg-12">

        <h1>Commande de {{$commande->prenom}} {{$commande->nom}} </h1>
        <h2>Dépot de : {{$commande->depot->nom}}</h2>
        <H3>Email : {{$commande->email}}</H3>
        @if($commande->archive)
                <h4>Cette commande est archivé</h4>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <td>NOM</td>
                    <td>quantité</td>
                </tr>
            </thead>
            <tbody>
        @foreach($commande->produits as $article)
            @if($article->pivot->qte > 0)
                <tr>
                    <td>{{$article->nom}}</td>
                    <td>{{$article->pivot->qte}}</td>
                </tr>
            @endif

        @endforeach
            </tbody>
        </table>
        </div>
        {{Form::open(array('route' => array('commandeArchive', $commande->id)))}}
        {{Form::submit('Archiver',['class' => 'btn btn-primary'])}}
        {{Form::close()}}

        @if($commande->archive)
            {{Form::open(array('route' => array('commandeUnArchive', $commande->id)))}}
            {{Form::submit('desarchiver',['class' => 'btn btn-danger'])}}
            {{Form::close()}}
        @endif
    </div>
</div>
@include('footer')