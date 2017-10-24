@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$enfant->pseudo}}</div>
                <div class="col-md-4 col-md-offset-2" ><button type="button" class="btn btn-success"></button></div>
                <div class="col-md-4 col-md-offset-2"><button type="button" class="btn btn-danger"></button></div>
                <div class="col-md-8">num semaine : {{ $semaine->num_semaine }}</div>
                <div class="col-md-8">rouge : {{ $semaine->nb_rouge }}</div>
                <div class="col-md-8">vert : {{ $semaine->nb_vert }}</div>

            </div>
        </div>
    </div>
</div>
@endsection
