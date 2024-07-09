@extends('components.layout')
@section('heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajukan Pinjaman</h1>
    </div>
@endsection
@section('content')
    <div class="row px-2">
        <div class="card shadow col-xl-12 col-md-12 mb-4">
            <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ajukan Pinjaman</h6>
                <h6 class="m-0 font-weight-bold text-danger">Limit Tersedia: {{Auth::user()->limit}}</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('pinjaman.create') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}"
                                    disabled>
                            </div>
                            <div class="mb-3">
                                <label for="jumlahPinjaman" class="form-label">Total Pinjaman</label>
                                <div class="input-group">

                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" class="form-control nominal-format" name="jumlahPinjaman"
                                        id="jumlahPinjaman" required onchange="updateTotalPinjaman()">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="bank" class="form-label">Bank</label>
                                <select class="form-control" name="bank" id="bank">
                                    <option value="">--Bank--</option>
                                    <option value="BCA">BCA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" value="{{ Auth::user()->email }}"
                                    disabled>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="namaPemilikRekening" class="form-label">Nama Pemilik Rekening</label>
                                <input type="text" class="form-control alphabet-format" name="namaPemilikRekening"
                                    id="namaPemilikRekening" required>
                            </div>
                            <div class="mb-3">
                                <label for="noRekening" class="form-label">No. Rekening</label>
                                <input type="text" class="form-control number-format" name="noRekening" id="noRekening" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="namaPemilikRekening" class="form-label">Tenor</label>
                        <div class="row text-left">
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tenor" id="tenor1"
                                        value="1" onchange="updateTotalPinjaman()">
                                    <label class="form-check-label" for="tenor1">
                                        1 Bulan
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tenor" id="tenor2"
                                        value="3" onchange="updateTotalPinjaman()">
                                    <label class="form-check-label" for="tenor2">
                                        3 Bulan
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tenor" id="tenor3"
                                        value="6" onchange="updateTotalPinjaman()">
                                    <label class="form-check-label" for="tenor3">
                                        6 Bulan
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tenor" id="tenor4"
                                        value="12" onchange="updateTotalPinjaman()">
                                    <label class="form-check-label" for="tenor4">
                                        12 Bulan
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tenor" id="tenor5"
                                        value="18" onchange="updateTotalPinjaman()">
                                    <label class="form-check-label" for="tenor5">
                                        18 Bulan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="totalPinjaman" class="form-label">Total Pinjaman</label>
                        <input type="text" class="form-control" name="totalPinjaman" id="totalPinjaman" disabled>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button type="submit" class="btn btn-success w-100">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(data => {
                let tempatLahir = document.getElementById('tempatLahir');
                data.forEach(tempat => {
                    let option = document.createElement('option');
                    option.value = tempat.name;
                    option.textContent = tempat.name;
                    tempatLahir.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching provinces:', error));

        // const inputFormHarga = document.querySelectorAll('.number-format');
        // inputFormHarga.forEach(form => {
        //     form.addEventListener('input', function() {
        //         let value = this.value;

        //         value = value.replace(/[^0-9]/g, '');
        //         value = value.replace(/^0+(\d)/, '$1');
        //         value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        //         this.value = value;
        //     });
        // });
    });

    function updateTotalPinjaman() {
        var jumlahPinjaman = parseFloat(document.getElementById('jumlahPinjaman').value.replace(/\./g, '').replace(
            /\,/g, ''));
        var selectedTenor = document.querySelector('input[name="tenor"]:checked').value;
        var totalPinjaman = jumlahPinjaman * selectedTenor * 0.05;
        var roundedTotalPinjaman = jumlahPinjaman + Math.ceil(totalPinjaman / 1000) * 1000;
        var tagihanPerBulan = Math.ceil(roundedTotalPinjaman / selectedTenor / 1000) * 1000;
        var formattedTotalPinjaman = 'Rp. ' + formatNumber(roundedTotalPinjaman);
        var formattedTagihanPerBulan = 'Rp. ' + formatNumber(tagihanPerBulan);
        document.getElementById('totalPinjaman').value = formattedTotalPinjaman +
            ` (Bulanan: ${formattedTagihanPerBulan} / Bulan)`;
    }

    function formatNumber(number) {
        return number.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }
</script>
