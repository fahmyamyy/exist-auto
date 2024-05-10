@include('components.navbar')
<style>
    .container-second {
        width: 70%;
        margin: auto; /* Center the container */
    }
    .container-sticky {
        position: sticky;
        top: 0px; /* Adjust based on your navbar's actual height */
        z-index: 999; /* Ensures it stays above other content */
        background-color: white;
        width: 100%;
        margin: auto; /* Center the container */
    }
    .form {
        position: relative;
        width: 100%;
    }
    .search-icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: gray;
    }
    .form-control {
        padding-left: 30px;
    }
</style>

@extends('app')
@section('content')

<!-- Cards Container -->
<div class="bg-gradient-light">
<div class="container-sticky py-3 border-bottom">
    <div class="row justify-content-center" style="width: 70%; margin:auto;">
        <div class="col-10">
            <div class="form">
                <i class="fa fa-search search-icon"></i>
                <input type="text" class="form-control" placeholder="Search anything...">
            </div>
        </div>
        <div class="col-2">
            <button class="btn btn-primary filter-button" onclick="toggleNav()">☰ Filter</button>
        </div>
    </div>
</div>

<div class="container-second my-4">
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <a href="#" class="border-bottom">
                    <img class="card-img-top"
                         src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                         alt="Card image cap">
                </a>
                <div class="card-body">
                    <h4 class="card-title">Mercedes-Benz</h4>
                    <p class="card-text text-secondary">24.000KM•Manual•Jakarta</p>
                    <div style="display: flex; justify-content: space-between;">
                        <p class="text-danger">Rp. 150.000.000</p>
                        <p>Rp. 6,4 Juta/Bulan</p>
                    </div>
                    <p>Rp. 150.000.000 (Cash)</p>
                </div>
                <a href="#" class="btn btn-danger"><i class="fa-solid fa-cart-shopping"></i> Buy</a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <a href="#">
                    <img class="card-img-top"
                         src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                         alt="Card image cap">
                </a>
                <div class="card-body">
                    <h4 class="card-title">Mercedes-Benz</h4>
                    <p class="card-text text-secondary">24.000KM•Manual•Jakarta</p>
                    <div style="display: flex; justify-content: space-between;">
                        <p class="text-danger">Rp. 150.000.000</p>
                        <p>Rp. 6,4 Juta/Bulan</p>
                    </div>
                    <p>Rp. 150.000.000 (Cash)</p>
                </div>
                <a href="#" class="btn btn-danger"><i class="fa-solid fa-cart-shopping"></i> Buy</a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <a href="#">
                    <img class="card-img-top"
                         src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                         alt="Card image cap">
                </a>
                <div class="card-body">
                    <h4 class="card-title">Mercedes-Benz</h4>
                    <p class="card-text text-secondary">24.000KM•Manual•Jakarta</p>
                    <div style="display: flex; justify-content: space-between;">
                        <p class="text-danger">Rp. 150.000.000</p>
                        <p>Rp. 6,4 Juta/Bulan</p>
                    </div>
                    <p>Rp. 150.000.000 (Cash)</p>
                </div>
                <a href="#" class="btn btn-danger"><i class="fa-solid fa-cart-shopping"></i> Buy</a>
            </div>
        </div>
        <!-- Additional cards can be similarly added -->
    </div>
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <a href="#">
                    <img class="card-img-top"
                         src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                         alt="Card image cap">
                </a>
                <div class="card-body">
                    <h4 class="card-title">Mercedes-Benz</h4>
                    <p class="card-text text-secondary">24.000KM•Manual•Jakarta</p>
                    <div style="display: flex; justify-content: space-between;">
                        <p class="text-danger">Rp. 150.000.000</p>
                        <p>Rp. 6,4 Juta/Bulan</p>
                    </div>
                    <p>Rp. 150.000.000 (Cash)</p>
                </div>
                <a href="#" class="btn btn-danger"><i class="fa-solid fa-cart-shopping"></i> Buy</a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <a href="#">
                    <img class="card-img-top"
                         src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                         alt="Card image cap">
                </a>
                <div class="card-body">
                    <h4 class="card-title">Mercedes-Benz</h4>
                    <p class="card-text text-secondary">24.000KM•Manual•Jakarta</p>
                    <div style="display: flex; justify-content: space-between;">
                        <p class="text-danger">Rp. 150.000.000</p>
                        <p>Rp. 6,4 Juta/Bulan</p>
                    </div>
                    <p>Rp. 150.000.000 (Cash)</p>
                </div>
                <a href="#" class="btn btn-danger"><i class="fa-solid fa-cart-shopping"></i> Buy</a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <a href="#">
                    <img class="card-img-top"
                         src="https://digital-bucket.prod.bfi.co.id/assets/Blog/Blog%20New/Jenis%20Jenis%20Mobil%20dan%20Merk%20Mobil%20Terlaris%20di%20Indonesia/jenis_jenis_mobil_mobil_sedan%20(1).jpg"
                         alt="Card image cap">
                </a>
                <div class="card-body">
                    <h4 class="card-title">Mercedes-Benz</h4>
                    <p class="card-text text-secondary">24.000KM•Manual•Jakarta</p>
                    <div style="display: flex; justify-content: space-between;">
                        <p class="text-danger">Rp. 150.000.000</p>
                        <p>Rp. 6,4 Juta/Bulan</p>
                    </div>
                    <p>Rp. 150.000.000 (Cash)</p>
                </div>
                <a href="#" class="btn btn-danger"><i class="fa-solid fa-cart-shopping"></i> Buy</a>
            </div>
        </div>
        <!-- Additional cards can be similarly added -->
    </div>
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
</div>


 --}}


<script>
    function toggleNav() {
        var sidebar = document.getElementById("filterSidebar");
        var currentWidth = sidebar.style.width;

        if (currentWidth === "250px" || currentWidth === "") {
            sidebar.style.width = "0";
            document.body.style.backgroundColor = "white";
        } else {
            sidebar.style.width = "250px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }
    }

    function openNav() {
        document.getElementById("filterSidebar").style.width = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("filterSidebar").style.width = "0";
        document.body.style.backgroundColor = "white";
    }

    function toggleFilter() {
        const filterSidebar = document.getElementById('filterSidebar');
        filterSidebar.style.display = filterSidebar.style.display === 'block' ? 'none' : 'block';
    }

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
