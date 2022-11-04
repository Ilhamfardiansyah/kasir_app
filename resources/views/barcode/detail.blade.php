@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-12 card">
                    <body>
                        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
                        <div class="container">
                            <div class="row">
                                <div class="span4">
                                    <img src="{{ asset('assets/images/background/bakas.png') }}" class="img-rounded logo" width="400px">
                                    <address>
                                        <strong>Bakas Store Original Brnaded</strong><br>

                                        Villa Nusa Indah,<br>
                                        Jl.Cempaka 1 Blok Q, 13 No.1 Jatiasih Bekasi
                                    </address>
                                </div>
                                <div class="span4 well">
                                    <table class="invoice-head" id>
                                        <tbody>
                                            <tr>
                                                <td class="pull-right"><strong>Date</strong></td>
                                                <td>{{ $data[0]->created_at }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span8">
                                    <h2>Invoice</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span8 well invoice-body">
                                    <div id="table_wrapper">
                                        <table class="table table-bordered" id="list">
                                            <thead>
                                                <tr>
                                                    <th>Barcode 1</th>
                                                    <th>Barcode 2</th>
                                                    <th>Barcode 3</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>
                                                                <p class="name">{{ $item->nama_produk }}</p>
                                                                <p class="price">Price: {{ $item->harga_jual }}</p>
                                                                {!! DNS1D::getBarcodeHTML($item->barcode, 'C128', 1.4, 22) !!}
                                                                <p class="pid">{{ $item->kode_produk }}</p>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                {{-- <tr>
                                            <td colspan="4"></td>
                                        </tr> --}}

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span8 well invoice-thank">
                                    <h5 style="text-align:right">PIC :</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span8 well invoice-thank">
                                    <h5 style="text-align:right">{{ Auth::user()->name }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span8 well invoice-thank">
                                    <h5 style="text-align:right">{{ Auth::user()->nik }}</h5>
                                </div>
                            </div>
                            <div class="btn-group noprint" role="group" aria-label="Basic example">
                                <button type="button" id="btnExport" class="btn btn-danger">Export Excel</button>
                                <button type="button" class="btn btn-primary" onclick="window.print();">Print</button>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>

                            <div class="row">
                                <div class="span3">
                                    <strong>Phone:</strong>(021) 89190800
                                </div>
                                <div class="span3">
                                    <strong>Email:</strong> <a> {{ Auth::user()->email }}</a>
                                </div>
                            </div>
                        </div>
                    </body>
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
