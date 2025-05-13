@extends('vitrine.layouts.app')

@section('title', 'Barkéélou')

@section('content')


<!---===========================================Bannière===============================-->
@include('vitrine.partials.princing.bannier')
<div class="pricing-wrapper">
    <!-- Hero Section -->
    
<!-- =====================================Bannière================================= -->
@include('vitrine.partials.princing.communaute')

<!-- ==============================Tarifs===================================== -->
@include('vitrine.partials.princing.tarifs')    

<!--========================== FAQ Section ==================================-->
@include('vitrine.partials.princing.faq')    
</div>

<!--===================================CSS====================================-->
@include('vitrine.partials.princing.link')

<!--=================================== Script JS ===================================-->
@include('vitrine.partials.princing.script')

@endsection