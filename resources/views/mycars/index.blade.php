@extends('components.layout')
@section('content')
    <div class="main-content">
        <div class="px-5">
            <div class="row justify-items-center my-3 pb-2">
                <h2 class="border-bottom col-md-4 ">My Cars</h2>
            </div>
        </div>
        <div class="containers pb-3 px-5">
            <div class="row justify-content-center">
                <div class="row justify-content-center mt-3 w-100">
                    @if ($transactions->isNotEmpty())
                        @foreach ($transactions as $transaction)
                            <a href="mycars/{{ $transaction->id }}" class="col-11 card glow-card p-3 m-3"
                                style="text-decoration: none; cursor:pointer; color:black; height: 12rem">
                                <div class="d-flex justify-content-between">
                                    <div class="col-8">
                                        <h2 class="my-2">{{ $transaction->car->carModel->carBrand->brand }}
                                            {{ $transaction->car->carModel->model }}
                                            {{ $transaction->car->year }}</h2>
                                        <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                            {{ $transaction->car->color }} • {{ $transaction->car->mileage }} KM •
                                            {{ $transaction->car->transmission }} •
                                            {{ $transaction->car->location }}</p>
                                    </div>
                                    <p class="col-3 text-right text-muted">{{ $transaction->status }}</p>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <p class="col">{{ $transaction->amount }}</p>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="text-center mt-5">
                            <h2>No data available.</h2>
                        </div>
                    @endif
                </div>
                <div class="row mt-3 justify-content-center" style="width: 70%; margin:auto;">
                    {{ $transactions->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
