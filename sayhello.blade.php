@extends('layouts.master')

@section('content')

<? var_dump($_SERVER); ?>

	@if($name == '')
    <h1>You have a name, yo</h1>
    @else
    <h1>Hello, {{{ $name }}}!</h1>
    @endif



@stop