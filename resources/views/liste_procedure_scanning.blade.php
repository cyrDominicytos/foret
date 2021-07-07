@extends('layouts.app')


@section('third_party_stylesheets')
 
@endsection



@section('content')
<!-- titre -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <div class="col-sm-12">
            @if($details === "attente")   
            <h1 style="text-align: center;" class="m-0">PROCEDURES EN ATTENTES DE SCANNING</h1>
            @elseif($details === "conforme")
            <h1 style="text-align: center;" class="m-0">LISTE DES SCANNING CONFORMES</h1>
            @elseif($details === "non_conforme")
            <h1 style="text-align: center;" class="m-0">LISTE DES SCANNING NON CONFORMES</h1>
            @endif
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
<!-- data table -->
    <div id="app">
        @include('flash_message')


        @yield('content')
    </div>
  @include(($details === "conforme") ? ('layouts.scanning.liste_procedure_scanning_conforme') : ('layouts.scanning.liste_procedure_scanning'))

@endsection



@section('third_party_scripts')

@endsection

