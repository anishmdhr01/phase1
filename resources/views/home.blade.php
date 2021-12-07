@extends('layouts.master')

@section('content')
    <h2>Welcome
        @if(session()->has('session'))
            {{session()->get('session')}}
        @endif
    </h2>
@endsection