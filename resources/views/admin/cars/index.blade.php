@extends('components.admin.layout')
@section('heading')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cars</h1>
    </div>
    @include('components.admin.base')
@endsection
@section('content')
    <div class="row px-2">
        <div class="card shadow col-xl-12 col-md-12 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cars</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Mileage</th>
                                <th>Color</th>
                                <th>Transmisson</th>
                                <th>Location</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carData as $car)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $car->carModel->carBrand->brand }}</td>
                                    <td>{{ $car->carModel->model }}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>{{ $car->mileage }}</td>
                                    <td>{{ $car->color }}</td>
                                    <td>{{ $car->transmission }}</td>
                                    <td>{{ $car->location }}</td>
                                    <td>{{ $car->price_cash ?: '-' }}</td>
                                    <td>{{ $car->status }}</td>
                                    <td class="text-center"><a
                                            href="{{ route('admin.cars.detail', ['carId' => $car->id]) }}"><i
                                                class="fas fa-fw fa-eye"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row mt-3 justify-content-center" style="width: 70%; margin:auto;">
                        {{ $carData->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
