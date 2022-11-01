@extends('layouts.main')

@section('content')

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    </head>


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
                                    <th>Product</th>
                                    <th>Kode Produk</th>
                                    <th>Quantity</th>
                                    <th>Barcode</th>
                                    <th>Nama Supplier</th>
                                    <th>Kode Supplier</th>
                                    <th>Harga Jual</th>
                                    <th>Harga Beli</th>
                                    <th>Total Harga Beli</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->nama_produk }}</td>
                                        <td>{{ $item->kode_produk }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>{{ $item->barcode }}</td>
                                        <td>{{ $item->suplaier->nama_supplier }}</td>
                                        <td>{{ $item->suplaier->kode_supplier }}</td>
                                        <td>Rp. {{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                                {{-- <tr>
                            <td colspan="4"></td>
                        </tr> --}}
                                <tr>
                                    <td colspan="7">&nbsp;</td>
                                    <td><strong>Total</strong></td>
                                    <td><strong>Rp. {{ number_format($total_harga, 0, ',', '.') }}</strong>
                                    </td>
                                </tr>
                                <td>
                                    <h5>Laba Kotor</h5><strong>Rp. {{ number_format($keseluruhan) }}</strong>
                                </td>
                                <td>
                                    <h5>HPP</h5><strong>Rp. {{ number_format($keseluruhan - $total_harga) }}</strong>
                                </td>
                                <td>{{ $total_barang }}</td>
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
    <script>
        $(document).ready(function() {
            $("#btnExport").click(function(e) {
                e.preventDefault();

                //getting data from our table
                var data_type = 'data:application/vnd.ms-excel';
                var table_div = document.getElementById('table_wrapper');
                var table_html = table_div.outerHTML.replace(/ /g, '%20');

                var a = document.createElement('a');
                a.href = data_type + ', ' + table_html;
                a.download = 'data_closing_every_month' + Math.floor((Math.random() * 99) + 100) +
                    '.xls';
                a.click();
            });
        });
    </script>
@endsection
