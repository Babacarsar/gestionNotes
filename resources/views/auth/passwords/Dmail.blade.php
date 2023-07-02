@extends('layouts.app') // Étend le layout 'app' pour inclure les éléments communs

@section('content') // Section spécifique du contenu de la page
<div class="container">
    <div class="row justify-content-center"> // Crée une rangée centrée
        <div class="col-md-8"> // Colonne de taille moyenne pour le contenu principal
            <div class="card"> // Carte utilisée pour afficher le formulaire
                <div class="card-header">{{ __('Reset Password') }}</div> // En-tête de la carte

                <div class="card-body"> // Corps de la carte
                    @if (session('status')) // Vérifie si une session 'status' existe
                        <div class="alert alert-success" role="alert"> // Alerte de réussite
                            {{ session('status') }} // Affiche le contenu de la session 'status'
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}"> // Formulaire avec méthode POST qui soumet les données à la route 'password.email'
                        @csrf // Protection CSRF

                        <div class="form-group row"> // Groupe de champs de formulaire dans une rangée
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> // Étiquette du champ d'e-mail

                            <div class="col-md-6"> // Colonne de taille moyenne pour le champ d'e-mail
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required> // Champ d'e-mail avec validation d'erreur

                                @if ($errors->has('email')) // Vérifie si des erreurs existent pour le champ d'e-mail
                                    <span class="invalid-feedback" role="alert"> // Affiche les erreurs
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0"> // Groupe de champs de formulaire dans une rangée avec une marge inférieure de 0
                            <div class="col-md-6 offset-md-4"> // Colonne de taille moyenne décalée vers la droite de 4 colonnes
                                <button type="submit" class="btn btn-primary"> // Bouton de soumission du formulaire
                                    {{ __('Send Password Reset Link') }} // Texte du bouton
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection // Fin de la section 'content'
