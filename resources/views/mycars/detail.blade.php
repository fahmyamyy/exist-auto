@extends('components.layout')
@section('content')
    <div class="px-5">
        <div class="row justify-items-center my-3 pb-2">
            <h2 class="border-bottom col-md-4 ">Transaction Details</h2>
            <h2 class="col-md-4"></h2>
            @if ($transaction->status === 'Waiting for Payment')
                <div class="col-4 text-right">
                    <button type="button" class="ml-5 btn btn-danger" onclick="cancelTransaction('{{ $transaction->id }}')">
                    {{-- <button type="button" class="ml-5 btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> --}}
                        Cancel Transaction
                    </button>
                </div>
            @else
                <div class="col-4 text-right">
                    <h4 class="text-muted">{{ $transaction->status }}</h4>
                </div>
            @endif
        </div>
    </div>
    <div class="m-4 p-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header font-weight-bold">Transaction Details</div>
                    <div class="card-body">
                        <input type="hidden" name="transactionId" id="transactionId" value="{{ $transaction->id }}">
                        <div class="mb-3">
                            <label for="item" class="form-label">Item</label>
                            <input type="text" class="form-control" name="item" id="item"
                                value="{{ $transaction->car->carModel->carBrand->brand }} {{ $transaction->car->carModel->model }} {{ $transaction->car->year }} | {{ $transaction->car->color }} {{ $transaction->car->transmission }}"
                                disabled>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount ({{ $transaction->transaction_type }})</label>
                            <input type="text" class="form-control" name="amount" id="amount"
                                value="{{ $transaction->amount }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Recipient Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ $transaction->recipient }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Full Address</label>
                            <textarea class="form-control" id="address" name="address" rows="5" style="resize: none" disabled>{{ $transaction->address }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="card mb-2">
                    <div class="card-header font-weight-bold">Payment Instruction</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">1. Transfer to Account Bank BCA</li>
                        <li class="list-group-item">2. Input account number 1231231231</li>
                        <li class="list-group-item">3. Upload Payment Proof Below</li>
                    </ul>
                </div>
                <div class="card mt-5">
                    <div class="card-header font-weight-bold">Payment Proof</div>
                    <div class="card-body">
                        @if ($upload && $upload->count() > 0)
                            <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                                <div class="image-card-mycars">
                                    <img class="border"
                                        style="width: 200px; height: 150px; object-fit: cover; cursor: pointer;"
                                        data-bs-toggle="modal" data-bs-target="#imageModal"
                                        src="{{ asset('storage/uploads/' . $upload->file_name . '.' . $upload->file_type) }}"
                                        alt="{{ $upload->file_name . '.' . $upload->file_type }}">
                                    @if ($transaction->status === 'Waiting for Approval Admin')
                                        <button type="button" class="delete-button-mycars"
                                            onclick="deleteImage('{{ $upload->id }}')">X</button>
                                    @endif
                                </div>
                            </div>
                            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('storage/uploads/' . $upload->file_name . '.' . $upload->file_type) }}"
                                                alt="{{ $upload->file_name }}" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <form method="POST" action="{{ route('upload.proof') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="transactionId" id="transactionId"
                                    value="{{ $transaction->id }}" hidden>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="fileInput" class="custom-file-input" id="fileInput">
                                        <label id="fileName" class="custom-file-label" for="fileInput"
                                            aria-describedby="inputGroupFileAddon02" required>Choose file</label>
                                    </div>
                                </div>
                                <div id="file-error" class="invalid-feedback mb-3"></div>
                                <div class="input-group">
                                    <button class="btn btn-success w-100">Upload</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('fileInput');
            const fileError = document.getElementById('file-error');

            if (fileInput) {
                fileInput.addEventListener('change', function(event) {
                    const files = event.target.files;
                    let allFilesValid = true;

                    if (files.length > 0) {
                        const uploadedFiles = new FormData();

                        for (const file of files) {
                            const fileType = file.type.toLowerCase();

                            if (fileType === "image/jpeg" || fileType === "image/png") {
                                uploadedFiles.append('files[]', file);
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    const fileLabel = document.getElementById('fileName');
                                    fileLabel.innerText = file.name;
                                    fileError.style.display = 'none';
                                };
                                reader.readAsDataURL(file);
                            } else {
                                allFilesValid = false;
                                break;
                            }
                        }

                        if (!allFilesValid) {
                            fileError.innerText = 'Only JPG and PNG files are allowed.';
                            fileError.style.display = 'block';
                            fileInput.value = '';
                        }
                    }
                });
            }

            var cashRadio = document.getElementById('cash');
            var creditRadio = document.getElementById('credit');
            var amountInput = document.getElementById('amount');
            var hiddenAmountInput = document.getElementById('hiddenAmount');

            var cashAmount = "Rp. 100.000.000";
            var creditAmount = "Rp. 200.000.000";

            function updateAmount() {
                if (cashRadio.checked) {
                    amountInput.value = cashAmount;
                    hiddenAmountInput.value = cashAmount;
                } else if (creditRadio.checked) {
                    amountInput.value = creditAmount;
                    hiddenAmountInput.value = creditAmount;
                }
            }

            cashRadio.addEventListener('change', updateAmount);
            creditRadio.addEventListener('change', updateAmount);

            updateAmount();
        });

        function deleteImage(imageId) {
            if (confirm('Are you sure you want to delete this image?')) {

                const formData = new FormData();
                formData.append('_method', 'DELETE');
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('uploadId', imageId);
                formData.append('transactionId', document.getElementById('transactionId').value);
                fetch(`/transaction/upload/${imageId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        // body: JSON.stringify(formData) // Send the JSON object as the request body
                        body: formData
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

        function cancelTransaction(transactionId) {
            if (confirm('Are you sure you want to cancel this transaction?')) {

                const formData = new FormData();
                formData.append('_method', 'DELETE');
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('transactionId', transactionId);
                fetch(`/transaction/cancel`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: formData
                    })
                    .then(response => {
                        if (response.ok) {
                            window.location.href = '/mycars';
                        } else {
                            console.error('Failed to cancel transaction.');
                        }
                    })
                    .catch(error => console.error('Error cancel transaction:', error));
            }
        }
    </script>
@endsection
