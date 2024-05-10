@extends('components.layout')

@section('content')
    <div class="px-5">
        <div class="row justify-items-center my-3 pb-2">
            <h2 class="border-bottom col-md-4 ">Jual Mobilmu</h2>
            <h2 class=" col-md-2 "></h2>
            <h2 class="border-bottom col-md-4 ml-3">Daftar Penjualan</h2>
        </div>
    </div>
    <div class="containers pb-5 px-5">
        {{-- <div class="row justify-items-center mb-3">
            <h2 class="col-md-6">Jual Mobilmu</h2>
            <h2 class="col-md-6">Daftar Penjualan</h2>
        </div> --}}
        <div class="row justify-items-round">
            <!-- Form Section -->
            <div class="card shadow-sm col-md-6 mb-3 justify-content-center">
                {{-- <h2 class="">Jual Mobilmu</h2> --}}
                <form class="px-4 form-filter">
                    <div class="row mt-4">
                        <!-- First Column -->
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="brand">Merek</label>
                                <select class="form-control" id="brand" name="brand">
                                    <option value="toyota">Toyota</option>
                                    <option value="honda">Honda</option>
                                    <option value="mazda">Mazda</option>
                                    <option value="wuling">Wuling</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="brand">Model</label>
                                <select class="form-control" id="brand" name="brand">
                                    <option value="toyota">Toyota</option>
                                    <option value="honda">Honda</option>
                                    <option value="mazda">Mazda</option>
                                    <option value="wuling">Wuling</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="model_type">Tipe</label>
                                <select class="form-control" id="model_type" name="model_type">
                                    <option value="suv">SUV</option>
                                    <option value="sedan">Sedan</option>
                                    <option value="hatchback">Hatchback</option>
                                    <option value="van">Van</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="kilometer">Kilometer</label>
                                <div class="row align-items-center">
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="kilometer" id="kilometer"
                                            placeholder="10.000" maxlength="7" oninput="numberFormat()" required>
                                    </div>
                                    <div class="col-2">
                                        <p>KM</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="transmission">Transmisi</label>
                                <select class="form-control" id="transmission" name="transmission">
                                    <option value="manual">Manual</option>
                                    <option value="automatic">Otomatis</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="color">Warna</label>
                                <select class="form-control" id="color" name="color">
                                    <option value="hitam">Hitam</option>
                                    <option value="putih">Putih</option>
                                    <option value="merah">Merah</option>
                                    <option value="biru">Biru</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="location">Lokasi</label>
                                <select class="form-control" id="location" name="location">
                                    <option value="jakarta">Jakarta</option>
                                    <option value="bogor">Bogor</option>
                                    <option value="tangerang">Tangerang</option>
                                    <option value="depok">Depok</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="year">Tahun</label>
                                <select class="form-control" id="year" name="year">
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-success m-3 col">Jual</button>
                        {{-- <button type="reset" class="btn btn-danger m-3 col">Reset</button> --}}
                    </div>
                </form>
            </div>

            <!-- Cards and Pagination Section -->
            <div class="col-md-6 flex justify-items-center">
                {{-- <h2 class="">Daftar Penjualan</h2> --}}
                <a href="#" class="card shadow-sm mb-3" style="text-decoration: none; cursor: pointer; color: black;">
                    <div class="row g-0 align-items-center"> <!-- Ensure content is vertically centered -->
                        <div class="col-auto"> <!-- Use col-auto to fit the content's width -->
                            <img src="https://via.placeholder.com/100x100" class="img-fluid ml-4" alt="Card image cap"
                                style="max-width: 100px; height: auto; object-fit: cover;">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Mercedes-Benz</h5>
                                <p class="card-text">24.000KM • Manual • Jakarta</p>
                                <p class="card-text">24.000KM • Manual • Jakarta</p>
                                <p class="card-text text-success font-weight-bold">Approved</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#" class="card shadow-sm mb-3"
                    style="text-decoration: none; cursor: pointer; color: black;">
                    <div class="row g-0 align-items-center"> <!-- Ensure content is vertically centered -->
                        <div class="col-auto"> <!-- Use col-auto to fit the content's width -->
                            <img src="https://via.placeholder.com/200x200" class="img-fluid ml-4" alt="Card image cap"
                                style="max-width: 100px; height: auto; object-fit: cover;">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Mercedes-Benz</h5>
                                <p class="card-text">24.000KM • Manual • Jakarta</p>
                                <p class="card-text">24.000KM • Manual • Jakarta</p>
                                <p class="card-text text-success font-weight-bold">Approved</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#" class="card shadow-sm mb-3"
                    style="text-decoration: none; cursor: pointer; color: black;">
                    <div class="row g-0 align-items-center"> <!-- Ensure content is vertically centered -->
                        <div class="col-auto"> <!-- Use col-auto to fit the content's width -->
                            <img src="https://via.placeholder.com/100x100" class="img-fluid ml-4" alt="Card image cap"
                                style="max-width: 100px; height: auto; object-fit: cover;">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Mercedes-Benz</h5>
                                <p class="card-text">24.000KM • Manual • Jakarta</p>
                                <p class="card-text">24.000KM • Manual • Jakarta</p>
                                <p class="card-text text-success font-weight-bold">Approved</p>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Mock Pagination -->
                <div class="row justify-content-center" style="width: 70%; margin:auto;">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function numberFormat() {
        let input = document.getElementById('kilometer');
        let value = input.value.replace(/[^0-9]/g, ''); // Remove all non-numeric characters
        value = value.replace(/^0+/, ''); // Remove leading zeros
        if (value) {
            value = parseInt(value, 10); // Convert string to integer to remove any leading zeros
            value = value.toLocaleString(); // Convert to local string format with dot as thousand separator
        }
        input.value = value.replace(/,/g, '.'); // Replace commas if locale uses commas for thousand separator
    }
</script>
