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
            <h1 style="text-align: center;" class="m-0">PROCEDURES EN ATTENTES DE BFU</h1>
            @elseif($details === "delivre")
            <h1 style="text-align: center;" class="m-0">LISTE DES BFU DELIVRES </h1>@elseif($details === "attente_usager")
            <h1 style="text-align: center;" class="m-0">LISTE DES BFU NON REGLES </h1>
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
 @include(($details === "attente" || $details === "attente_usager") ? ('layouts.bfu.procedure_attente_bfu') : ('layouts.bfu.procedure_bfu_recu'))

@endsection



@section('third_party_scripts')

@endsection

