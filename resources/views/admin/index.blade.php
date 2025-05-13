

@extends('admin.layouts.app')

@section('title', 'Administrateur')

@section('content')


<!--=====================CSS======================-->
@include('admin.partials.accueil.link')

<!-- ===================Suite Alert============== -->
@include('admin.partials.accueil.alert')

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

<!--=====================Java script ======================-->
@include('admin.partials.accueil.script')





@endsection 