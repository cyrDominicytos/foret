
@extends('layouts.app')


@section('third_party_stylesheets')
 
@endsection



@section('content')
<!-- titre -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <div class="col-sm-12">
            <h1 style="text-align: center;" class="m-0">PROCEDURES EN ATTENTES D'EMBARQUEMENT</h1>        
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
<!-- data table -->
    <div id="app">
        @include('flash_message')

        @yield('content')
    </div>
 @include('layouts.liquidation.liste_liquidation')

@endsection



@section('third_party_scripts')

@endsection

