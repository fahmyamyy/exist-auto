<style>
    /* .carousel-item img {
        width: auto;
        height: auto;
        max-height: 600px
    } */

    .carousel-item {
        height: 500px;
        /* Adjust this value based on your preference */
        transition: transform 0.5s ease;
    }

    .carousel-item img {
        height: 100%;
        /* Makes the image fill the height */
        object-fit: cover;
        /* Ensures the image covers the area without distorting aspect ratio */
        width: 100%;
        /* Ensures the image covers the full width of the carousel */
        flex: 0 0 33.3333%;
        /* Adjust this if you have more or fewer slides visible at once */

    }
</style>

@extends('components.layout')
@section('content')

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

    <div class="mx-auto text-center m-4">
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
                                        <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                                        <p style="font-size: 10pt" class="card-text text-secondary text-left">24.000KM•Manual•Jakarta
                                        </p>
                                    </a>
                                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                                        <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                                    </div>
                                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)
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
                                        <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                                        <p style="font-size: 10pt" class="card-text text-secondary text-left">24.000KM•Manual•Jakarta
                                        </p>
                                    </a>
                                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                                        <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                                    </div>
                                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)
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
                                        <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                                        <p style="font-size: 10pt" class="card-text text-secondary text-left">24.000KM•Manual•Jakarta
                                        </p>
                                    </a>
                                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                                        <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                                    </div>
                                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)
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
                                        <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                                        <p style="font-size: 10pt" class="card-text text-secondary text-left">24.000KM•Manual•Jakarta
                                        </p>
                                    </a>
                                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                                        <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                                    </div>
                                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)
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
                                        <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                                        <p style="font-size: 10pt" class="card-text text-secondary text-left">24.000KM•Manual•Jakarta
                                        </p>
                                    </a>
                                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                                        <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                                    </div>
                                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)
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
                                        <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                                        <p style="font-size: 10pt" class="card-text text-secondary text-left">24.000KM•Manual•Jakarta
                                        </p>
                                    </a>
                                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                                        <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                                    </div>
                                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)
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
        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque nemo excepturi error est architecto aperiam sunt
            similique incidunt temporibus! Magnam velit nobis sint error, qui doloribus? Consequuntur maiores similique
            praesentium!</p> --}}
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
    <div class="w-100 container" style="background-image: url(https://lh3.googleusercontent.com/p/AF1QipP1-ORgxESW4w9Sb1eQnnGqEXZ-nZPdWHpbrYj_=s680-w680-h510); background-size: cover; background-position: center; ">
        <div class="w-100 accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Collapsible Group Item #1
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body">
                        Some placeholder content for the first accordion panel. This panel is shown by default, thanks to
                        the <code>.show</code> class.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Collapsible Group Item #2
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        Some placeholder content for the second accordion panel. This panel is hidden by default.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Collapsible Group Item #3
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by
                        default.
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- style="background-image: url(https://lh3.googleusercontent.com/p/AF1QipP1-ORgxESW4w9Sb1eQnnGqEXZ-nZPdWHpbrYj_=s680-w680-h510); background-size: cover; background-position: center; " --}}

    {{-- <div class="alert alert-dark d-flex justify-content-center align-items-center"
        style="background-image: url(https://lh3.googleusercontent.com/p/AF1QipP1-ORgxESW4w9Sb1eQnnGqEXZ-nZPdWHpbrYj_=s680-w680-h510); background-size: cover; background-position: center; ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="https://lh3.googleusercontent.com/p/AF1QipP1-ORgxESW4w9Sb1eQnnGqEXZ-nZPdWHpbrYj_=s680-w680-h510"
                        class="img-fluid" alt="Image">
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Accordion Item #1
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the
                                collapse plugin adds the appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default variables.
                                It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Accordion Item #2
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until
                                the collapse plugin adds the appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default variables.
                                It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                                collapse plugin adds the appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default variables.
                                It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
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
    </div> --}}
@endsection
