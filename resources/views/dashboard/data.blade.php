    @extends('layouts.main')

    @section('content')
        <form action="/updatebarang/{{ $data->id }}" method="post">
            @csrf
            {{-- <input type="hidden" value="{{ $data->barcode }}" name="barcode_new"> --}}
            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">
                    <h1 class="app-page-title">Input Barcode</h1>
                    <div class="row g-4 mb-4">
                        <div class="col-12 col-lg-6">
                            <div class="app-card app-card-chart h-100 shadow-sm">
                                <div class="app-card-header p-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <h4 class="app-card-title">Tambah Stock</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-4 p-4 row">
                                    <label for="barcode" class="col-sm-3 col-form-label">Barcode</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('barcode') is-invalid @enderror"
                                            name="barcode" id="barcode" value="{{ $data->barcode }}" autocomplete="off"
                                            placeholder="Masukan Barcode" autofocus>
                                        @error('barcode')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="app-card app-card-chart h-100 shadow-sm">
                                <div class="app-card-header p-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <h4 class="app-card-title">Input Stock</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 p-4 row">
                                    <label for="stok" class="col-sm-3 col-form-label">Stok</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('stok') is-invalid @enderror"
                                            name="stok" id="stok" value="{{ old('stok') }}" autocomplete="off"
                                            placeholder="Input Stock">
                                        @error('stok')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary mt-2">Simpan</button>
                                </div>
                                <div class="mt-0 mb-4 p-4 row">
                                    <label for="total_harga" class="col-sm-3 col-form-label">Grand Total Harga</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('total_harga') is-invalid @enderror"
                                            name="total_harga" id="total_harga"
                                            value="{{ number_format($data->total_harga, 0, ',', '.') }}" autocomplete="off"
                                            readonly>
                                        @error('total_harga')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="app-card app-card-chart h-100 shadow-sm">
                                <div class="mt-4 mb-4 p-4 row">
                                            <tr>
                                                <br class="text-center">Nama Barang :{{ $data->nama_produk }}</br>
                                                <br class="text-center">Kode Barang :{{ $data->kode_produk }}</br>
                                                <br class="text-center">Stok :{{ $data->stok }}</br>
                                                <br class="text-center">Tanggal Barang Masuk :{{ $data->created_at }}</br>
                                            </tr>
                                </div>
                            </div>
                        </div>
        </form>

        <script>
            $("#barcode").on('keyup', function(e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    var value = $('#barcode').val()
                    location.href = '{{ url('/dashboard/update/') }}/' + value;
                }
            })
        </script>
    @endsection
