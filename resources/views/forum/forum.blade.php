@extends('components.layout')
@section('content')
    <div class="containers py-2">
        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New Post
        </button> --}}

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="email" class="form-control" id="title" placeholder="Rekomendasi Mobil">
                            </div>
                            <div class="mb-3">
                                <label for="inputTextarea" class="form-label">Content</label>
                                <textarea class="form-control" id="inputTextarea" rows="5" style="resize: none"></textarea>
                            </div>
                        </form>
                    </div>
                    <div style="position: relative; height: 50px;">
                        <button type="button" class="btn btn-primary"
                            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row justify-content-center border-bottom pb-2">
            <h2 class="col-9">Forums</h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add New Post
            </button>
        </div> --}}
        <div class="px-5">
            <div class="row justify-items-center my-3 pb-2">
                <h2 class="border-bottom col-md-4">Forums</h2>
                <h2 class="col-md-6"></h2>
                <button type="button" class="ml-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add New Post
                </button>
                {{-- <h2 class="border-bottom col-md-4">Daftar Penjualan</h2> --}}
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <a class="col-5 card glow-card p-3 m-3" style="text-decoration: none; cursor:pointer; color:black;">
                <div class="d-flex justify-content-between">
                    <h3 class="col-9">Card Title 1</h3>
                    <p class="col-3 tezt text-right text-muted">2 Minutes ago</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="col">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit accusamus, nostrum nulla
                        quam suscipit maxime dolorem tempore fuga id doloribus ab pariatur ad ullam obcaecati mollitia,
                        necessitatibus corrupti! Corrupti, recusandae.</p>
                </div>
            </a>
            <a class="col-5 card glow-card p-3 m-3" style="text-decoration: none; cursor:pointer; color:black;">
                <div class="d-flex justify-content-between">
                    <h3 class="col-9">Card Title 1</h3>
                    <p class="col-3 tezt text-right text-muted">2 Minutes ago</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="col">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit accusamus, nostrum nulla
                        quam suscipit maxime dolorem tempore fuga id doloribus ab pariatur ad ullam obcaecati mollitia,
                        necessitatibus corrupti! Corrupti, recusandae.</p>
                </div>
            </a>
            <a class="col-5 card glow-card p-3 m-3" style="text-decoration: none; cursor:pointer; color:black;">
                <div class="d-flex justify-content-between">
                    <h3 class="col-9">Card Title 1</h3>
                    <p class="col-3 tezt text-right text-muted">2 Minutes ago</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="col">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit accusamus, nostrum nulla
                        quam suscipit maxime dolorem tempore fuga id doloribus ab pariatur ad ullam obcaecati mollitia,
                        necessitatibus corrupti! Corrupti, recusandae.</p>
                </div>
            </a>
            <a class="col-5 card glow-card p-3 m-3" style="text-decoration: none; cursor:pointer; color:black;">
                <div class="d-flex justify-content-between">
                    <h3 class="col-9">Card Title 1</h3>
                    <p class="col-3 tezt text-right text-muted">2 Minutes ago</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="col">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit accusamus, nostrum nulla
                        quam suscipit maxime dolorem tempore fuga id doloribus ab pariatur ad ullam obcaecati mollitia,
                        necessitatibus corrupti! Corrupti, recusandae.</p>
                </div>
            </a>
            <a class="col-5 card glow-card p-3 m-3" style="text-decoration: none; cursor:pointer; color:black;">
                <div class="d-flex justify-content-between">
                    <h3 class="col-9">Card Title 1</h3>
                    <p class="col-3 tezt text-right text-muted">2 Minutes ago</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="col">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit accusamus, nostrum nulla
                        quam suscipit maxime dolorem tempore fuga id doloribus ab pariatur ad ullam obcaecati mollitia,
                        necessitatibus corrupti! Corrupti, recusandae.</p>
                </div>
            </a>
            <a class="col-5 card glow-card p-3 m-3" style="text-decoration: none; cursor:pointer; color:black;">
                <div class="d-flex justify-content-between">
                    <h3 class="col-9">Card Title 1</h3>
                    <p class="col-3 tezt text-right text-muted">2 Minutes ago</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="col">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit accusamus, nostrum nulla
                        quam suscipit maxime dolorem tempore fuga id doloribus ab pariatur ad ullam obcaecati mollitia,
                        necessitatibus corrupti! Corrupti, recusandae.</p>
                </div>
            </a>
        </div>
        <div class="row my-3 justify-content-center" style="width: 70%; margin:auto;">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
