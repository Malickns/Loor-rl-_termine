@extends('vitrine.layouts.app')

@section('title', 'Objets Perdus')

@section('content')


<!--=================================Css=================================--> 
@include('vitrine.partials.annonces.perte.links')

<!-- =================================Banner ===============================-->
@include('vitrine.partials.annonces.perte.banner')

<!-- =================================Filters ==============================-->
@include('vitrine.partials.annonces.perte.filters')


<!-- ==================================Items Grid ===========================-->
@include('vitrine.partials.annonces.perte.ItemsGrid')
@endsection

<!--=================================javascript=================================-->
@include('vitrine.partials.annonces.perte.scripts')