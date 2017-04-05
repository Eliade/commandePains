@include('header')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>commandes de pain</h1>
            <h2>boulangerie Charrier</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td>archiver</td>
                        <td>num com</td>
                        <td>nom</td>
                        <td>prénom</td>
                        <td>depot</td>
                        <td>e-mail</td>
                        <td>created</td>

                    </tr>
                </thead>
                <tbody>

                @foreach($commandes as $commande)
                    <tr>
                        <td name="arch"><input  type="checkbox" data-id={{$commande->id}}></td>
                        <td><a href="{{ route('showCommande',['id'=>$commande->id]) }}">{{$commande->id}}</a></td>
                        <td>{{$commande->nom}}</td>
                        <td>{{$commande->prenom}}</td>
                        <td>{{$commande->depot->nom or ''}}</td>
                        <td>{{$commande->email}}</td>
                        <td>{{$commande->created_at}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@include('footer')