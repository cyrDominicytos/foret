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
            <h1 style="text-align: center;" class="m-0">PROCEDURES EN ATTENTES DE VGM</h1>
            @elseif($details === "delivre")
            <h1 style="text-align: center;" class="m-0">LISTE DES VGM DELIVREES </h1>
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
 @include(($details === "attente") ? ('layouts.vgm.liste_procedure_vgm') : ('layouts.vgm.liste_vgm_delivre'))

@endsection



@section('third_party_scripts')

@endsection

