@extends('vitrine.layouts.app')

@section('title', 'Accueil')

@section('content')




    <!--====================================== Liens CSS ======================= -->
    @include('vitrine.partials.acceuil.link')
        
    <!--====================================== Chargement ======================= -->
    @include('vitrine.partials.acceuil.chargement')

    <!-- =====================================  TopBar ======================== -->
   
    @include('vitrine.partials.acceuil.topbar')

    <!--====================================== About ======================= -->
    @include('vitrine.partials.acceuil.about')

     <!--====================================Alert de déconnexion========================== -->
     @include('vitrine.partials.acceuil.alert')


   <!--====================================== Derniers Objets perdus ou retrouvés ======================= -->
   @include('vitrine.partials.acceuil.services')
    
   
    <!--====================================== Etapes des Déclarations de biens perdus ou retrouvés ======================= -->
   @include('vitrine.partials.acceuil.feature')

    
    <!--====================================== Team======================= -->
    @include('vitrine.partials.acceuil.team')
   
    <!--====================================== CContact ======================= -->
    @include('vitrine.partials.acceuil.contact')
    
    
    <!--====================================== Commentaires ======================= -->
    @include('vitrine.partials.acceuil.commentaires')

   

     <!--====================================== JavaScript Libraries ======================= -->
     @include('vitrine.partials.acceuil.script')

@endsection