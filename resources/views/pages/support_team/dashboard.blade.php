@extends('layouts.master')
@section('page_title', 'Tableau de bord')
@section('content')

    @if(Qs::userIsTeamSA())
       <div class="row">
           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-purple-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                       <a href="http://127.0.0.1:8000/students/create"><h3 class="mb-0">{{ $users->where('user_type', 'student')->count() }}</h3></a>
                           <span class="text-uppercase font-size-xs font-weight-bold">Total Elèves</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users4 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-warning-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                       <a href="http://127.0.0.1:8000/students/create"><h3 class="mb-0">{{ $users->where('user_type', 'teacher')->count() }}</h3> </a>
                           <span class="text-uppercase font-size-xs">Total Professeurs
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users2 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
    <div class="card card-body bg-pink-400 has-bg-image">
        <div class="media">
            <div class="mr-3 align-self-center">
                <i class="icon-windows2 icon-3x opacity-75"></i>
            </div>

            <div class="media-body text-right">
                <a href="http://127.0.0.1:8000/sections/create"><h3 class="mb-0">{{ $sections->count() }}</h3></a>
                <span class="text-uppercase font-size-xs">Total Classes</span>
            </div>
        </div>
    </div>
</div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-brown-400 has-bg-image">
                   <div class="media">
                       <div class="mr-3 align-self-center">
                           <i class="icon-user icon-3x opacity-75"></i>
                       </div>

                       <div class="media-body text-right">
                       <a href="http://127.0.0.1:8000/students/create"><h3 class="mb-0">{{ $users->where('user_type', 'parent')->count() }}</h3></a>
                           <span class="text-uppercase font-size-xs">Total Parents</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       @endif

    {{--Events Calendar Begins--}}
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Calendrier </h5>
         {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="fullcalendar-basic"></div>
        </div>
    </div>
    {{--Events Calendar Ends--}}
    @endsection
