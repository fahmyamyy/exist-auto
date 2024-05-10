{{-- @include('components.navbar') --}}
@extends('components.layout')
@section('content')
    <style>
        .container-second {
            /* width: 70%; */
            margin: auto;
            /* Center the container */
        }

        .container-sticky {
            background-color: rgba(200, 200, 200, 0.4);
            position: sticky;
            top: 0px;
            /* Adjust based on your navbar's actual height */
            z-index: 1;
            /* background-color: white; */
            width: 100%;
            margin: auto;
            /* Center the container */
        }

        .form {
            position: relative;
            width: 100%;
        }

        .search-iconn {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: gray;
        }

        .search-placeholder {
            padding-left: 30px;
        }
    </style>



    <!-- Cards Container -->
    <div class="bg-gradient-light">
        <div class="container-sticky py-3 border-bottom">
            <div class="row justify-content-between" style="width: 70%; margin:auto;">
                <div class="col-10">
                    <div class="form">
                        <i class="fa fa-search search-iconn"></i>
                        <input type="text" class="form-control search-placeholder" placeholder="Search anything...">
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary filter-button" onclick="toggleNav()">☰ Filter</button>
                </div>
            </div>
        </div>

        <div class="container-second my-4">
            <div style="row;" class="container">
                <div class="card shadow filtered m-2" style="width: 25rem;">
                    <a href="">
                        <img class="card-img-top"
                            src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                            alt="Card image cap">
                    </a>
                    <ul class="list-group list-group-flush">
                        <div class="p-4">
                            <a href="#" style="text-decoration: none; cursor: pointer; color:black">
                                <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                                <p style="font-size: 10pt" class="card-text text-secondary">24.000KM • Manual • Jakarta</p>
                            </a>
                            <div class="mt-4" style="display: flex; justify-content: space-between;">
                                <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                            </div>
                            <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)</p>
                        </div>
                        <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
                    </ul>
                </div>
                <div class="card shadow filtered m-2" style="width: 25rem;">
                    <a href="">
                        <img class="card-img-top"
                            src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                            alt="Card image cap">
                    </a>
                    <ul class="list-group list-group-flush">
                        <div class="p-4">
                            <a href="#" style="text-decoration: none; cursor: pointer; color:black">
                                <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                                <p style="font-size: 10pt" class="card-text text-secondary">24.000KM • Manual • Jakarta</p>
                            </a>
                            <div class="mt-4" style="display: flex; justify-content: space-between;">
                                <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                            </div>
                            <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)</p>
                        </div>
                        <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
                    </ul>
                </div>
                <div class="card shadow filtered m-2" style="width: 25rem;">
                    <a href="">
                        <img class="card-img-top"
                            src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                            alt="Card image cap">
                    </a>
                    <ul class="list-group list-group-flush">
                        <div class="p-4">
                            <a href="#" style="text-decoration: none; cursor: pointer; color:black">
                                <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                                <p style="font-size: 10pt" class="card-text text-secondary">24.000KM • Manual • Jakarta</p>
                            </a>
                            <div class="mt-4" style="display: flex; justify-content: space-between;">
                                <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                            </div>
                            <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)</p>
                        </div>
                        <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
                    </ul>
                </div>
            </div>
            <div style="row;" class="container">
                <div class="card shadow filtered m-2" style="width: 25rem;">
                    <a href="">
                        <img class="card-img-top"
                            src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                            alt="Card image cap">
                    </a>
                    <ul class="list-group list-group-flush">
                        <div class="p-4">
                            <a href="#" style="text-decoration: none; cursor: pointer; color:black">
                                <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                                <p style="font-size: 10pt" class="card-text text-secondary">24.000KM • Manual • Jakarta</p>
                            </a>
                            <div class="mt-4" style="display: flex; justify-content: space-between;">
                                <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                            </div>
                            <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)</p>
                        </div>
                        <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
                    </ul>
                </div>
                <div class="card shadow filtered m-2" style="width: 25rem;">
                    <a href="">
                        <img class="card-img-top"
                            src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                            alt="Card image cap">
                    </a>
                    <ul class="list-group list-group-flush">
                        <div class="p-4">
                            <a href="#" style="text-decoration: none; cursor: pointer; color:black">
                                <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                                <p style="font-size: 10pt" class="card-text text-secondary">24.000KM • Manual • Jakarta</p>
                            </a>
                            <div class="mt-4" style="display: flex; justify-content: space-between;">
                                <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                            </div>
                            <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)</p>
                        </div>
                        <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
                    </ul>
                </div>
                <div class="card shadow filtered m-2" style="width: 25rem;">
                    <a href="">
                        <img class="card-img-top"
                            src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                            alt="Card image cap">
                    </a>
                    <ul class="list-group list-group-flush">
                        <div class="p-4">
                            <a href="#" style="text-decoration: none; cursor: pointer; color:black">
                                <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                                <p style="font-size: 10pt" class="card-text text-secondary">24.000KM • Manual • Jakarta</p>
                            </a>
                            <div class="mt-4" style="display: flex; justify-content: space-between;">
                                <p class="text-left text-danger font-weight-bold">Rp. 150.000.000</p>
                                <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                            </div>
                            <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)</p>
                        </div>
                        <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="width: 70%; margin:auto;">
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
    {{-- 

<div class="row height d-flex justify-content-center align-items-center" style="">

    <div>
        <div class="col-md-6">
            <div class="form">
                <i class="fa fa-search search-icon"></i>
                <input type="text" class="form-control" placeholder="Search anything...">
            </div>
        </div>
    </div>

    <div style="display: flex; justify-content: space-between;" class="container">
        <!-- Card 1 -->
        <div class="card shadow filtered m-2" style="width: 25rem;">
            <a href="">
                <img class="card-img-top"
                    src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                    alt="Card image cap">
            </a>
            <ul class="list-group list-group-flush">
                <div class="p-4">
                    <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                    <div style="display: flex;">
                        <p style="font-size: 10pt" class="card-text text-secondary">24.000KM • Manual • Jakarta</p>
                    </div>
                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                        <p class="text-left text-danger">Rp. 150.000.000</p>
                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                    </div>
                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)</p>
                </div>
                <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
            </ul>
        </div>
        <div class="card shadow filtered m-2" style="width: 25rem;">
            <a href="">
                <img class="card-img-top"
                    src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                    alt="Card image cap">
            </a>
            <ul class="list-group list-group-flush">
                <div class="p-4">
                    <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                    <div style="display: flex;">
                        <p style="font-size: 10pt" class="card-text text-secondary">24.000KM • Manual • Jakarta</p>
                    </div>
                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                        <p class="text-left text-danger">Rp. 150.000.000</p>
                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                    </div>
                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)</p>
                </div>
                <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
            </ul>
        </div>
        <div class="card shadow filtered m-2" style="width: 25rem;">
            <a href="">
                <img class="card-img-top"
                    src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                    alt="Card image cap">
            </a>
            <ul class="list-group list-group-flush">
                <div class="p-4">
                    <h4 style="margin-bottom: 0px" class="card-title text-left text-bold">Mercedes-Benz</h4>
                    <div style="display: flex;">
                        <p style="font-size: 10pt" class="card-text text-secondary">24.000KM • Manual • Jakarta</p>
                    </div>
                    <div class="mt-4" style="display: flex; justify-content: space-between;">
                        <p class="text-left text-danger">Rp. 150.000.000</p>
                        <p style="font-size: 10pt; margin-left: auto;">Rp. 6,4 Juta/Bulan</p>
                    </div>
                    <p style="font-size: 10pt; margin-bottom:0px;" class="text-left">Rp. 150.000.000 (Cash)</p>
                </div>
                <a href="#" class="m-4 mt-1 btn btn-danger">Buy Now</a>
            </ul>
        </div>
    
    </div>
</div>


 --}}


    <script>
        // function toggleNav() {
        //     var sidebar = document.getElementById("filterSidebar");
        //     var currentWidth = sidebar.style.width;

        //     if (currentWidth === "250px" || currentWidth === "") {
        //         sidebar.style.width = "0";
        //         document.body.style.backgroundColor = "white";
        //     } else {
        //         sidebar.style.width = "250px";
        //         document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        //     }
        // }

        // function openNav() {
        //     document.getElementById("filterSidebar").style.width = "250px";
        //     document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        // }

        // function closeNav() {
        //     document.getElementById("filterSidebar").style.width = "0";
        //     document.body.style.backgroundColor = "white";
        // }

        // function toggleFilter() {
        //     const filterSidebar = document.getElementById('filterSidebar');
        //     filterSidebar.style.display = filterSidebar.style.display === 'block' ? 'none' : 'block';
        // }

        // Fungsi untuk reset filter
        function resetFilters() {
            document.getElementById('filterForm').reset();
            // Reset the slider positions
            setSliderValues();
        }

        // Fungsi untuk apply filter
        function applyFilters() {
            // Logika untuk mengumpulkan data filter dan menerapkan filter
            console.log("Filters applied");
        }

        // Fungsi untuk menetapkan nilai slider dan teks
        function setSliderValues() {
            const yearMinSlider = document.getElementById('yearMin');
            const yearMaxSlider = document.getElementById('yearMax');
            const yearMinText = document.getElementById('yearMinText');
            const yearMaxText = document.getElementById('yearMaxText');

            const priceMinSlider = document.getElementById('priceMin');
            const priceMaxSlider = document.getElementById('priceMax');
            const priceMinText = document.getElementById('priceMinText');
            const priceMaxText = document.getElementById('priceMaxText');

            yearMinText.value = yearMinSlider.value;
            yearMaxText.value = yearMaxSlider.value;

            priceMinText.value = priceMinSlider.value.toLocaleString();
            priceMaxText.value = priceMaxSlider.value.toLocaleString();

            yearMinSlider.oninput = function() {
                yearMinText.value = this.value;
            }

            yearMaxSlider.oninput = function() {
                yearMaxText.value = this.value;
            }

            priceMinSlider.oninput = function() {
                priceMinText.value = Number(this.value).toLocaleString();
            }

            priceMaxSlider.oninput = function() {
                priceMaxText.value = Number(this.value).toLocaleString();
            }
        }

        // Initialize the slider values when the script loads
        setSliderValues();
    </script>
    <div class="sidebar">
        @include('components.sidebar')
    </div>
@endsection
