@extends('components.layout')
@section('content')
    <div class="main-content">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('create.forum') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Rekomendasi Mobil" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputTextarea" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5" style="resize: none" required></textarea>
                            </div>
                            <div style="position: relative; height: 50px;">
                                <button type="submit" class="btn btn-primary"
                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-5">
            <div class="row justify-items-center my-3 pb-2">
                <h2 class="border-bottom col-md-4 ">Forums</h2>
                <h2 class=" col-md-6 "></h2>
                @if (Auth::check())
                    <div class="col-2 text-right">
                        <button type="button" class="ml-5 btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Add New Post
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="containers pb-3 px-5">
            <div class="row justify-content-center">
                <div class="row justify-content-center mt-3 w-100">
                    @if ($forumData->isNotEmpty())
                        @foreach ($forumData as $forum)
                            <a href="forums/{{ $forum->id }}" class="col-11 card glow-card p-3 m-3"
                                style="text-decoration: none; cursor:pointer; color:black; height: 12rem">
                                <div class="d-flex justify-content-between">
                                    <h3 class="col-9">{{ $forum->title }}</h3>
                                    <p class="col-3 tezt text-right text-muted">{{ $forum->creator->name }}
                                        {{ $forum->created_at->locale('fr')->isoFormat('DD/MM/YY HH:mm') }}</p>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <p class="col">{{ $forum->content }}</p>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="text-center mt-5">
                            <h2>No data available.</h2>
                        </div>
                    @endif
                </div>
                <div class="row mt-3 justify-content-center" style="width: 70%; margin:auto;">
                    {{ $forumData->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
