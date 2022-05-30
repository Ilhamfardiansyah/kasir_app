<style>
    input.input-box,
    textarea {
        background: cyan;
    }

</style>
<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('stok').value;
        var txtSecondNumberValue = document.getElementById('harga_beli').value;
        var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('total_harga').value = result;
        }
    }
</script>
<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // Format mata uang.
        $('.uang').mask('0.000.000.000', {
            reverse: true
        });
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // Format mata uang.
        $('.uang').mask('0.000.000.000', {
            reverse: true
        });
    })
</script>
@extends('layouts.main')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">Tambah Data Baru</h1>

            <div class="mt-4 mb-4 p-4 row">
                <label for="nama_produk" class="col-sm-3 col-form-label">No Invoice</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" readonly>
                </div>
                <!--//row-->
                <div class="row g-4 mb-4">
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-chart h-100 shadow-sm">
                            <div class="app-card-header p-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Tambah Produk Supplier</h4>
                                    </div>
                                    <!--//col-->

                                    <!--//col-->
                                </div>
                                <!--//row-->
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
                                        <h4 class="app-card-title">Tambah Produk Dari Supplier</h4>
                                    </div>
                                    <!--//col-->

                                    <!--//col-->
                                </div>
                                <!--//row-->
                            </div>
                            <div class="mt-4 mb-4 p-4 row">
                                <label for="harga_beli" class="col-sm-3 col-form-label">Harga Beli</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="harga_beli" id="harga_beli"
                                        onkeyup="sum();">
                                </div>

                                <label for="harga_jual" class="col-sm-3 mt-2 mb col-form-label">Harga Jual</label>
                                <div class="col-sm-9 mt-2">
                                    <input type="text" class="form-control uang" name="harga_jual" id="harga_jual">
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
                                        <h4 class="app-card-title">Tambah Detail Produk</h4>
                                    </div>

                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-4 row">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalSize">Tambah
                                        Size</button>
                                    @include('modal.size')
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalDetail">Tambah Detail</button>
                                    @include('modal.detail')
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalRak">Posisi Rak</button>
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
                                    <input type="text" class="input-box" name="total_harga" id="total_harga"
                                        onkeyup="sum();" readonly>
                                    <div align="right" class="col-sm-9 mt-2">
                                        <button class="btn btn-success col-sm-7 mt-2 mb col-form-label"
                                            type="submit">Tambah</button>
                                    </div>
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
