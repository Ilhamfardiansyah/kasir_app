@extends('layouts.main')
<style>
    :root {
        --body-bg: rgb(204, 204, 204);
        --white: #ffffff;
        --darkWhite: #ccc;
        --black: #000000;
        --dark: #615c60;
        --themeColor: #05a232;
        --pageShadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    }

    /* Font Include */
    @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@600&display=swap');

    body {
        background-color: var(--body-bg);
    }

    .page {
        background: var(--white);
        display: block;
        margin: 0 auto;
        position: relative;
        box-shadow: var(--pageShadow);
    }

    .page[size="A4"] {
        width: 21cm;
        height: 29.7cm;
        overflow: hidden;
    }

    .bb {
        border-bottom: 3px solid var(--darkWhite);
    }

    /* Top Section */
    .top-content {
        padding-bottom: 15px;
    }

    .logo img {
        height: 100px;
    }

    .top-left p {
        margin: 0;
    }

    .top-left .graphic-path {
        height: 40px;
        position: relative;
    }

    .top-left .graphic-path::before {
        content: "";
        height: 20px;
        background-color: var(--dark);
        position: absolute;
        left: 15px;
        right: 0;
        top: -15px;
        z-index: 2;
    }

    .top-left .graphic-path::after {
        content: "";
        height: 22px;
        width: 17px;
        background: var(--black);
        position: absolute;
        top: -13px;
        left: 6px;
        transform: rotate(45deg);
    }

    .top-left .graphic-path p {
        color: var(--white);
        height: 40px;
        left: 0;
        right: -100px;
        text-transform: uppercase;
        background-color: var(--themeColor);
        font: 26px;
        z-index: 3;
        position: absolute;
        padding-left: 10px;
    }

    /* User Store Section */
    .store-user {
        padding-bottom: 25px;
    }

    .store-user p {
        margin: 0;
        font-weight: 600;
    }

    .store-user .address {
        font-weight: 400;
    }

    .store-user h2 {
        color: var(--themeColor);
        font-family: 'Rajdhani', sans-serif;
    }

    .extra-info p span {
        font-weight: 400;
    }

    /* Product Section */
    thead {
        color: var(--white);
        background: var(--themeColor);
    }

    .table td,
    .table th {
        text-align: center;
        vertical-align: middle;
    }

    tr th:first-child,
    tr td:first-child {
        text-align: left;
    }

    .media img {
        height: 60px;
        width: 60px;
    }

    .media p {
        font-weight: 400;
        margin: 0;
    }

    .media p.title {
        font-weight: 600;
    }

    /* Balance Info Section */
    .balance-info .table td,
    .balance-info .table th {
        padding: 0;
        border: 0;
    }

    .balance-info tr td:first-child {
        font-weight: 600;
    }

    tfoot {
        border-top: 2px solid var(--darkWhite);
    }

    tfoot td {
        font-weight: 600;
    }

    /* Cart BG */
    .cart-bg {
        height: 250px;
        bottom: 32px;
        left: -40px;
        opacity: 0.3;
        position: absolute;
    }

    /* Footer Section */
    footer {
        text-align: center;
        position: absolute;
        bottom: 30px;
        left: 75px;
    }

    footer hr {
        margin-bottom: -22px;
        border-top: 3px solid var(--darkWhite);
    }

    footer a {
        color: var(--themeColor);
    }

    footer p {
        padding: 6px;
        border: 3px solid var(--darkWhite);
        background-color: var(--white);
        display: inline-block;
    }

    @media print {
        .noprint {
            visibility: hidden;
        }
    }
</style>

@section('content')
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <!-- Custom Style -->
        <link rel="stylesheet" href="style.css">

        <title>Invoice..!</title>
    </head>

    <body>

        <div class="my-5 page" size="A4">
            <p class="noprint">Klik tombol print dibawah</p>
            <div class="p-5">
                <section class="top-content bb d-flex justify-content-between">
                    <div class="logo">
                        <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="top-left">
                        <div class="graphic-path">
                            <p>Bakas Store</p>
                        </div>
                        <div class="position-relative">
                            <p>Invoice No. <span>{{ $data[0]->no_invoice ?? '-' }}</span></p>
                        </div>
                    </div>
                </section>

                <section class="store-user mt-5">
                    <div class="col-10">
                        <div class="row bb pb-3">
                            <div class="col-7">
                                <p class="address"> Villa Nusa Indah, <br> Jl.Cempaka 1 Blok Q, <br>13 No.1 Jatiasih Bekasi
                                </p>
                                <div class="txn mt-2">(021) 89190800</div>
                            </div>
                            <div class="col-5">
                                <p>Nama,</p>
                                <h2>{{ Auth::user()->name }}</h2>
                                <p class="address"> {{ Auth::user()->nik }} <br> {{ Auth::user()->email }}
                                </p>
                                <div class="txn mt-2">{{ Auth::user()->level }}</div>
                            </div>
                        </div>
                        <div class="row extra-info pt-3">
                            <div class="col-7">
                                <p>Payment Method: <span>Debit</span></p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="product-area mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Item Description</td>
                                <td>Kode Produk</td>
                                <td>Price</td>
                                <td>Quantity</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $isi)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="mt-0 title">{{ $isi->nama_produk }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $isi->kode_produk }}</td>
                                    <td>Rp. {{ number_format($isi->harga_beli, 0, ',', '.') }}</td>
                                    <td>{{ $isi->stok }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>

                <section class="balance-info">
                    <div class="row">
                        <div class="col-8">
                            <p class="m-0 font-weight-bold"> Note: </p>
                        </div>
                        <div class="col-4">
                            <table class="table border-0 table-hover">
                                <tr>
                                    <td>Sub Total:</td>
                                    <td>Rp. {{ number_format($data->sum('total_harga'), 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Tax:</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Deliver:</td>
                                    <td>-</td>
                                </tr>
                                <tfoot>
                                    <tr>
                                        <td>Total:</td>
                                        <td>Rp.
                                            {{ number_format($data->sum('stok') * $data->sum('harga_beli'), 0, ',', '.') }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>4

                            <!-- Signature -->
                            <div class="col-12">
                                <img src="signature.png" class="img-fluid" alt="">
                                <p class="text-center m-0"> {{ Auth::user()->name }} </p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Cart BG -->
                <img src="cart.jpg" class="img-fluid cart-bg" alt="">

                <a onclick="window.print();" class="btn btn-block noprint">Print</a>
                <a href="/home" class="btn btn-danger noprint">Back</a>
            </div>
        </div>
    @endsection
