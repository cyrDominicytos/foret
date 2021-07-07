@extends('layouts.app')


@section('third_party_stylesheets')
 
@endsection



@section('content')
<!-- titre -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4"></div>
          <div class="col-sm-6">
            @if($details === "toute")   
            <h1 class="m-0">TOUTES VOS PROCEDURES</h1>
            @elseif($details === "traitement")
            <h1 class="m-0">PROCEDURES EN TRAITEMENT</h1>
            @elseif($details === "fermees")
            <h1 class="m-0">PROCEDURES FERMÉES</h1>
            @elseif($details === "rejetees")
            <h1 class="m-0">PROCEDURES REJETEES</h1>
            @endif
          </div><!-- /.col -->
          <div class="col-sm-3">
            <!--<ol class="breadcrumb float-sm-right">-->
              <!--<li class="breadcrumb-item"><a href="#">Espce de travail</a></li>-->
              <!--<li class="breadcrumb-item active">Tableau de bord</li>-->
            <!--</ol>-->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
<!-- data table -->
    <div id="app">
        @include('flash_message')


        @yield('content')
    </div>
 @include('layouts.procedure.liste_procedure')

@endsection



@section('third_party_scripts')

@endsection

