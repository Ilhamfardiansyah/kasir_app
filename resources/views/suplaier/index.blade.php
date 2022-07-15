@extends('layouts.main')
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Dashboard</h1>

            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total Sales</h4>
                            <div class="stats-figure">Rp.{{ number_format($produk->sum('total_harga'), 0, ',', '.') }}
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Produk</h4>
                            <div class="stats-figure">{{ $jml_produk }}</div>
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">User</h4>
                            <div class="stats-figure">{{ $jml_user }}</div>
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Supplier</h4>
                            <div class="stats-figure">{{ $jml_supplier }}</div>
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
            </div>

            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-12">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <table id="example">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Supplier</th>
                                    <th class="text-center">Kode Supplier</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">No Telp</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suplier as $supliers)
                                    <tr>
                                        <td>{{ $supliers->nama_supplier }}</td>
                                        <td>{{ $supliers->kode_supplier }}</td>
                                        <td>{{ $supliers->alamat }}</td>
                                        <td>{{ $supliers->no_telp }}</td>
                                        <td><a href="" class="btn btn-danger">Hapus</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Nama Supplier</th>
                                    <th class="text-center">Kode Supplier</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">No Telp</th>
                                    <th class="text-center">Action</th>
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
            </div>
        </div>
    </div>
@endsection
