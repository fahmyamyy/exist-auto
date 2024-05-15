@extends('components.layout')
@section('content')
    @php $checkCreator = Auth::check() && Auth::user()->id === $car->seller @endphp

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <div class="m-4 p-3">
        <div class="row">
            <div class="col-md-12">
                <div class="row align-items-start">
                    <!-- Image Section -->
                    <div class="col-md-7">
                        <div id="carouselExampleIndicators" class="carousel" data-ride="carousel"
                            style="max-width: 100%; height: auto;">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                @if ($photos->isNotEmpty())
                                    @foreach ($photos as $photo)
                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                            <img style="width: 100%; height:500px; object-fit:cover"
                                                src="{{ asset('storage/uploads/' . $photo->file_name . '.' . $photo->file_type) }}"
                                                class="d-block w-100" alt="...">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="carousel-item active">
                                        <img style="width: 100%; height:500px; object-fit:cover"
                                        src="https://car-images.bauersecure.com/wp-images/4738/should_i_buy_an_electric_car.jpg"
                                            class="d-block w-100" alt="...">
                                    </div>

                                    <div class="carousel-item">
                                        <img style="width: 100%; height:500px; object-fit:cover"
                                        src="https://car-images.bauersecure.com/wp-images/4738/should_i_buy_an_electric_car.jpg"
                                            class="d-block w-100" alt="...">
                                    </div>
                                @endif
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <!-- Details Section -->
                    <div class="shadow-sm card col-md-5">
                        <div class="p-2">
                            <div class="row">
                                <div class="col-8">
                                    <h2 class="my-2">{{ $car->carModel->carBrand->brand }} {{ $car->carModel->model }}
                                        {{ $car->year }}</h2>
                                    <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                        {{ $car->color }} • {{ $car->mileage }} KM • {{ $car->transmission }} •
                                        {{ $car->location }}</p>
                                </div>
                                <div class="col">
                                    @if ($checkCreator)
                                        <p style="font-size: 14pt; margin-bottom:0px; bottom:0"
                                            class="my-2 text-right text-muted">{{ $car->status }}</p>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="row mx-1 mt-4 justify-content-between">
                                <div class="col">
                                    <p style="font-size: 10pt; margin-bottom:0px; bottom:0" class="text-left">{{$car->price_credit}}</p>
                                    <p class="text-left text-danger font-weight-bold">{{$car->price_credit}}</p>
                                    <p class="text-right" style="font-size: 10pt;">{{$car->price_installment}}</p>
                                </div>
                            </div> --}}
                            <div class="mt-4" style="display: flex; justify-content: space-between;">
                                <p class="text-left text-danger font-weight-bold">{{ $car->price_credit }}</p>
                                <p style="font-size: 10pt; margin-left: auto;">{{ $car->price_installment }}</p>
                            </div>
                            <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">{{ $car->price_cash }}
                                (Cash)
                            </p>
                            {{-- <div class="" style="display: flex; justify-content: space-between;">
                                <p class="text-left text-danger font-weight-bold">{{$car->price_cash}} (Cash)</p>
                            </div> --}}
                        </div>
                        <form id="carOperationForm" method="POST" action="">
                            @csrf
                            <input type="text" id="carId" name="carId" value="{{ $car->id }}" hidden>
                            @if ($checkCreator)
                                @if ($car->status === 'Waiting for Approval Seller')
                                    <div class="row my-2">
                                        <div class="col">
                                            <button class="btn btn-success my-2 w-100" onclick="submitForm('send')">Send
                                                Car</button>
                                        </div>
                                    </div>
                                @elseif ($car->status !== 'Sold')
                                    <div class="row my-2">
                                        <div class="col">
                                            <button class="btn btn-danger w-100" onclick="submitForm('cancel')">Cancel
                                                Process</button>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="row my-2">
                                    <div class="col">
                                        <button class="btn btn-primary my-2 w-100" onclick="submitForm('buy')">Buy
                                            Now</button>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto text-center m-4 pt-4 border-top">
        <h1>
            Recommendation Car
        </h1>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid, animi, quas sit non aut obcaecati at
            accusantium impedit necessitatibus nesciunt ipsum repellat nulla accusamus maiores, ex cumque earum officia?
            Modi?
        </p>

        <div id="carouselExampleIndicator2" class="carousel slide" data-ride="carousel" style="max-height:600px">
            <div class="carousel-inner">
                @php
                    $totalCards = 9;
                    $cardsPerSlide = 3;
                    $allItems = $carRecommendation->all();
                    $placeholdersNeeded = $totalCards - count($allItems);

                    // Fill the array with placeholders to make up remaining slots
                    for ($i = 0; $i < $placeholdersNeeded; $i++) {
                        $allItems[] = null; // null will represent placeholders
                    }

                    $chunks = array_chunk($allItems, $cardsPerSlide);
                @endphp

                @foreach ($chunks as $index => $chunk)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div style="display: flex; justify-content: space-around;" class="container">
                            @foreach ($chunk as $car)
                                @if ($car)
                                    <div class="card shadow-sm" style="width: 20rem;">
                                        <a href="{{ route('car.detail', ['carId' => $car->id]) }}">
                                            <img style="max-height: 212px" class="card-img-top"
                                                src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                                                alt="Card image cap">
                                        </a>
                                        <ul class="list-group list-group-flush">
                                            <div class="p-4">
                                                <a href="{{ route('car.detail', ['carId' => $car->id]) }}"
                                                    style="text-decoration: none; cursor: pointer; color: black;">
                                                    <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">
                                                        {{ $car->carModel->carBrand->brand }}
                                                        {{ $car->carModel->model }} {{ $car->year }}</h4>
                                                    <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                                        {{ $car->mileage }} KM • {{ $car->transmission }} •
                                                        {{ $car->location }}
                                                    </p>
                                                </a>
                                                <div class="mt-4" style="display: flex; justify-content: space-between;">
                                                    <p class="text-left text-danger font-weight-bold">
                                                        {{ $car->price_credit }}</p>
                                                    <p style="font-size: 10pt; margin-left: auto;">
                                                        {{ $car->price_installment }}</p>
                                                </div>
                                                <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">
                                                    {{ $car->price_cash }} (Cash)
                                                </p>
                                            </div>
                                            <a href="{{ route('checkout.view', ['carId' => $car->id]) }}"
                                                class="m-4 mt-1 btn btn-danger">Buy
                                                Now</a>
                                        </ul>
                                    </div>
                                @else
                                    <div class="card shadow-sm" style="width: 20rem;">
                                        <a href="">
                                            <img style="max-height: 212px" class="card-img-top" {{-- src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg" --}}
                                                src="https://lh3.googleusercontent.com/p/AF1QipP1-ORgxESW4w9Sb1eQnnGqEXZ-nZPdWHpbrYj_=s680-w680-h510"
                                                alt="Card image cap">
                                        </a>
                                        <ul class="list-group list-group-flush">
                                            <div class="p-4">
                                                <a href="#"
                                                    style="text-decoration: none; cursor: pointer; color: black;">
                                                    <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">
                                                        FOR SALE</h4>
                                                    <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                                        XXX.XXX KM • Location • Transmission</p>
                                                </a>
                                                <div class="mt-4" style="display: flex; justify-content: space-between;">
                                                    <p class="text-left text-danger font-weight-bold">Rp. XXX.XXX.XXX</p>
                                                    <p style="font-size: 10pt; margin-left: auto;">Rp. X,X Juta/Bulan</p>
                                                </div>
                                                <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp.
                                                    XXX.XXX.XXX (Cash)
                                                </p>
                                            </div>
                                            <a href="#" onclick="event.preventDefault();"
                                                class="m-4 mt-1 btn btn-danger">Buy Now</a>
                                        </ul>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicator2" role="button" data-slide="prev"
                style="filter: invert(100%);">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicator2" role="button" data-slide="next"
                style="filter: invert(100%);">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <script>
        function submitForm(action) {
            event.preventDefault();
            var carId = document.getElementById("carId");
            const form = document.getElementById('carOperationForm');
            if (action === 'cancel') {
                form.action = '/cars/cancel';
                const hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', '_method');
                hiddenInput.setAttribute('value', 'DELETE');

                form.appendChild(hiddenInput);
            } else if (action === 'send') {
                form.action = '/cars/send';
            } else {
                return window.location.href = `/cars/checkout/${carId.value}`;
            }
            form.submit();
        }
    </script>
@endsection
