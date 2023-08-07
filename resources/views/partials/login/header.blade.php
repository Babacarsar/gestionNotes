<!-- Main navbar -->
<style>
    /* Barre de navigation rouge */
    .custom-navbar-blue {
        background-color: blue ; /* Couleur de fond rouge */
        color: white; /* Couleur du texte blanc */
    }
</style>
<div class="navbar navbar-expand-md custom-navbar-blue navbar-dark">
    <div class="mt-2 mr-5">
        <a href="{{ route('dashboard') }}" class="d-inline-block">
        <h4 class="text-bold text-white center-text">{{ Qs::getSystemName() }}</h4> 
        </a>
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav ml-auto">
            <!-- Vos éléments de menu ici -->
        </ul>
    </div>
</div>
<!-- /main navbar -->

