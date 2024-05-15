@extends('components.admin.layout')
@section('heading')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transactions</h1>
    </div>
@endsection
@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="card shadow col-xl-12 col-md-12 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Transcactions</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Car</th>
                                <th>Buyer</th>
                                <th>Amount</th>
                                <th>Transaction Type</th>
                                <th>Recipient</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if ($transactionData->isNotEmpty())
                            @foreach ($transactionData as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->car->carModel->carBrand->brand }}
                                        {{ $transaction->car->carModel->model }} {{ $transaction->car->year }}</td>
                                    <td>{{ $transaction->buyer->name }}</td>
                                    <td>{{ $transaction->transaction_type }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->recipient }}</td>
                                    <td>{{ $transaction->address }}</td>
                                    <td>{{ $transaction->status }}</td>
                                    <td class="text-center"><a
                                            href="{{ route('admin.transaction.details', ['transactionId' => $transaction->id]) }}"><i
                                                class="fas fa-fw fa-eye"></i></a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="11" class="text-center">No data available</td>
                            </tr>
                        @endif
                        <tbody>
                        </tbody>
                    </table>
                    <div class="row mt-3 justify-content-center" style="width: 70%; margin:auto;">
                        {{ $transactionData->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
