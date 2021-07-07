@extends('layouts.app')


@section('third_party_stylesheets')
 
@endsection



@section('content')
 @include('flash_message')
   @include($link)
@endsection



@section('third_party_scripts')

@endsection
