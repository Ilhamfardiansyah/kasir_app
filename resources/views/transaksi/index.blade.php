@extends('layouts.main')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Transaksi</h1>
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
                        <div class="mt-4 mb-1 p-4 row">
                            <label for="barcode" class="col-sm-3 col-form-label">Barcode</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-0 mb-1 p-4 row">
                            <label for="stok" class="col-sm-3 col-form-label">Qty</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('stok') is-invalid @enderror"
                                    name="stok" id="stok" value="{{ old('stok') }}" autocomplete="off"
                                    placeholder="" readonly>
                                @error('stok')
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
                                    <h4 class="app-card-title">Harga</h4>
                                </div>
                            </div>
                        </div>
                        <div class="mt-0 mb-4 p-4 row">
                            <label for="total_harga" class="col-sm-3 col-form-label">TOTAL HARGA</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('total_harga') is-invalid @enderror"
                                    name="total_harga" id="total_harga" value="{{ old('total_harga') }}" autocomplete="off"
                                    placeholder="" readonly>
                                @error('total_harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-0 mb-4 p-4 row">
                            <div class="col-sm-9">
                                <button class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="mt-4 mb-4 p-4 row">
                            <table class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Kode Barang</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"> - </td>
                                        <td class="text-center"> - </td>
                                        <td class="text-center"> - </td>
                                        <td class="text-center"> - </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#barcode").on('keyup', function(e) {
            if (e.key === 'Enter' || e.keyCode === 13) {
                var value = $('#barcode').val()
                location.href = '{{ url('/dashboard/update') }}/' + value;
            }
        })
    </script>
@endsection
