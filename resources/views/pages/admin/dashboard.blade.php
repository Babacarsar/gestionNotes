@extends('layouts.master')
@section('page_title', Mon Tableau de bord')

@section('content')
    <h2>WELCOME {{ Auth::user()->name }}. Voici votre Tableau de Bord</h2>
    @endsection