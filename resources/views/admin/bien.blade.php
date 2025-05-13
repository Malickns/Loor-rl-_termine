@extends('admin.layouts.app')

@section('title', 'Gérer les biens')

@section('content')


<!--=====================CSS======================-->
@include('admin.partials.biens.link')

   
<!-- ===================Statistiques============== -->
@include('admin.partials.biens.statistiques')

<!-- =================Bouttons=========================== -->
@include('admin.partials.biens.bouttons')
        
    
<!--=========================== Liste des Biens ======================-->
@include('admin.partials.biens.list')
    </div>
    
    <!-- =======================Script============================ -->
    @include('admin.partials.biens.script')
   

    <!-- =======================Ajouter Un Bien======================= -->
    @include('admin.partials.biens.form')

   <!-- ======================= Script ======================= -->
    @include('admin.partials.biens.script')
@endsection 