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
                <tr>
                    <td><input id="sAll" type="checkbox"></td>
                </tr>
                @foreach($commandes as $commande)
                    <tr>
                        <td name="arch"><input  type="checkbox" data-id={{$commande->id}}></td>
                        <td><a href="{{ route('showCommande',['id'=>$commande->id]) }}">{{$commande->id}}</a></td>
                        <td>{{$commande->nom}}</td>
                        <td>{{$commande->prenom}}</td>
                        <td>{{$commande->email}}</td>
                        <td>{{$commande->depot->nom or ''}}</td>
                        <td>{{$commande->created_at}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <input class="btn btn-success" id="archiBtn" value="archiver" type="submit">
            <div class="tokenAll">{{Form::token()}}</div>
        </div>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script>
    var ids =[];
    $('#sAll').click(function(event) {
        if(this.checked) {
            // Iterate each checkbox

            $(':checkbox').each(function() {
                if($(this).data('id') != undefined){
                    ids.push( $(this).data('id'));
                }

                this.checked = true;
            });
        }
        else{
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });


    $('#archiBtn').click(function(e){
        e.preventDefault();

        var tokenAll = $('.tokenAll input').val();

            $.ajax({

                url: 'commande/deletes',
                type: "DELETE",
                data: {_method: 'delete',_token :tokenAll},
                success: function(data){
                    console.log(data);

                }
            });
    });
</script>
@include('footer')