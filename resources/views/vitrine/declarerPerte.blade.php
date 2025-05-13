@extends('vitrine.layouts.app')

@section('title', 'Déclarer un Bien Perdu')

@section('content')


   <!--- =====================================CSS======================================= -->
   @include('vitrine.partials.declarations.perte.link')

   
<!-- ========================================bannière================================== -->
   @include('vitrine.partials.declarations.perte.Banniere')


<!-- =======================================alert================================== -->
    @include('vitrine.partials.declarations.perte.alerts')


<!-- ===================================Form Section================================ -->
    @include('vitrine.partials.declarations.perte.form')



<!-- ===============================Script===========================-->
@include('vitrine.partials.declarations.perte.scripts')



@endsection