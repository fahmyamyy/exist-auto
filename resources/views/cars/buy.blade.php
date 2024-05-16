{{-- @include('components.navbar') --}}
@extends('components.layout')
@section('content')
    <style>
        .container-second {
            /* width: 70%; */
            margin: auto;
            /* Center the container */
        }

        .container-sticky {
            background-color: rgba(200, 200, 200, 0.4);
            position: sticky;
            top: 0px;
            /* Adjust based on your navbar's actual height */
            z-index: 1;
            /* background-color: white; */
            width: 100%;
            margin: auto;
            /* Center the container */
        }

        .form {
            position: relative;
            width: 100%;
        }

        .search-icons {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: gray;
        }

        .search-placeholder {
            padding-left: 30px;
        }

        .form-inline input[type="search"]:focus {
            outline: none;
            /* Removes the outline on focus */
            box-shadow: none;
            /* Removes the glow/shadow on focus */
            border: 1px solid #ccc;
            /* Optional: adds a subtle border for accessibility */
        }
    </style>



    <!-- Cards Container -->
    <div class="bg-gradient-light">
        <div class="container-sticky py-3 border-bottom">
            <div class="row justify-content-between" style="width: 70%; margin:auto;">
                <div class="col-10">
                    <form class="form-inline" method="GET" action="{{ route('car.buy.view') }}">
                        @csrf
                        <div class="form">
                            <i class="fa fa-search search-icons"></i>
                            <div class="input-group">
                                <input type="search" class="form-control" name="search" placeholder="Search anything...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </div>
                            {{-- <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">Button</button>
                                </div>
                            </div> --}}
                            {{-- <button type="submit">Search</button> --}}
                        </div>
                    </form>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary filter-button" onclick="toggleNav()">☰ Filter</button>
                </div>
            </div>
        </div>
        @php
            $count = count($carData);
            $countNeeded = 9;
            $placeholder = $countNeeded - $count;
        @endphp
        <div class="container-second my-4">
            @php
                $itemsPerPage = 9;
                $itemsCount = $carData->count();
                $fullChunksNeeded = intdiv($itemsPerPage, 3);
                $allItems = $carData->items();

                while (count($allItems) < $itemsPerPage) {
                    $allItems[] = null;
                }
            @endphp

            {{-- Ensure that we always have 3 rows of 3 cards --}}
            @foreach (array_chunk($allItems, 3) as $chunk)
                <div class="container" style="display: flex; justify-content: space-around; margin-bottom: 20px;">
                    @foreach ($chunk as $car)
                        @if ($car !== null)
                            <div class="card shadow-sm filtered m-2" style="width: 25rem;">
                                <a href="{{ route('car.detail', ['carId' => $car->id]) }}">
                                    <img style="max-height: 232px; min-height:232px" class="card-img-top"
                                        alt="Car image cap"
                                        src="{{ asset('storage/uploads/' . $car->image->file_name . '.' . $car->image->file_type) }}">
                                </a>
                                <ul class="list-group list-group-flush">
                                    <div class="p-4">
                                        <a href="{{ route('car.detail', ['carId' => $car->id]) }}"
                                            style="text-decoration: none; cursor: pointer; color:black">
                                            <h4 class="my-2">{{ $car->carModel->carBrand->brand }}
                                                {{ $car->carModel->model }} {{ $car->year }}
                                            </h4>
                                            <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                                {{ $car->mileage }} KM • {{ $car->transmission }} • {{ $car->location }}
                                            </p>
                                        </a>
                                        <div class="mt-4" style="display: flex; justify-content: space-between;">
                                            <p class="text-left text-danger font-weight-bold">{{ $car->price_credit }}</p>
                                            <p style="font-size: 10pt; margin-left: auto;">{{ $car->price_installment }}
                                            </p>
                                        </div>
                                        <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">
                                            {{ $car->price_cash }}
                                            (Cash)
                                        </p>
                                    </div>
                                    <a href="{{ route('checkout.view', ['carId' => $car->id]) }}"
                                        class="m-4 mt-1 btn btn-danger">Buy Now</a>
                                </ul>
                            </div>
                        @else
                            <div class="card shadow-sm filtered m-2" style="width: 25rem;">
                                <a href="">
                                    <img style="max-height: 232px; min-height: 232px" class="card-img-top" alt="Car image cap"
                                        src="https://carwow-uk-wp-3.imgix.net/18015-MC20BluInfinito-scaled-e1707920217641.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=10&w=800">
                                </a>
                                <ul class="list-group list-group-flush">
                                    <div class="p-4">
                                        <a href="#" style="text-decoration: none; cursor: pointer; color:black">
                                            <h4 class="my-2">FOR SALE
                                            </h4>
                                            <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                                XX.XXX KM • Transmission • Location
                                            </p>
                                        </a>
                                        <div class="mt-4" style="display: flex; justify-content: space-between;">
                                            <p class="text-left text-danger font-weight-bold">Rp. XXX.XXX.XXX</p>
                                            <p style="font-size: 10pt; margin-left: auto;">Rp. X,X Juta/Bulan</p>
                                        </div>
                                        <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. XXX.XXX.XXX
                                            (Cash)</p>
                                    </div>
                                    <a href="#" onclick="event.preventDefault();" class="m-4 mt-1 btn btn-danger">Buy
                                        Now</a>
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="row my-3 justify-content-center" style="width: 70%; margin:auto;">
            {{ $carData->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <script>
        // Fungsi untuk reset filter
        function resetFilters() {
            document.getElementById('filterForm').reset();
            // Reset the slider positions
            setSliderValues();
        }

        // Fungsi untuk apply filter
        function applyFilters() {
            // Logika untuk mengumpulkan data filter dan menerapkan filter
            console.log("Filters applied");
        }

        // Fungsi untuk menetapkan nilai slider dan teks
        function setSliderValues() {
            const yearMinSlider = document.getElementById('yearMin');
            const yearMaxSlider = document.getElementById('yearMax');
            const yearMinText = document.getElementById('yearMinText');
            const yearMaxText = document.getElementById('yearMaxText');

            const priceMinSlider = document.getElementById('priceMin');
            const priceMaxSlider = document.getElementById('priceMax');
            const priceMinText = document.getElementById('priceMinText');
            const priceMaxText = document.getElementById('priceMaxText');

            yearMinText.value = yearMinSlider.value;
            yearMaxText.value = yearMaxSlider.value;

            priceMinText.value = priceMinSlider.value.toLocaleString();
            priceMaxText.value = priceMaxSlider.value.toLocaleString();

            yearMinSlider.oninput = function() {
                yearMinText.value = this.value;
            }

            yearMaxSlider.oninput = function() {
                yearMaxText.value = this.value;
            }

            priceMinSlider.oninput = function() {
                priceMinText.value = Number(this.value).toLocaleString();
            }

            priceMaxSlider.oninput = function() {
                priceMaxText.value = Number(this.value).toLocaleString();
            }
        }

        // Initialize the slider values when the script loads
        setSliderValues();
    </script>
    <div class="sidebar">
        @include('components.sidebar')
    </div>
@endsection
