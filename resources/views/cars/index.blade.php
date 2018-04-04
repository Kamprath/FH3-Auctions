@extends('app')

@section('content')
    <car-list :cars="{{ json_encode($cars) }}"></car-list>
@endsection