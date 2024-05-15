@extends('components.admin.layout')
@section('content')
    <style>
        
    </style>
    <div class="container-fluid py-2">
        <div class="card mt-1">
            <div class="card-body">
                <form action="{{ route('upload.car.photos', ['carId' => $car->id]) }}" method="POST"
                    enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    <div class="image-container-car-detail">
                        @foreach ($uploads as $upload)
                            <div class="image-card-car-detail">
                                <img src="{{ asset('storage/uploads/' . $upload->file_name . '.' . $upload->file_type) }}"
                                    alt="Image {{ $loop->iteration }}" data-bs-toggle="modal" data-bs-target="#imageModal"
                                    onclick="showImageInModal('{{ asset('storage/uploads/' . $upload->file_name . '.' . $upload->file_type) }}')">
                                <button type="button" class="delete-button"
                                    onclick="deleteImage('{{ $upload->id }}')">X</button>
                            </div>
                        @endforeach

                        @for ($j = $uploads->count(); $j < 5; $j++)
                            <div class="image-card-car-detail" onclick="triggerFileInput(this)">
                                <input type="file" name="fileInput[]" class="custom-file-input" id="fileInput"
                                    onchange="previewImage(event, this)">
                                <div id="placeholder-photo" class="placeholder">Upload Photo</div>
                            </div>
                        @endfor
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary w-100">Upload Photos</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row px-2 mt-4">
            <div class="card shadow-sm col-xl-12 col-md-12 mb-4">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                    <h6 class="m-0 font-weight-bold text-secondary">{{ $car->status }}</h6>
                </div>
                <div class="card-body">
                    @if ($car->status === 'Pending')
                        <form class="px-4 form-filter" method="POST"
                            action="{{ route('admin.cars.inspection', ['carId' => $car->id]) }}">
                            <input type="hidden" name="_method" value="PUT" />
                        @else
                            <form class="px-4 form-filter" method="POST"
                                action="{{ route('admin.cars.update', ['carId' => $car->id]) }}">
                                <input type="hidden" name="_method" value="PUT" />
                    @endif
                    <input type="hidden" id="dataModels" value="{{ $carModels }}">
                    @csrf
                    <div class="row mt-4">
                        <!-- First Column -->
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="brand">Brand</label>
                                <select class="form-control" id="brand" name="brand"
                                    onchange="updateModelsAndTypes();">
                                    @foreach ($carBrands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $brand->brand === $car->carModel->carBrand->brand ? 'selected' : '' }}>
                                            {{ $brand->brand }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="type">Tipe</label>
                                <select class="form-control" id="type" name="type" disabled>
                                    <option>{{ $car->carModel->carType->type }}</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="color">Warna</label>
                                <input type="text" class="form-control" name="color" id="color"
                                    value="{{ $car->color }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="mileage">Mileage</label>
                                <div class="row align-items-center">
                                    <div class="col-10">
                                        <input type="text" class="form-control number-format" name="mileage"
                                            id="mileage" placeholder="10.000" maxlength="7" value="{{ $car->mileage }}"
                                            required>
                                    </div>
                                    <div class="col-2">
                                        <p>KM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="price">Price Cash</label>
                                @if ($car->status === 'Pending' || $car->status === 'Rejected' || $car->status === 'Sold')
                                    <div class="input-group">
                                        <input type="text" class="form-control number-format" name="priceCash"
                                            id="priceCash" placeholder="10,000" disabled value="{{ $car->price_cash }}">
                                    </div>
                                @else
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control number-format" name="priceCash"
                                            id="priceCash" placeholder="10,000"
                                            value="{{ str_replace('Rp. ', '', $car->price_cash) }}" required>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="model">Model</label>
                                <select class="form-control" id="model" name="model"
                                    onchange="updateTypeDropdown();">
                                    @foreach ($carModels as $model)
                                        <option value="{{ $model->id }}"
                                            {{ $model->model === $car->carModel->model ? 'selected' : '' }}>
                                            {{ $model->model }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="transmission">Transmisi</label>
                                <select class="form-control" id="transmission" name="transmission">
                                    <option value="Manual" {{ $car->transmission == 'Manual' ? 'selected' : '' }}>
                                        Manual</option>
                                    <option value="Automatic" {{ $car->transmission == 'Automatic' ? 'selected' : '' }}>
                                        Otomatis</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="location">Lokasi</label>
                                <input type="text" class="form-control" name="location" id="location"
                                    value="{{ $car->location }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="year">Tahun</label>
                                <input type="text" class="form-control" name="year" id="year"
                                    value="{{ $car->year }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="price">Price Credit</label>
                                @if ($car->status === 'Pending' || $car->status === 'Rejected' || $car->status === 'Sold')
                                    <div class="input-group">
                                        <input type="text" class="form-control number-format" name="price_credit"
                                            id="price_credit" placeholder="10,000" disabled
                                            value="{{ $car->price_credit }}">
                                    </div>
                                @else
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control number-format" name="priceCredit"
                                            id="priceCredit" placeholder="10,000"
                                            value="{{ str_replace('Rp. ', '', $car->price_credit) }}" required>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if ($car->status === 'Pending')
                            <input type="hidden" id="status" name="status" value="On Progress">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="inspectionDate">Inspection Date</label>
                                    <input id="inspectionDate" name="inspectionDate" class="form-control"
                                        type="date" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success m-3 col">Update Data</button>
                        @elseif ($car->status === 'On Progress')
                            <input type="hidden" id="status" name="status" value="Approved">
                            <button type="submit" class="btn btn-success m-3 col">Approve</button>
                        @else
                            <button type="submit" class="btn btn-success m-3 col">Update Data</button>
                        @endif
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Preview Image" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Preview Image" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
    <script>
        var dataModels = document.getElementById('dataModels').value;
        var modelsData = [];
        modelsData = JSON.parse(dataModels);

        function updateModelsAndTypes() {
            const brandId = document.getElementById('brand').value;
            const typeSelect = document.getElementById('type');
            const modelSelect = document.getElementById('model');

            typeSelect.innerHTML = '<option>Type</option>';
            typeSelect.disabled = true;

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
                typeSelect.innerHTML = '<option>Type</option>';
                typeSelect.disabled = true;
            }
        }

        function updateDropdown(dropdownId, data, property) {
            const select = document.getElementById(dropdownId);
            select.innerHTML =
                `<option>Select ${property.charAt(0).toUpperCase() + property.slice(1)}</option>`;

            data.forEach(item => {
                select.innerHTML += `<option value="${item.id}">${item[property]}</option>`;
            });
        }

        const inputFormHarga = document.querySelectorAll('.number-format');
        inputFormHarga.forEach(form => {
            form.addEventListener('input', function() {
                let value = this.value;

                value = value.replace(/[^0-9]/g, '');
                value = value.replace(/^0+(\d)/, '$1');
                value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                this.value = value;
            });
        });

        function showImageInModal(src) {
            document.getElementById('modalImage').src = src;
        }

        function triggerFileInput(card) {
            const fileInput = card.querySelector('input[type="file"]');
            fileInput.click();
        }

        function previewImage(event, input) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Uploaded Image';
                    img.style.height = '100%';
                    img.style.width = '100%';
                    img.style.objectFit = 'cover';

                    const card = input.closest('.image-card-car-detail');
                    const placeholder = card.querySelector('.placeholder');
                    if (placeholder) {
                        placeholder.style.display = 'none';
                    }
                    card.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }

        function submitForm() {
            var form = document.getElementById('uploadForm');
            var formData = new FormData(form);

            fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }

        function deleteImage(imageId) {
            if (confirm('Are you sure you want to delete this image?')) {
                fetch(`/uploads/${imageId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    })
                    .then(response => {
                        if (response.ok) {
                            location.reload();
                        } else {
                            console.error('Failed to delete the image.');
                        }
                    })
                    .catch(error => console.error('Error deleting image:', error));
            }
        }
    </script>
@endsection
