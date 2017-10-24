@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$enfant->pseudo}}</div>
                <form class="form-horizontal" method="POST" action="{{ route('redToken', ['pseudo' => $enfant->pseudo]) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-danger">
                            </button>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" method="POST" action="{{ route('greenToken', ['pseudo' => $enfant->pseudo]) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-success">
                            </button>
                        </div>
                    </div>
                </form>

                <div class="col-md-8">num semaine : {{ $semaine->num_semaine }}</div>

                @for ($i = 0; $i < $semaine->nb_rouge; $i++)
                    <span class="alert alert-danger"> - </span>
                @endfor
                @for ($i = 0; $i < $semaine->nb_vert; $i++)
                    <span class="alert alert-success"> + </span>
                @endfor

                <div class="col-md-8">rouge : {{ $semaine->nb_rouge }}</div>
                <div class="col-md-8">vert : {{ $semaine->nb_vert }}</div>

            </div>
        </div>
    </div>
</div>
@endsection
