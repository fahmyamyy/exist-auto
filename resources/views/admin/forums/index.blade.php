@extends('components.admin.layout')
@section('heading')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Forums</h1>
    </div>
@endsection
@section('content')
    <!-- Content Row -->

    <div class="row px-2">
        <div class="card shadow col-xl-12 col-md-12 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Forums</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($forumData->isNotEmpty())
                                @foreach ($forumData as $forum)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $forum->creator->name }}</td>
                                        <td>{{ $forum->title }}</td>
                                        <td>{{ $forum->content }}</td>
                                        <td class="text-center"><a
                                                href="{{ route('admin.forums.details', ['forumId' => $forum->id]) }}"><i
                                                    class="fas fa-fw fa-eye"></i></a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="11" class="text-center">No data available</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="row mt-3 justify-content-center" style="width: 70%; margin:auto;">
                        {{ $forumData->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
