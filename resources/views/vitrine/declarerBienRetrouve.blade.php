@extends('vitrine.layouts.app')

@section('title', 'Déclarer un Bien Retrouve')

@section('content')

  
<!--=================================Css=================================-->
@include('vitrine.partials.declarations.retrouve.link')


<!-- ========================================bannière================================== -->
@include('vitrine.partials.declarations.retrouve.Banniere')


    <!-- =======================================alert================================== -->
    @include('vitrine.partials.declarations.retrouve.alerts')


<!-- ===================================Form Section================================ -->
@include('vitrine.partials.declarations.retrouve.form')


<!-- ===============================Script===========================-->
@include('vitrine.partials.declarations.retrouve.scripts')


@endsection