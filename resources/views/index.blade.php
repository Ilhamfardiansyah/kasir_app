@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Dashboard</h1>

            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total Sales</h4>
                            <div class="stats-figure">{{ number_format($produk->sum('total_harga'), 0, ',', '.') }}
                            </div>
                            <div class="stats-meta text-success">
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
                            <div class="stats-figure">{{ $produk->sum('id') }}</div>
                            <div class="stats-meta text-success">
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
                            <h4 class="stats-type mb-1">User</h4>
                            <div class="stats-figure">{{ Auth::user()->sum('id') }}</div>
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
                            <div class="stats-figure">{{ $suplier->sum('id') }}</div>
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
                        <table id="example1">
                            <thead>
                                <tr>
                                    <th class="text-center">Kode Produk</th>
                                    <th class="text-center">Nama Produk</th>
                                    <th class="text-center">Barcode</th>
                                    <th class="text-center">Stok</th>
                                    <th class="text-center">Harga Jual</th>
                                </tr>
                            </thead>
                            @foreach ($produk as $produks)
                                <tbody>
                                    <tr>
                                        <td>{{ $produks->kode_produk }}</td>
                                        <td>{{ $produks->nama_produk }}</td>
                                        <td>{{ $produks->barcode }}</td>
                                        <td>{{ $produks->stok }}</td>
                                        <td>{{ number_format($produks->harga_jual, 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            @endforeach
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
                                var table = $('#example1').DataTable();

                                $('#example tbody').on('click', 'tr', function() {
                                    var data = table.row(this).data();
                                    alert('You clicked on ' + data[0] + "'s row");
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
