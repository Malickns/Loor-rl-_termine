@extends('vitrine.layouts.app')

@section('title', 'Contact')

@section('content')

<!-- ===============================CSS =========================== -->
@include('vitrine.partials.contact.link')

<!-- ===============================bannière=========================== -->
@include('vitrine.partials.contact.banniere')



    <!-- ============================Section FAQ========================-->
    @include('vitrine.partials.contact.faq')
    

    <!-- ===================Section Formulaire de Contact================== -->
   @include('vitrine.partials.contact.formContact')

   <!-- ===============================script =========================== -->

    @include('vitrine.partials.contact.script')


@endsection