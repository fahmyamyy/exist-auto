@extends('components.admin.layout')
@section('content')
    <div class="container-fluid py-2">
        @if ($upload)
            <div class="card mt-1">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Payment Proof</h6>
                </div>
                <div class="card-body">
                    <div class="image-container-transaction-detail">
                        <div class="image-card-transaction-detail">
                            <img class="border"
                                src="{{ asset('storage/uploads/' . $upload->file_name . '.' . $upload->file_type) }}"
                                alt="Image" data-bs-toggle="modal" data-bs-target="#imageModal"
                                onclick="showImageInModal('{{ asset('storage/uploads/' . $upload->file_name . '.' . $upload->file_type) }}')">
                        </div>
                    </div>
                </div>
            </div>
        @endif
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
        <div class="row px-2 mt-4">
            <div class="card shadow-sm col-xl-12 col-md-12 mb-4">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Transaction Details</h6>
                </div>
                <div class="card-body">
                    <form class="px-4 form-filter" method="POST"
                        action="{{ route('admin.transaction.update', ['transactionId' => $transaction->id]) }}">
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="action" id="action" value="" />
                        @csrf
                        <div class="row mt-4 justify-content-center">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="color">Car</label>
                                    <input type="text" class="form-control" name="car" id="car"
                                        value="{{ $transaction->car->carModel->carBrand->brand }} {{ $transaction->car->carModel->model }} {{ $transaction->car->year }}"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="color">Seller</label>
                                    <input type="text" class="form-control" name="seller" id="seller"
                                        value="{{ $transaction->car->creator->name }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="color">Buyer</label>
                                    <input type="text" class="form-control" name="buyer" id="buyer"
                                        value="{{ $transaction->buyer->name }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="color">Amount</label>
                                    <input type="text" class="form-control" name="amount" id="amount"
                                        value="{{ $transaction->amount }}" disabled required>
                                </div>
                                <div class="mb-4">
                                    <label for="color">Recipient</label>
                                    <input type="text" class="form-control" name="recipient" id="recipient"
                                        value="{{ $transaction->recipient }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="color">Address</label>
                                    <input type="text" class="form-control" name="address" id="address"
                                        value="{{ $transaction->address }}" required>
                                </div>
                            </div>
                            @if ($transaction->status === 'Waiting for Approval Admin')
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-success m-3 col"
                                            onclick="setAction('Waiting for Approval Seller')">Approve Transaction</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-danger m-3 col"
                                            onclick="setAction('Rejected')">Reject Transaction</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
