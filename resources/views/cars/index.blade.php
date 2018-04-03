@extends('app')

@section('content')
    <car-list v-bind:cars="{{ json_encode($cars) }}">
@endsection