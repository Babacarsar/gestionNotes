@extends('layouts.login_master') // Étend le layout 'login_master' pour inclure les éléments communs

@section('content') // Section spécifique du contenu de la page
    <div class="page-content login-cover">

        <div class="content-wrapper">
            <div class="content row justify-content-center"> // Contenu avec rangée centrée
                <div class="col-md-6"> // Colonne de taille moyenne pour le contenu principal
                    <div class="card"> // Carte utilisée pour afficher le formulaire
                        <div class="card-header">
                            <h3 class="card-title">réinitialiser le mot de passe</h3> // Titre de la carte
                            <hr> // Ligne horizontale
                            @if($errors->any()) // Vérifie s'il y a des erreurs
                                <div class="alert alert-danger border-0 alert-dismissible"> // Alerte de danger
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button> // Bouton de fermeture

                                    @foreach($errors->all() as $er) // Boucle sur toutes les erreurs
                                        <span><i class="icon-arrow-right5"></i> {{ $er }}</span> <br> // Affiche chaque erreur
                                    @endforeach

                                </div>
                            @endif
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}"> // Formulaire avec méthode POST qui soumet les données à la route 'password.update'
                                @csrf // Protection CSRF

                                <input type="hidden" name="token" value="{{ $token }}"> // Champ caché contenant le jeton de réinitialisation

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Adresse email') }}</label> // Étiquette du champ d'e-mail

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ $email ?? old('email') }}" required autofocus> // Champ d'e-mail avec validation d'erreur

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label> // Étiquette du champ de mot de passe

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" required> // Champ de mot de passe avec validation d'erreur

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Confirmer mot de passe') }}</label> // Étiquette du champ de confirmation du mot de passe

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required> // Champ de confirmation du mot de passe
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('réinitialiser le mot de passe') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection // Fin de la section 'content'
