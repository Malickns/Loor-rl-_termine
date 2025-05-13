

@extends('admin.layouts.app')

@section('title', 'Utilisateurs')

@section('content')


<!--=====================CSS======================-->
@include('admin.partials.accueil.link')


<!-- Section Content -->
<div class="admin-section">
    <!--================================ Section Header ==================-->
    @include('admin.partials.accueil.titre')
    
    <!-- ===================================Statistiques=================== -->
    @include('admin.partials.accueil.statistiques')
    
    <!--================================= List Admins  =======================-->
    @include('admin.partials.accueil.list')
</div>




<!-- ===========================Ajouter Un Admin================ -->
@include('admin.partials.accueil.form')





@endsection 