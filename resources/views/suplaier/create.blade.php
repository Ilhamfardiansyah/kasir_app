@extends('layouts.main')

@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    @include('sweetalert::alert')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Tambah Data Supplaier</h1>
            <div class="row g-4 mb-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Tambah Data Supplaier</h4>
                                </div>
                            </div>
                        </div>
                        <form action="/create/data" method="post">
                            @csrf
                            <div class="mt-4 mb-4 p-4 row">
                                <label for="nama_supplier" class="col-sm-3 col-form-label">Nama Supplaier</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror"
                                        name="nama_supplier" id="nama_supplier" value="{{ old('nama_supplier') }}"
                                        autocomplete="off">
                                    @error('nama_supplier')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <label for="kode_supplier" class="col-sm-3 mt-2 mb col-form-label">Kode Supplier</label>
                                <div class="col-sm-9 mt-2">
                                    <input type="text" class="form-control  @error('kode_supplier') is-invalid @enderror"
                                        name="kode_supplier" id="kode_supplier" value="{{ $kd_supplier }}"
                                        autocomplete="off" readonly>
                                    @error('kode_supplier')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <label for="alamat" class="col-sm-3 mt-2 mb col-form-label">Alamat</label>
                                <div class="col-sm-9 mt-2">
                                    <input type="text" class="form-control  @error('alamat') is-invalid @enderror"
                                        name="alamat" id="alamat" value="{{ old('alamat') }}" autocomplete="off">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <label for="no_telp" class="col-sm-3 mt-2 mb col-form-label">No Telp</label>
                                <div class="col-sm-9 mt-2">
                                    <input type="number" class="form-control @error('no_telp') is-invalid @enderror"
                                        name="no_telp" id="no_telp" onkeyup="sum();" value="{{ old('no_telp') }}"
                                        autocomplete="off">
                                    @error('no_telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
                                    <h4 class="app-card-title">Data Supplaier</h4>
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
                                        <th class="text-center">Nama Supplaier</th>
                                        <th class="text-center">Kode Supplaier</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">No Telp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suplier as $supliers)
                                        <tr>
                                            <td class="text-center">{{ $supliers->nama_supplier }}</td>
                                            <td class="text-center">{{ $supliers->kode_supplier }}</td>
                                            <td class="text-center">{{ $supliers->alamat }}</td>
                                            <td class="text-center">{{ $supliers->no_telp }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">Nama Supplaier</th>
                                        <th class="text-center">Kode Supplaier</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">No Telp</th>
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
