@extends('components.admin.layout')
@section('content')
    <div class="container-fluid py-2">
        <div class="row px-2 mt-4">
            <div class="card shadow-sm col-xl-12 col-md-12 mb-4">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
                    <button class="btn btn-danger" onclick="deleteImage('{{ $user->id }}')">Delete</button>
                </div>
                <div class="card-body">
                    <form class="px-4 form-filter" method="POST"
                        action="{{ route('admin.users.update', ['userId' => $user->id]) }}">
                        <input type="hidden" name="_method" value="PUT" />
                        @csrf
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="color">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $user->name }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="color">Email</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="{{ $user->email }}" required disabled>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success m-3 col">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
