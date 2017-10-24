@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tableau de bord</div>

                <div class="panel panel-default">

                    <div class="panel-body">

                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{ url('nouvel_enfant') }}" class="badge badge-primary">Ajouter un enfant</a>

                        </div>


                        @foreach($enfants as $enfant)
                            <div class="col-md-6 col-md-offset-3">
                                <a href="{{ url('enfant/'.$enfant->pseudo) }}" class="badge badge-primary">{{ $enfant->prenom }}</a>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
