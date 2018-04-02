@php /** @var \App\Contracts\Car $car */ @endphp

@extends('app')

@section('content')
    <section class="hero is-dark">
        <div class="hero-body">
            <div class="container">
                <p class="title">
                    {{ $car->year }} {{ $car->make }} {{ $car->model }}
                    <button class="button is-primary" style="float: right;"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Auction</button>
                </p>
            </div>
        </div>
    </section>

    <section class="section">
        @if (count($car->auctions) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($car->auctions as $auction)
                        <tr>
                            <td>{{ $auction->buy_price > 0 ? 'Purchase' : 'Sale' }}</td>
                            <td>
                                {!! $auction->sell_price > 0 ? '&nbsp;' : '-'!!}${{ number_format($auction->buy_price > 0 ? $auction->buy_price : $auction->sell_price) }}
                            </td>
                            <td>{{ $auction->created_at->format('F jS g:iA') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="has-text-centered">There are no auctions for this car.</p>
        @endif
    </section>
@endsection