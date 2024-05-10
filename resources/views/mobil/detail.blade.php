@extends('components.layout')
@section('content')
    {{-- <style>
        html,
        body {
            height: 100%;
            /* Ensure the full height of the page */
            margin: 0;
            /* Remove default margin */
        }
    </style> --}}
    {{-- <div class="h-100 p-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-7">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
                            style="max-height:800px">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img style="width: 100%; height:500px; object-fit:cover" src="https://hips.hearstapps.com/hmg-prod/images/honda-prelude-concept-front-three-quarters-653927960f1f4.jpg?crop=1.00xw:0.920xh;0,0.0801xh&resize=980:*"
                                        class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img style="width: 100%; height:500px; object-fit:cover" src="https://car-images.bauersecure.com/wp-images/4738/should_i_buy_an_electric_car.jpg"
                                        class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h2>Image Title</h2>
                        <p>This is the description of the image. Here you can add details about the image, such as its
                            context, where it was taken, what it represents, and other interesting information.</p>
                        <ul>
                            <li>Date Taken: 2024-01-01</li>
                            <li>Location: Somewhere on Earth</li>
                            <li>Photographer: John Doe</li>
                        </ul>
                        <button class="btn btn-primary mt-3">More Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="m-4 p-3">
        <div class="row">
            <div class="col-md-12">
                <div class="row align-items-start">
                    <!-- Image Section -->
                    <div class="col-md-7">
                        <div id="carouselExampleIndicators" class="carousel" data-ride="carousel"
                            style="max-width: 100%; height: auto;">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img style="width: 100%; height:500px; object-fit:cover"
                                        src="https://hips.hearstapps.com/hmg-prod/images/honda-prelude-concept-front-three-quarters-653927960f1f4.jpg?crop=1.00xw:0.920xh;0,0.0801xh&resize=980:*"
                                        class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img style="width: 100%; height:500px; object-fit:cover"
                                        src="https://car-images.bauersecure.com/wp-images/4738/should_i_buy_an_electric_car.jpg"
                                        class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <!-- Details Section -->
                    <div class="card col-md-5">
                        <div class="p-2">
                        <a href="#" style="text-decoration: none; cursor: pointer; color: black;">
                            <h2 class="my-2">Mercedes-Benz</h2>
                            <p style="font-size: 10pt" class="card-text text-secondary text-left">24.000KM • Manual • Jakarta</p>
                        </a>
                        <div class="mt-4" style="display: flex; justify-content: space-between;">
                            <p class="text-left text-danger font-weight-bold">Rp. 150.000.000 (Cash)</p>
                        </div>
                        <p style="font-size: 10pt; margin-bottom:0px; bottom:0" class="text-left">Rp. 150.000.000</p>
                        <p class="text-left" style="font-size: 10pt;">6,4 Juta/Bulan</p>
                    </div>
                        <button class="btn btn-primary my-3">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto text-center m-4 pt-4 border-top">
        <h1>
            Recommendation Car
        </h1>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid, animi, quas sit non aut obcaecati at
            accusantium impedit necessitatibus nesciunt ipsum repellat nulla accusamus maiores, ex cumque earum officia?
            Modi?
        </p>

        <div id="carouselExampleIndicator2" class="carousel slide" data-ride="carousel" style="max-height:600px">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div style="display: flex; justify-content: space-between;" class="container">
                        <div class="card shadow" style="width: 20rem;">
                            <a href="">
                                <img class="card-img-top"
                                    src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                                    alt="Card image cap">
                            </a>
                            <ul class="list-group list-group-flush">
                                <div class="p-4">
                                    <a href="#" style="text-decoration: none; cursor: pointer; color: black;">
                                        <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">
                                            Mercedes-Benz</h4>
                                        <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                            24.000KM•Manual•Jakarta
                                        </p>
                                    </a>
                                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                                        <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                                    </div>
                                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000
                                        (Cash)
                                    </p>
                                </div>
                                <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
                            </ul>
                        </div>

                        <div class="card shadow" style="width: 20rem;">
                            <a href="">
                                <img class="card-img-top"
                                    src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                                    alt="Card image cap">
                            </a>
                            <ul class="list-group list-group-flush">
                                <div class="p-4">
                                    <a href="#" style="text-decoration: none; cursor: pointer; color: black;">
                                        <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">
                                            Mercedes-Benz</h4>
                                        <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                            24.000KM•Manual•Jakarta
                                        </p>
                                    </a>
                                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                                        <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                                    </div>
                                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000
                                        (Cash)
                                    </p>
                                </div>
                                <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
                            </ul>
                        </div>
                        <div class="card shadow" style="width: 20rem;">
                            <a href="">
                                <img class="card-img-top"
                                    src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                                    alt="Card image cap">
                            </a>
                            <ul class="list-group list-group-flush">
                                <div class="p-4">
                                    <a href="#" style="text-decoration: none; cursor: pointer; color: black;">
                                        <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">
                                            Mercedes-Benz</h4>
                                        <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                            24.000KM•Manual•Jakarta
                                        </p>
                                    </a>
                                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                                        <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                                    </div>
                                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000
                                        (Cash)
                                    </p>
                                </div>
                                <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div style="display: flex; justify-content: space-between;" class="container">
                        <div class="card shadow" style="width: 20rem;">
                            <a href="">
                                <img class="card-img-top"
                                    src="https://car-images.bauersecure.com/wp-images/4738/should_i_buy_an_electric_car.jpg"
                                    alt="Card image cap">
                            </a>
                            <ul class="list-group list-group-flush">
                                <div class="p-4">
                                    <a href="#" style="text-decoration: none; cursor: pointer; color: black;">
                                        <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">
                                            Mercedes-Benz</h4>
                                        <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                            24.000KM•Manual•Jakarta
                                        </p>
                                    </a>
                                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                                        <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                                    </div>
                                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000
                                        (Cash)
                                    </p>
                                </div>
                                <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
                            </ul>
                        </div>

                        <div class="card shadow" style="width: 20rem;">
                            <a href="">
                                <img class="card-img-top"
                                    src="https://car-images.bauersecure.com/wp-images/4738/should_i_buy_an_electric_car.jpg"
                                    alt="Card image cap">
                            </a>
                            <ul class="list-group list-group-flush">
                                <div class="p-4">
                                    <a href="#" style="text-decoration: none; cursor: pointer; color: black;">
                                        <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">
                                            Mercedes-Benz</h4>
                                        <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                            24.000KM•Manual•Jakarta
                                        </p>
                                    </a>
                                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                                        <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                                    </div>
                                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000
                                        (Cash)
                                    </p>
                                </div>
                                <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
                            </ul>
                        </div>
                        <div class="card shadow" style="width: 20rem;">
                            <a href="">
                                <img class="card-img-top"
                                    src="https://car-images.bauersecure.com/wp-images/4738/should_i_buy_an_electric_car.jpg"
                                    alt="Card image cap">
                            </a>
                            <ul class="list-group list-group-flush">
                                <div class="p-4">
                                    <a href="#" style="text-decoration: none; cursor: pointer; color: black;">
                                        <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">
                                            Mercedes-Benz</h4>
                                        <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                            24.000KM•Manual•Jakarta
                                        </p>
                                    </a>
                                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                                        <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                                    </div>
                                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000
                                        (Cash)
                                    </p>
                                </div>
                                <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicator2" role="button" data-slide="prev"
                style="filter: invert(100%);">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicator2" role="button" data-slide="next"
                style="filter: invert(100%);">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
@endsection
