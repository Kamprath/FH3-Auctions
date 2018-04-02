@php /** @var \App\Contracts\Car[] $cars */ @endphp

@extends('app')

@section('content')
    <table class="table is-striped">
        <thead>
            <tr>
                <th>Car</th>
                <th>Price</th>
                <th>Auctions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>
                        <a href="{{ route('cars.show', ['id' => $car->id]) }}">{{ $car->year }} {{ $car->make }} {{ $car->model }}</a>
                    </td>
                    <td>${{ number_format($car->price) }}</td>
                    <td>{{ count($car->auctions) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection