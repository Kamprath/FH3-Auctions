@php /** @var \App\Contracts\Auction[] $auctions */ @endphp

@extends('app')

@section('content')
    <section class="hero is-dark">
        <div class="hero-body">
            <div class="container">
                <nav class="level">
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading">Total Expenses</p>
                            <p class="title">$213,500</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading">Total Revenue</p>
                            <p class="title">$20,000</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading">Net Profit</p>
                            <p class="title">$76,000</p>
                        </div>
                    </div>
                    <div class="level-item has-text-right">
                        <button class="button is-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Auction</button>

                    </div>
                </nav>
                {{--<p class="title">
                </p>--}}
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Transaction</th>
                        <th>Car</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($auctions as $auction)
                        <tr>
                            <td>
                                {{ $auction->buy_price > 0 ? 'Purchase' : 'Sale' }}
                            </td>
                            <td>
                                <a href="{{ route('cars.show', ['id' => $auction->car->id]) }}">
                                    {{ $auction->car->year }} {{ $auction->car->make }} {{ $auction->car->model }}
                                </a>
                            </td>
                            <td>
                                {!! $auction->buy_price > 0 ? '-' : '&nbsp;' !!}${{ number_format($auction->buy_price > 0 ? $auction->buy_price : $auction->sell_price) }}
                            </td>
                            <td>
                                {{ $auction->created_at->format('F jS g:iA') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection