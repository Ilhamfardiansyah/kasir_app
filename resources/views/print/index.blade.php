@extends('layouts.main')

@section('content')
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
                <table class="invoice-head">
                    <tbody>
                        <tr>
                            <td class="pull-right"><strong>Phone #</strong></td>
                            <td>(021) 89190800</td>
                        </tr>
                        <tr>
                            <td class="pull-right"><strong>Invoice #</strong></td>
                            <td>{{ $data[0]->no_invoice ?? '-' }}</td>
                        </tr>
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Kode Produk</th>
                            <th>Quantity</th>
                            <th>Barcode</th>
                            <th>Purchase Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ $item->kode_produk }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>{{ $item->barcode }}</td>
                                <td>Rp. {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        {{-- <tr>
                            <td colspan="4"></td>
                        </tr> --}}
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td><strong>Total</strong></td>
                            <td><strong>{{ number_format($data->sum('harga_beli'), 0, ',', '.') }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="span8 well invoice-thank">
                <h5 style="text-align:left;">PIC :</h5>
            </div>
        </div>
        <div class="row">
            <div class="span8 well invoice-thank">
                <h5 style="text-align:left;">{{ Auth::user()->name }}</h5>
            </div>
        </div>
        <div class="row">
            <div class="span8 well invoice-thank">
                <h5 style="text-align:left;">{{ Auth::user()->nik }}</h5>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="row">
            <div class="span3">
                <strong>Phone:</strong>+91-124-111111
            </div>
            <div class="span3">
                <strong>Email:</strong> <a href="web@webivorous.com">web@webivorous.com</a>
            </div>
            <div class="span3">
                <strong>Website:</strong> <a href="http://webivorous.com">http://webivorous.com</a>
            </div>
        </div>
    </div>
@endsection
