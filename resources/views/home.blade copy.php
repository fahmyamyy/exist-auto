@include('components.navbar')
<style>
    /* .carousel-item img {
        width: auto;
        height: auto;
        max-height: 600px
    } */

    .carousel-item {
        height: 500px; /* Adjust this value based on your preference */
    }

    .carousel-item img {
        height: 100%; /* Makes the image fill the height */
        object-fit: cover; /* Ensures the image covers the area without distorting aspect ratio */
        width: 100%; /* Ensures the image covers the full width of the carousel */
    }
</style>

{{-- @extends('app')
@section('content')
    
@endsection --}}
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="max-height:800px">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://hips.hearstapps.com/hmg-prod/images/honda-prelude-concept-front-three-quarters-653927960f1f4.jpg?crop=1.00xw:0.920xh;0,0.0801xh&resize=980:*"
                class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://car-images.bauersecure.com/wp-images/4738/should_i_buy_an_electric_car.jpg"
                class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="mx-auto text-center mt-4">
    <h1>
        Recommendation Car
    </h1>
    <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid, animi, quas sit non aut obcaecati at
        accusantium impedit necessitatibus nesciunt ipsum repellat nulla accusamus maiores, ex cumque earum officia?
        Modi?
    </p>

    <div style="display: flex; justify-content: space-between;" class="container">
        <div class="card shadow" style="width: 20rem;">
            <a href="">
                <img class="card-img-top"
                    src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                    alt="Card image cap">
            </a>
            <ul class="list-group list-group-flush">
                <div class="p-4">
                    <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                    <div style="display: flex;">
                        <p style="font-size: 10pt" class="card-text text-secondary">24.000KM•Manual•Jakarta</p>
                    </div>
                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                        <p class="text-left text-danger">Rp. 150.000.000</p>
                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                    </div>
                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)</p>
                </div>
                <a href="#" class="m-4 mt-1 btn btn-danger"><i class="fa-solid fa-cart-shopping"></i></a>
            </ul>
        </div>

        <div class="card shadow" style="width: 20rem;">
            <a href="">
                <img class="card-img-top"
                    src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                    alt="Card image cap">
            </a>
            <div class="p-4">
                <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                <div style="display: flex;">
                    <p style="font-size: 10pt" class="card-text text-secondary">24.000KM•Manual•Jakarta</p>
                </div>
                <div class="mt-4" style="display: flex; justify-content: space-between;">
                    <p class="text-left text-danger">Rp. 150.000.000</p>
                    <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                </div>
                <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)</p>
            </div>
            <a href="#" class="m-4 mt-1 btn btn-danger"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
        <div class="card shadow" style="width: 20rem;">
            <a href="">
                <img class="card-img-top"
                    src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                    alt="Card image cap">
            </a>
            <ul class="list-group list-group-flush">
                <div class="p-4">
                    <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                    <div style="display: flex;">
                        <p style="font-size: 10pt" class="card-text text-secondary">24.000KM•Manual•Jakarta</p>
                    </div>
                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                        <p class="text-left text-danger">Rp. 150.000.000</p>
                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                    </div>
                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)</p>
                </div>
                <a href="#" class="m-4 mt-1 btn btn-danger"><i class="fa-solid fa-cart-shopping"></i></a>
            </ul>
        </div>
    </div>


    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque nemo excepturi error est architecto aperiam sunt
        similique incidunt temporibus! Magnam velit nobis sint error, qui doloribus? Consequuntur maiores similique
        praesentium!</p>
</div>

<div class="alert alert-dark">
    <div class="mx-auto text-center mt-4">
        <h1>Latest Blog</h1>
    </div>
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-secondary">Go somewhere</a>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-secondary">Go somewhere</a>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-secondary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>

<div class="">
    <div class="mx-auto text-center">
        <h1>Our Happy Clients</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="width: 100%; margin-top: 20px;">
                    <div class="card-body">
                        <p class="card-text">"Some quick example text to build on the card title and make up the bulk
                            of the card's content."</p>
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 100%; margin-top: 20px;">
                    <div class="card-body">
                        <p class="card-text">"Some quick example text to build on the card title and make up the bulk
                            of the card's content."</p>
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-dark d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="https://lh3.googleusercontent.com/p/AF1QipP1-ORgxESW4w9Sb1eQnnGqEXZ-nZPdWHpbrYj_=s680-w680-h510"
                    class="img-fluid" alt="Image">
            </div>
            <div class="col-md-6">
                <h2>Frequently Asked Question</h2>

                <div class="card" style="margin-top: 0px;">
                    <div class="card-body">
                        <h4 class="card-title">Mobil disini kualitas seperti apa?</h4>
                        <p class="card-text">"Some quick example text to build on the card title and make up the bulk
                            of the card's content."</p>
                    </div>
                </div>

                <div class="card" style="margin-top: 20px;">
                    <div class="card-body">
                        <h4 class="card-title">Mobil disini kualitas seperti apa?</h4>
                        <p class="card-text">"Some quick example text to build on the card title and make up the bulk
                            of the card's content."</p>
                    </div>
                </div>

                <div class="card" style="margin-top: 20px;">
                    <div class="card-body">
                        <h4 class="card-title">Mobil disini kualitas seperti apa?</h4>
                        <p class="card-text">"Some quick example text to build on the card title and make up the bulk
                            of the card's content."</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="bg-dark text-white">
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div>
                    <h1>Need More Information?</h1>
                    <h5>Write your concern to us and our specialist will get back to you.</h5>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <button class="btn btn-primary">Contact Us</button>
            </div>
        </div>
    </div>
</div>