@php /** @var \App\Contracts\Car[] $cars */ @endphp

@extends('app')

@section('head')
    <style>
        .cars.search-results [data-car-name] {
            display: none;
        }
        .cars [data-car-name], .cars.search-results .show[data-car-name] {
            display: table-row;
        }
    </style>
@endsection

@section('content')

    <section class="hero is-dark">
        <div class="hero-body">
            <div class="container">
                <div class="control has-icons-left has-icons-right">
                    <input id="search-cars" class="input is-medium" type="text" placeholder="Search cars..." autofocus>
                    <span class="icon is-small is-left"><i class="fas fa-car"></i></span>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <table class="table cars">
                <thead>
                    <tr>
                        <th>Car</th>
                        <th>Price</th>
                        <th class="has-text-centered">Auctions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                        <tr data-car-name="{{ $car->year }} {{ $car->make }} {{ $car->model }}">
                            <td>
                                <a href="{{ route('cars.show', ['id' => $car->id]) }}">
                                    {{ $car->year }} {{ $car->make }} {{ $car->model }}
                                </a>
                            </td>
                            <td>${{ number_format($car->price) }}</td>
                            <td class="has-text-centered">{{ count($car->auctions) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection

@section('scripts')

    <script>

        const searchInput = document.querySelector('#search-cars'),
            carsTable = document.querySelector('.cars');

        let lastKeyDown, searchWords;

        searchInput.addEventListener('keyup', () => {
            lastKeyDown = (new Date()).getTime();
            searchWords = searchInput.value.toLowerCase().split(' ');

            setTimeout(() => {
                // return if user hasn't stopped typing for 150ms
                if (((new Date()).getTime() - lastKeyDown) < 150) {
                    return;
                }

                if (searchInput.value === '') {
                    carsTable.classList.remove('search-results');
                    return;
                }

                carsTable.classList.add('search-results');

                document.querySelectorAll('[data-car-name]').forEach((el) => {
                    const match = searchWords.every((word) => {
                        return el.getAttribute('data-car-name').toLowerCase().indexOf(word) >= 0;
                    });

                    if (match) {
                        el.classList.add('show');
                    } else {
                        el.classList.remove('show');
                    }
                });
            }, 150);
        });

    </script>

@endsection