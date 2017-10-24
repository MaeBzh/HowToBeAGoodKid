@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ajouter un enfant</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('nouvelEnfant') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
                                <label for="prenom" class="col-md-4 control-label">Prénom</label>

                                <div class="col-md-6">
                                    <input id="prenom" type="text" class="form-control" name="prenom"  required autofocus>

                                    @if ($errors->has('prenom'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
                                <label for="pseudo" class="col-md-4 control-label">Pseudo</label>

                                <div class="col-md-6">
                                    <input id="pseudo" type="text" class="form-control" name="pseudo"  required autofocus>

                                    @if ($errors->has('pseudo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pseudo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('date_naissance') ? ' has-error' : '' }}">
                                <label for="date_naissance" class="col-md-4 control-label">Date de naissance</label>

                                <div class="col-md-6">
                                    <input id="date_naissance" type="date" class="form-control" name="date_naissance" required autofocus>

                                    @if ($errors->has('date_naissance'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('date_naissance') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sexe') ? ' has-error' : '' }}">
                                <label for="sexe" class="col-md-4 control-label">Sexe</label>

                                <div class="col-md-6">
                                    <select class="custom-select" name="sexe" id="sexe">
                                        <option value="fille" selected>Fille</option>
                                        <option value="garcon" >Garçon</option>
                                    </select>
                                    @if ($errors->has('sexe'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sexe') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Valider
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
