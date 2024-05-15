@extends('components.admin.layout')
@section('heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>
@endsection
@section('content')
    <!-- Content Row -->
    <div class="row px-2">
        <div class="card shadow col-xl-12 col-md-12 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($dataUsers->isNotEmpty())
                                @foreach ($dataUsers as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center"><a
                                                href="{{ route('admin.users.details', ['userId' => $user->id]) }}"><i
                                                    class="fas fa-edit"></i></a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="11" class="text-center">No data available</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $dataUsers->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
