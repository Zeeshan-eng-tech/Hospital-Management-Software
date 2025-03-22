@extends ('layouts.app')
@section ('title','user dashboard')
@section ('zeeshan')

<h1>Hello {{ Auth::user()->name }}</h1>
 <!-- <h1>Hello sir</h1> -->
@endsection