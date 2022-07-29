<style>
    input.input-box,
    textarea {
        background: cyan;
    }
</style>

<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script>



@extends('layouts.main')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <form action="{{ url('barangbaru/create') }}" method="post" id="">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="app-page-title">Tambah Barang Baru</h1>
                        @include('sweetalert::alert')
                        <div class="mt-4 mb-4 p-4 row">
                            <label for="no_invoice" class="col-sm-4 col-form-label"><b>No Invoice</b></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control mb-2 text-center" name="no_invoice"
                                    id="no_invoice" value="{{ $invoice }}" readonly>
                            </div>
                            <label for="user_id" class="col-sm-4 col-form-label"><b>Input By : </b>
                                {{ Auth::user()->name }}, {{ Auth::user()->nik }}</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="user_id" id="user_id"
                                    value="{{ Auth::user()->id }}" hidden>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4 mb-4">
                    <div class="col-sm-12">
                        <div class="app-card app-card-chart h-100 shadow-sm">
                            <div class="app-card-header p-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Tambah Produk Dari Supplier</h4>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary ml-4 mt-4 mb-4" data-bs-toggle="modal"
                                        data-bs-target="#modalproduk">Tambah Produk</button>
                                    @include('modal.produk')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
