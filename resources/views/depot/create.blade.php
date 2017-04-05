@include('depot.header')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>commandes de pain</h1>
            <h2>Ajout d'un dépot</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

          {{Form::open()}}
            <div class="form-group">
                {{Form::label('Nom du dépot')}}
                {{Form::text('nomDepot','nom du dépot',array('class' => 'form-control'))}}
            </div>
            {{Form::submit('Envoyer',array('class' => 'btn btn-success'))}}
          {{Form::close()}}
        </div>
    </div>
</div>

@include('depot.footer')