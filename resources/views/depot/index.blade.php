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
            <table class="table table-responsive">
                <thead>
                <tr>
                    <td>id</td>
                    <td>nom</td>
                    <td>Editer</td>
                    <td>Supprimer</td>

                </tr>
                </thead>
                <tbody>
                @foreach($depots as $depot)
                    <tr>
                        <td>{{$depot->id}}</td>
                        <td>{{$depot->nom}}</td>
                        <td><a href="" class="btn btn-warning">editer</a></td>
                        <td>{{Form::open(['method' => 'DELETE', 'route' => ['depotsDestroy', $depot]])}}{{Form::submit('supprimer',array('class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure?')"))}}{{Form::close()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('footer')