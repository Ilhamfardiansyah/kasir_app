@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-12 card">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <table id="jadwal" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Kode Barang</th>
                                    <th class="text-center">Stock</th>
                                    <th class="text-center">Barcode</th>
                                    <th class="text-center">Rak</th>
                                    <th class="text-center">Harga Jual</th>
                                    <th class="text-center">Harga Beli</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->nama_produk }}</td>
                                        <td>{{ $item->kode_produk }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>{{ $item->barcode }}</td>
                                        <td>{{ $item->rak_id }}</td>
                                        <td>{{ $item->harga_jual }}</td>
                                        <td>{{ $item->harga_beli }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#jadwal').DataTable({
                stateSave: true,
            });
        });
    </script>
@endsection
