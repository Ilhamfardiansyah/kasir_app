<style>
    input.input-box,
    textarea {
        background: cyan;
    }

</style>

<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script>



@extends('layouts.main')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">Tambah Data Baru</h1>
            <form action="/barangbaru/create" method="post">
                @csrf
                @include('sweetalert::alert')
                <div class="mt-4 mb-4 p-4 row">
                    <label for="#" class="col-sm-3 col-form-label">No Invoice</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="#" id="#" readonly>
                    </div>
                    <!--//row-->
                    <div class="row g-4 mb-4">
                        <div class="col-12 col-lg-6">
                            <div class="app-card app-card-chart h-100 shadow-sm">
                                <div class="app-card-header p-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <h4 class="app-card-title">Tambah Produk Dari Supplaier</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-4 p-4 row">
                                    <label for="nama_produk" class="col-sm-3 col-form-label">Nama Barang</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                                    </div>

                                    <label for="kode_produk" class="col-sm-3 mt-2 mb col-form-label">Kode Barang</label>
                                    <div class="col-sm-9 mt-2">
                                        <input type="text" class="form-control" name="kode_produk" id="kode_produk">
                                    </div>

                                    <label for="barcode" class="col-sm-3 mt-2 mb col-form-label">Barcode</label>
                                    <div class="col-sm-9 mt-2">
                                        <input type="text" class="form-control" name="barcode" id="barcode">
                                    </div>

                                    <label for="stok" class="col-sm-3 mt-2 mb col-form-label">Stok</label>
                                    <div class="col-sm-9 mt-2">
                                        <input type="text" class="form-control" name="stok" id="stok" onkeyup="sum();">
                                    </div>

                                    <label for="supplier" class="col-sm-3 mt-2 mb col-form-label">Supplaier</label>
                                    <div class="col-sm-9 mt-2">
                                        <select type="input" class="form-select" aria-label="Default select example"
                                            id="supplier_id" name="supplier_id">
                                            @foreach ($suplaier as $suplaiers)
                                                <option value="#" hidden selected>--Pilih Supplier--</option>
                                                <option value="{{ $suplaiers->id }}">{{ $suplaiers->nama_supplier }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>


                            </div>
                            <!--//app-card-header-->
                            <!--//app-card-->
                        </div>
                        <!--//col-->
                        <div class="col-12 col-lg-6">
                            <div class="app-card app-card-chart h-100 shadow-sm">
                                <div class="app-card-header p-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <h4 class="app-card-title">Keterangan</h4>
                                        </div>
                                        <!--//col-->

                                        <!--//col-->
                                    </div>
                                    <!--//row-->
                                </div>
                                <div class="mt-4 mb-4 p-4 row">
                                    <label for="harga_jual" class="col-sm-3 mt-2 mb col-form-label">Harga
                                        Jual</label>
                                    <div class="col-sm-9 mt-2">
                                        <input type="text" class="form-control" name="harga_jual" id="harga_jual"
                                            required>
                                    </div>

                                    <label for="harga_beli" class="col-sm-3 col-form-label">Harga Beli</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="harga_beli" id="harga_beli"
                                            onkeyup="sum();">
                                    </div>


                                    <label for="inputPassword" class="col-sm-3 mt-2 mb col-form-label">Keterangan</label>
                                    <div class="col-sm-9 mt-2">
                                        <input type="text" class="form-control" id="inputPassword">
                                    </div>

                                    <label for="inputPassword" class="col-sm-3 mt-2 mb col-form-label">Size</label>
                                    <div class="col-sm-9 mt-2">
                                        <select type="input" class="form-select" aria-label="Default select example"
                                            id="inputPassword">
                                            <option value="">0</option>
                                        </select>
                                    </div>

                                    <div align="right" class="col-sm-9 mt-2">
                                        <button class="btn btn-success col-sm-7 mt-2 mb col-form-label"
                                            type="submit">Tambah</button>
                                    </div>
                                </div>
            </form>
        </div>
        <!--//app-card-header-->
        <!--//app-card-->
    </div>
    <!--//col-->
    {{-- <script src="js/tables.js"></script> --}}

    <div class="col-12 col-lg-6">
        <div class="app-card app-card-chart h-100 shadow-sm">
            <div class="app-card-header p-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <h4 class="app-card-title">Tambah Detail Produk</h4>
                    </div>

                </div>
            </div>
            <div class="mt-4 mb-4 p-4 row">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalSize">Tambah
                        Size</button>
                    @include('modal.size')
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#modalDetail">Tambah Detail</button>
                    @include('modal.detail')
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRak">Posisi
                        Rak</button>
                    @include('modal.rak')
                </div>
                <!-- Button trigger modal -->
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="app-card app-card-chart h-100 shadow-sm">
            <div class="app-card-header p-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <h4 class="app-card-title">Tambah Detail Produk</h4>
                    </div>
                </div>
            </div>
            <div class="mt-4 mb-4 p-4 row">
                <label for="inputPassword" class="col-sm-3 mt-2 mb col-form-label">Total</label>
                <div class="col-sm-4 mt-3 ml-0">
                    <input type="text" class="input-box" name="total_harga" id="total_harga" onkeyup="sum();">

                    <script src="js/tables.js"></script>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!--//row-->

    </div>
    <!--//container-fluid-->
    </div>
@endsection
<script>
    var harga_beli = document.getElementById("harga_beli");
    harga_beli.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatharga_beli() untuk mengubah angka yang di ketik menjadi format angka
        harga_beli.value = formatRupiah(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script>
