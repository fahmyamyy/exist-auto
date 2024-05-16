@extends('components.layout')
@section('content')
<style>
    .main-content {
        display: flex;
        flex-direction: column;
        min-height: 80vh;
        /* Make minimum height of the viewport */
    }
</style>
<div class="main-content"> <!-- New flex container -->
    <div class="px-5">
        <div class="row justify-items-center my-3 pb-2">
            <h2 class="border-bottom col-md-4 ">Sell Car</h2>
            <h2 class=" col-md-2 "></h2>
            <h2 class="border-bottom col-md-4 ml-3">Selling List</h2>
        </div>
    </div>
    <div class="containers pb-5 px-5">
        <div class="row justify-items-round">
            <!-- Form Section -->
            <div class="card shadow-sm col-md-6 mb-3 justify-content-center">
                <form id="sell-form" class="px-4 form-filter" method="POST" action="{{ route('sell') }}">
                    @csrf
                    <div class="row mt-4">
                        <!-- First Column -->
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="brand">Brand</label>
                                <select class="form-control" id="brand" name="brand" required
                                    onchange="updateModelsAndTypes();">
                                    <option value="">Brand</option>
                                    @foreach ($carBrands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type" required disabled>
                                    <option value="">Type</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="color">Color</label>
                                <select class="form-control" id="color" name="color">
                                    <option value="Hitam">Black</option>
                                    <option value="Putih">White</option>
                                    <option value="Merah">Red</option>
                                    <option value="Biru">Blue</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="mileage">Mileage</label>
                                <div class="row align-items-center">
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="mileage" id="mileage"
                                            placeholder="10.000" maxlength="7" oninput="numberFormat()" required>
                                    </div>
                                    <div class="col-2">
                                        <p>KM</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="model">Model</label>
                                <select class="form-control" id="model" name="model" required
                                    onchange="updateTypeDropdown();" disabled>
                                    <option value="">Select Model</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="transmission">Transmission</label>
                                <select class="form-control" id="transmission" name="transmission">
                                    <option value="Manual">Manual</option>
                                    <option value="Automatic">Automatic</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="location">Location</label>
                                <select class="form-control" id="location" name="location">
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Bogor">Bogor</option>
                                    <option value="Tangerang">Tangerang</option>
                                    <option value="Depok">Depok</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="year">Year</label>
                                <select class="form-control" id="year" name="year">
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-success m-3 col">Jual</button>
                    </div>
                </form>
            </div>

            <!-- Cards and Pagination Section -->
            <div class="col-md-6 flex justify-items-center">
                @if ($carData->isNotEmpty())
                    @foreach ($carData as $car)
                        <a href="{{ route('car.detail', ['carId' => $car->id]) }}" class="card shadow-sm mb-2"
                            style="text-decoration: none; cursor: pointer; color: black;">
                            <div class="row g-0 align-items-center"> <!-- Ensure content is vertically centered -->
                                <div class="col-auto"> <!-- Use col-auto to fit the content's width -->
                                    <img src="https://via.placeholder.com/100x100" class="img-fluid ml-4"
                                        alt="Card image cap" style="max-width: 100px; height: auto; object-fit: cover;">
                                </div>
                                <div class="col">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">{{ $car->carModel->carBrand->brand }}
                                            {{ $car->carModel->model }} {{ $car->year }}</h5>
                                        <p class="card-text">{{ $car->color }} • {{ $car->mileage }} KM •
                                            {{ $car->transmission }} •
                                            {{ $car->location }}</p>
                                        <p class="card-text text-success font-weight-bold">{{ $car->status }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="row justify-content-center" style="width: 70%; margin:auto;">
                        <p>No data available.</p>
                    </div>
                @endif
                <!-- Mock Pagination -->
                <div class="row justify-content-center" style="width: 70%; margin:auto;">
                    {{ $carData->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    let modelsData = [];

    function updateModelsAndTypes() {
        const brandId = document.getElementById('brand').value;

        fetch(`/get-models/${brandId}`)
            .then(response => response.json())
            .then(data => {
                modelsData = data;
                updateDropdown('model', data, 'model');
                document.getElementById('model').disabled = false;

            })
            .catch(error => console.error('Error fetching model data:', error));
    }

    function updateTypeDropdown() {
        const modelId = document.getElementById('model').value;
        const selectedModel = modelsData.find(model => model.id.toString() === modelId);

        const typeSelect = document.getElementById('type');
        if (selectedModel && selectedModel.car_type) {
            typeSelect.innerHTML = '';
            typeSelect.innerHTML +=
                `<option value="${selectedModel.car_type.id}">${selectedModel.car_type.type}</option>`;
        } else {
            typeSelect.innerHTML = '<option value="">Type</option>';
            typeSelect.disabled = true;
        }
    }


    function updateDropdown(dropdownId, data, property) {
        const select = document.getElementById(dropdownId);
        select.required = true;
        select.innerHTML =
            `<option value="">Select ${property.charAt(0).toUpperCase() + property.slice(1)}</option>`;

        data.forEach(item => {
            select.innerHTML += `<option value="${item.id}">${item[property]}</option>`;
        });
    }

    function numberFormat() {
        let input = document.getElementById('mileage');
        let value = input.value.replace(/[^0-9]/g, '');
        value = value.replace(/^0+/, '');
        if (value) {
            value = parseInt(value, 10);
            value = value.toLocaleString();
        }
        input.value = value.replace(/,/g, '.');
    }

    document.getElementById('sell-form').onsubmit = function(e) {
        if (!this.checkValidity()) {
            e.preventDefault(); // Prevent form submission
            alert('Please fill out the form correctly.');
        }
    };
</script>
