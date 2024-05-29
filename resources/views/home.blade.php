<style>
    .carousel-item {
        height: 500px;
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
                @php
                    $totalCards = 9;
                    $cardsPerSlide = 3;
                    $allItems = $carData->all();
                    $placeholdersNeeded = $totalCards - count($allItems);

                    for ($i = 0; $i < $placeholdersNeeded; $i++) {
                        $allItems[] = null;
                    }

                    $chunks = array_chunk($allItems, $cardsPerSlide);
                @endphp

                @foreach ($chunks as $index => $chunk)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div style="display: flex; justify-content: space-around;" class="container">
                            @foreach ($chunk as $car)
                                @if ($car)
                                    <div class="card shadow-sm" style="width: 20rem;">
                                        <a href="{{ route('car.detail', ['carId' => $car->id]) }}">
                                            @if ($car->image != null)
                                                <img style="max-height: 212px" class="card-img-top"
                                                    src="{{ asset('storage/uploads/' . $car->image->file_name . '.' . $car->image->file_type) }}"
                                                    alt="Card image cap">
                                            @else
                                                <img style="max-height: 212px" class="card-img-top"
                                                    src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                                                    alt="Card image cap">
                                            @endif
                                        </a>
                                        <ul class="list-group list-group-flush">
                                            <div class="p-4">
                                                <a href="{{ route('car.detail', ['carId' => $car->id]) }}"
                                                    style="text-decoration: none; cursor: pointer; color: black;">
                                                    <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">
                                                        {{ $car->carModel->carBrand->brand }}
                                                        {{ $car->carModel->model }} {{ $car->year }}</h4>
                                                    <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                                        {{ $car->mileage }} KM • {{ $car->transmission }} •
                                                        {{ $car->location }}
                                                    </p>
                                                </a>
                                                <div class="mt-4" style="display: flex; justify-content: space-between;">
                                                    <p class="text-left text-danger font-weight-bold">
                                                        {{ $car->price_credit }}</p>
                                                    <p style="font-size: 10pt; margin-left: auto;">
                                                        {{ $car->price_installment }}</p>
                                                </div>
                                                <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">
                                                    {{ $car->price_cash }} (Cash)
                                                </p>
                                            </div>
                                            <a href="{{ route('checkout.view', ['carId' => $car->id]) }}"
                                                class="m-4 mt-1 btn btn-danger">Buy
                                                Now</a>
                                        </ul>
                                    </div>
                                @else
                                    <div class="card shadow-sm" style="width: 20rem;">
                                        <a href="">
                                            <img style="max-height: 212px; min-height: 212px" class="card-img-top"
                                                {{-- src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg" --}}
                                                src="https://carwow-uk-wp-3.imgix.net/18015-MC20BluInfinito-scaled-e1707920217641.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=10&w=800"
                                                alt="Card image cap">
                                        </a>
                                        <ul class="list-group list-group-flush">
                                            <div class="p-4">
                                                <a href="#"
                                                    style="text-decoration: none; cursor: pointer; color: black;">
                                                    <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">
                                                        FOR SALE</h4>
                                                    <p style="font-size: 10pt" class="card-text text-secondary text-left">
                                                        XXX.XXX KM • Location • Transmission</p>
                                                </a>
                                                <div class="mt-4" style="display: flex; justify-content: space-between;">
                                                    <p class="text-left text-danger font-weight-bold">Rp. XXX.XXX.XXX</p>
                                                    <p style="font-size: 10pt; margin-left: auto;">Rp. X,X Juta/Bulan</p>
                                                </div>
                                                <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp.
                                                    XXX.XXX.XXX (Cash)
                                                </p>
                                            </div>
                                            <a href="#" onclick="event.preventDefault();"
                                                class="m-4 mt-1 btn btn-danger">Buy Now</a>
                                        </ul>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
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

    <div class="alert alert-dark pb-4">
        <div class="mx-auto text-center my-3">
            <h1>Latest Blog</h1>
        </div>
        <div class="container">
            @if ($forumData && $forumData->count() > 0)
                @foreach ($forumData as $forum)
                    <div class="card" style="width: 18rem;">
                        <a href="{{ route('forum.detail', ['forumId' => $forum->id]) }}" class="card-body"
                            style="text-decoration: none; cursor: pointer; color: black;">
                            <h5 class="card-title font-weight-bold">{{ $forum->title }}</h5>
                            <p class="card-text">{{ $forum->content }}</p>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="card" style="width: 18rem;">
                    <a href="#" onclick="event.preventDefault();" class="card-body"
                        style="text-decoration: none; cursor: pointer; color: black;">
                        <h5 class="card-title font-weight-bold">Forum Title</h5>
                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi delectus
                            voluptates rem suscipit quidem cum voluptatem optio voluptatum atque dolores, ducimus natus
                            minus asperiores esse tenetur sint iusto debitis vitae.</p>
                    </a>
                </div>
                <div class="card" style="width: 18rem;">
                    <a href="#" onclick="event.preventDefault();" class="card-body"
                        style="text-decoration: none; cursor: pointer; color: black;">
                        <h5 class="card-title font-weight-bold">Forum Title</h5>
                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi delectus
                            voluptates rem suscipit quidem cum voluptatem optio voluptatum atque dolores, ducimus natus
                            minus asperiores esse tenetur sint iusto debitis vitae.</p>
                    </a>
                </div>
                <div class="card" style="width: 18rem;">
                    <a href="#" onclick="event.preventDefault();" class="card-body"
                        style="text-decoration: none; cursor: pointer; color: black;">
                        <h5 class="card-title font-weight-bold">Forum Title</h5>
                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi delectus
                            voluptates rem suscipit quidem cum voluptatem optio voluptatum atque dolores, ducimus natus
                            minus asperiores esse tenetur sint iusto debitis vitae.</p>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <div class="my-5">
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
    <div class="w-100 containers"
        style="background-image: url(https://lh3.googleusercontent.com/p/AF1QipP1-ORgxESW4w9Sb1eQnnGqEXZ-nZPdWHpbrYj_=s680-w680-h510); background-size: cover; background-position: center; display: flex; align-items: center; justify-content: center; height: 60vh;">
        <div class="accordion w-100 p-5 m-5" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            FAQ #1
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
                            FAQ #2
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
                            FAQ #3
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
@endsection
