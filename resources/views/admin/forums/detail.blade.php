@extends('components.admin.layout')
@section('content')
    <div class="container-fluid py-2">
        <div class="row px-2 mt-4">
            <div class="card shadow-sm col-xl-12 col-md-12 mb-4">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Forum Details</h6>
                    <button class="btn btn-danger" onclick="deleteForum('{{ $forum->id }}')">Delete</button>
                </div>
                <div class="card-body">
                    <form class="px-4 form-filter" method="POST"
                        action="{{ route('admin.forums.update', ['forumId' => $forum->id]) }}">
                        <input type="hidden" name="_method" value="PUT" />
                        @csrf
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="color">User Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $forum->creator->name }}" disabled>
                                </div>
                                <div class="mb-4">
                                    <label for="color">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ $forum->title }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="color">Content</label>
                                    <textarea class="form-control" id="content" name="content" rows="5" style="resize: none" required>{{$forum->content}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success m-3 col">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteForum(forumId) {
            if (confirm('Are you sure you want to delete this forum?')) {
                fetch(`/admin/forums/${forumId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    })
                    .then(response => {
                        if (response.ok) {
                            window.location.href = '/admin/forums';
                        } else {
                            console.error('Failed to delete the forum.');
                        }
                    })
                    .catch(error => console.error('Error deleting forum:', error));
            }
        }
    </script>
@endsection
