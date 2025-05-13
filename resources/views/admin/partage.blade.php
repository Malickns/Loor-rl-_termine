
@extends('admin.layouts.app')

@section('title', 'partage')

@section('content')

<!--- ==========================CSS ========================= --->
@include('admin.partials.partages.link')

   <!--===== =====================Liste des objets===================== -->
   @include('admin.partials.partages.list')
    
    
    <!-- ===================================== Scripts ===================================== -->
    @include('admin.partials.partages.script')

@endsection 