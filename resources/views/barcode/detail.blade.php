@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-12 card">
                    <table width="100%">
                        <tr>
                            @foreach ($data as $item)
                                <div class="barcode">
                                    <p class="name">{{ $item->nama_produk }}</p>
                                    <p class="price">Price: {{ $item->harga_jual }}</p>
                                    {!! DNS1D::getBarcodeHTML($item->barcode, 'C128', 1.4, 22) !!}
                                    <p class="pid">{{ $item->kode_produk }}</p>
                                </div>
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function cetakBarcode(url) {
            $('.data_rak')
                .attr('target', '_blank')
                .attr('action', 'url')
                .submit();
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#jadwal').DataTable({
                stateSave: true,
            });
        });
    </script>
@endsection
