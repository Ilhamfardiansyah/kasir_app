@extends('layouts.main')

@section('content')
    <div class="app-card app-card-chart h-100 shadow-sm">
        <div class="app-card-header p-3">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <h4 class="app-card-title">Tambah Data Supplaier</h4>
                </div>
                <!--//col-->

                <!--//col-->
            </div>
            <!--//row-->
        </div>
        <form action="/updatebarang" method="post">
            @csrf
            <div class="mt-4 mb-4 p-4 row">
                <label for="barcode" class="col-sm-3 col-form-label">Barcode</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control @error('barcode') is-invalid @enderror" name="barcode"
                        id="barcode" value="{{ old('barcode') }}">
                    @error('barcode')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <label for="nama_barang" class="col-sm-3 mt-2 mb col-form-label">Nama Barang</label>
                <div class="col-sm-9 mt-2">
                    <input type="text" class="form-control  @error('nama_barang') is-invalid @enderror" name="nama_barang"
                        id="nama_barang" value="{{ old('nama_barang') }}">
                    @error('nama_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <label for="kode_barang" class="col-sm-3 mt-2 mb col-form-label">Kode Barang</label>
                <div class="col-sm-9 mt-2">
                    <input type="text" class="form-control  @error('kode_barang') is-invalid @enderror" name="kode_barang"
                        id="kode_barang" value="{{ old('kode_barang') }}">
                    @error('kode_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <label for="stok" class="col-sm-3 mt-2 mb col-form-label">Stok</label>
                <div class="col-sm-9 mt-2">
                    <input type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" id="stok"
                        onkeyup="sum();" value="{{ old('stok') }}">
                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success mt-5">Simpan</button>
            </div>
        </form>
    </div>
@endsection
