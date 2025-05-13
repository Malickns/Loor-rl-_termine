
@extends('vitrine.layouts.app')

@section('title', 'À propos')

@section('content')

<!---===========================================CSS===============================-->
@include('vitrine.partials.apropos.link')

<!-- =====================================Bannière================================= -->
@include('vitrine.partials.apropos.banner')


<!-- =====================================Notre Équipe================================= -->
@include('vitrine.partials.apropos.team')
  

 <!--=================================== Notre constat==================================== -->
@include('vitrine.partials.apropos.constat')
    

<!--================================= Solution Section ===================================-->
@include('vitrine.partials.apropos.solution')
    

<!-- ================================ Impact Section ======================================-->
@include('vitrine.partials.apropos.impact')
    
  
<!--=================================== Script JS ===================================-->
@include('vitrine.partials.apropos.script')
@endsection