@include('header')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>commandes de pain</h1>
            <h2>boulangerie Charrier</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-2 col-lg-8">
        {!! Form::open(array('method'=>'POST')) !!}
            <div class="form-section">
                <h2>Informations personnelles</h2>
                <div class="form-group">
                    {{Form::label('nom')}}
                    {{Form::text('nom','',array('placeholder' => 'nom', 'class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{Form::label('prenom')}}
                    {{Form::text('prenom','',array('placeholder' => 'prenom', 'class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{Form::label('email')}}
                    {{Form::text('email','',array('placeholder' => 'email', 'class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{Form::label('dépot')}}
                    {{Form::select('depot',$depots,null,array('class' => 'form-control','placeholder' => 'Selectionner un dépot'))}}
                </div>


            </div>
            <div ng-app="commande" class="form-section">
                <h2>Produits</h2>
                <div class="form-group">
                    {{Form::label('produit')}}
                    <table class="col-lg-12 table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>produits</td>
                                <td>prix</td>
                                <td>quantité</td>
                                <td>total</td>

                            </tr>
                        </thead>
                    @foreach($produits as $produit)

                        <tr>
                            <td class="hidden">{{Form::hidden('product_'.$produit->id,$produit->id)}}</td>
                            <td>{{$produit->nom}}</td>
                            <td>{{$produit->prixTtc}} Euros</td>
                            <td>{!! Form::number('qte_'.$produit->id,0,array('min' => 0)) !!}</td>
                            <td></td>
                        </tr>
                    @endforeach

                    </table>

                </div>
                {{Form::submit('Envoyer',array('class' => 'btn btn-success'))}}
            </div>

        {!! Form::close() !!}
            </div>
    </div>
</div>
@include('footer')