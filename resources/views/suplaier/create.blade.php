@extends('layouts.main')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Tambah Data Supplier</h1>
            <div class="row g-4 mb-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Tambah Data Supplier</h4>
                                </div>
                                <!--//col-->

                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <form action="" method="">
                            @csrf
                            <div class="mt-4 mb-4 p-4 row">
                                <label for="nama_produk" class="col-sm-3 col-form-label">Nama Supplier</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                                </div>

                                <label for="kode_produk" class="col-sm-3 mt-2 mb col-form-label">Kode Supplier</label>
                                <div class="col-sm-9 mt-2">
                                    <input type="text" class="form-control" name="kode_produk" id="kode_produk">
                                </div>

                                <label for="barcode" class="col-sm-3 mt-2 mb col-form-label">Alamat</label>
                                <div class="col-sm-9 mt-2">
                                    <input type="text" class="form-control" name="barcode" id="barcode">
                                </div>

                                <label for="stok" class="col-sm-3 mt-2 mb col-form-label">No Telp</label>
                                <div class="col-sm-9 mt-2">
                                    <input type="text" class="form-control" name="stok" id="stok" onkeyup="sum();">
                                </div>
                                <button type="submit" class="btn btn-success mt-5">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!--//app-card-header-->
                    <!--//app-card-->
                </div>
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Data Supplier</h4>
                                </div>
                                <!--//col-->

                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <div class="mt-4 mb-4 p-4 row">
                            <table id="example">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kode Produk</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Barcode</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Harga Jual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>121</td>
                                        <td>121</td>
                                        <td>121</td>
                                        <td>121</td>
                                        <td>121</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">Kode Produk</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Barcode</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Harga Jual</th>
                                    </tr>
                                </tfoot>
                            </table>

                            <script>
                                $(document).ready(function() {
                                    $('#example').DataTable({
                                        scrollx: true,
                                    });
                                });
                            </script>
                        </div>


                    </div>
                    <!--//app-card-header-->
                    <!--//app-card-->
                </div>
            </div>
        </div>
    </div>
@endsection
