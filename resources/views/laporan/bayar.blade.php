@extends('components.layout')
@section('heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bayar Tagihan</h1>
    </div>
@endsection
@section('content')
    <div class="row px-2">
        <div class="card shadow col-xl-12 col-md-12 mb-4">
            <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Bayar Tagihan
                    {{ \Carbon\Carbon::parse($tagihan->jatuhTempo)->format('F') }}</h6>
                <h6 class="m-0 font-weight-bold text-info">{{ $tagihan->status }}</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('tagihan.update') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="idPinjaman" class="form-label">ID Pinjaman</label>
                                <input type="text" class="form-control" name="idPinjaman" id="idPinjaman"
                                    value="{{ $tagihan->pinjaman_id }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="angsuran" class="form-label">Angsuran</label>
                                <input type="text" class="form-control" name="angsuran" id="angsuran"
                                    value="{{ $tagihan->angsuran }} dari {{ $tagihan->pinjaman->tenor }} Bulan " disabled>
                            </div>
                            <div class="mb-3">
                                <label for="bunga" class="form-label">Bunga</label>
                                <input type="text" class="form-control" name="bunga" id="bunga"
                                    value="{{ $tagihan->bunga }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="idTagihan" class="form-label">ID Tagihan</label>
                                <input type="text" class="form-control" name="idTagihan" id="idTagihan"
                                    value="{{ $tagihan->id }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="tagihanPokok" class="form-label">Tagihan Pokok</label>
                                <input type="text" class="form-control" name="tagihanPokok" id="tagihanPokok"
                                    value="{{ $tagihan->tagihan_pokok }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="tunggakan" class="form-label">Tunggakan</label>
                                <input type="text" class="form-control" name="tunggakan" id="tunggakan"
                                    value="{{ $tagihan->tunggakan }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="totalTagihan" class="form-label">Total Tagihan</label>
                                <input type="text" class="form-control" name="totalTagihan" id="totalTagihan"
                                    value="{{ $tagihan->total_tagihan }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center mt-5">
                                <button type="submit" class="btn btn-success w-100">Bayar</button>
                            </div>
                        </div>
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
    });
</script>
