@extends('layout.master')

@section('content')

<h1> This is payment form page </h1>


<a href="{{route('postBuildingRegister',['building'=> $building]) }}">Pay 100din </a>

@endsection