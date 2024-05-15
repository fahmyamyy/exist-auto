@extends('components.layout')
@section('content')
    <div class="main-content">
        <div class="px-5">
            <div class="row justify-items-center my-3 pb-2">
                <h2 class="border-bottom col-md-4 ">Forums</h2>
            </div>
        </div>
        <div class="containers pb-3 px-5">
            <div class="row justify-content-center">
                <div class="col-11 card shadow-sm p-3 m-3" style="height: 12rem">
                    <div class="d-flex justify-content-between">
                        <h3 class="col-9">{{ $forum->title }}</h3>
                        <p class="col-3 tezt text-right text-muted pr-0">{{ $forum->creator->name }}
                            {{ $forum->created_at->locale('fr')->isoFormat('DD/MM/YY HH:mm') }}</p>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <p class="col pr-0">{{ $forum->content }}</p>
                    </div>
                </div>
                @foreach ($comments as $comment)
                    <div class="col-10 card shadow-sm p-3 m-3" style="height: 11rem">
                        <div class="d-flex justify-content-between">
                            <p class="col-12 tezt text-right text-muted pr-0">{{ $comment->creator->name }}
                                {{ $comment->created_at->locale('fr')->isoFormat('DD/MM/YY HH:mm') }}</p>
                            </p>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <p class="col pr-0">{{ $comment->comment }}</p>
                        </div>
                    </div>
                @endforeach
                <div class="row mt-3 justify-content-center" style="width: 70%; margin:auto;">
                    {{ $comments->links('pagination::bootstrap-5') }}
                </div>
                <div class="col-11 my-2">
                    <form id="commentForm" method="POST" action="{{ route('create.comment') }}">
                        @csrf
                        <input type="hidden" id="authStatus" value="{{ Auth::check() ? 'true' : 'false' }}">
                        <input type="hidden" name="postId" id="postId" value="{{ $forum->id }}">

                        <div class="mb-3">
                            <textarea class="form-control" id="comment" name="comment" rows="5" style="resize: none"
                                placeholder="Leave a comment..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const authStatus = document.getElementById('authStatus').value === 'true';

            if (!authStatus) {
                const formElements = document.getElementById('commentForm').elements;
                for (let i = 0; i < formElements.length; i++) {
                    formElements[i].disabled = true;
                }
            }
        });
    </script>
@endsection
