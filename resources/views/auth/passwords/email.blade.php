@extends('layouts.login_master') // Étend le layout 'login_master' pour inclure les éléments communs

@section('content') // Section spécifique du contenu de la page
    <div class="page-content login-cover">

        <div class="content-wrapper">
    <div class="content d-flex justify-content-center align-items-center"> // Contenu centré

        <!-- Password recovery form -->
        <form class="login-form" method="POST" action="{{ route('password.email') }}"> // Formulaire de récupération de mot de passe avec méthode POST qui soumet les données à la route 'password.email'
            @csrf // Protection CSRF
            <div class="card mb-0"> // Carte utilisée pour afficher le formulaire
                <div class="card-body">

                    @if (session('status')) // Vérifie si une session 'status' existe
                        <div class="alert alert-success" role="alert"> // Alerte de réussite
                            {{ session('status') }} // Affiche le contenu de la session 'status'
                        </div>
                    @endif
                        @if ($errors->has('email')) // Vérifie si des erreurs existent pour le champ d'e-mail
                            <div class="alert alert-danger" role="alert"> // Alerte de danger
                                {{ $errors->first('email') }} // Affiche la première erreur pour le champ d'e-mail
                            </div>
                        @endif

                    <div class="text-center mb-3">
                        <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i> // Icône affichée
                        <h5 class="mb-0">récupération de mot de passe</h5> // Titre du formulaire
                        <span class="d-block text-muted">Nous vous enverrons des instructions par e-mail</span> // Description du formulaire
                    </div>

                    <div class="form-group ">
                        <input name="email" required type="email" class="form-control" value="{{ old('email') }}" placeholder="Your email"> // Champ d'e-mail avec valeur par défaut et message de placeholder
                    </div>

                    <button type="submit" class="btn bg-blue btn-block"><i class="icon-spinner11 mr-2"></i> Reinitialiser le mot de passe</button> // Bouton de soumission du formulaire
                </div>
            </div>
        </form>
        <!-- /password recovery form -->

    </div>
    </div>
    </div>
@endsection // Fin de la section 'content'
