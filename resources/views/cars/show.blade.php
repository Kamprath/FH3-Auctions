@php /** @var \App\Contracts\Car $car */ @endphp

@extends('app')

@section('content')
    <section class="hero is-dark">
        <div class="hero-body">
            <div class="container">
                <p class="title">
                    <i class="fa fa-car"></i>&nbsp;
                    {{ $car->year }} {{ $car->make }} {{ $car->model }}
                    <button class="button is-primary" style="float: right;"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Auction</button>
                </p>
            </div>
        </div>
    </section>

    <section class="section">
        <nav class="level">
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Avg. Buy Price</p>
                    <p class="title">$20,000</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Avg. Sell Price</p>
                    <p class="title">$76,000</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">ROI</p>
                    <p class="title">6%</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Total Profit</p>
                    <p class="title">$213,500</p>
                </div>
            </div>
        </nav>
    </section>

    <section class="section">
        <h1 class="title">Auctions</h1>

        @if (count($car->auctions) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Transaction</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th></th>
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
                            <td>
                                <a class="button is-secondary is-small" href="{{ route('auctions.edit', ['id' => $auction->id]) }}">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="has-text-centered">There are no auctions for this car.</p>
        @endif
    </section>
@endsection