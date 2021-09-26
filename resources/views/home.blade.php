@extends('layout')

@section('content')
    <h3>Home Page</h3>


    @foreach($data  as $key => $value)
    {{$key .' = '. $value}}

    @endforeach

@endsection
