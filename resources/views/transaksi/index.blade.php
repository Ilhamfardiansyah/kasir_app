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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="app-page-title">E-trans</h1>
                    @include('sweetalert::alert')
                    <div class="mt-4 mb-4 p-4 row">
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
                                <button type="button" class="btn btn-primary ml-4 mt-4 mb-4 noprint" data-bs-toggle="modal"
                                    data-bs-target="#modaltransaksi"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                    </svg> Tambah Produk</button>
                                @include('modal.transaksi')
                            </div>
                            <table id="example" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Kode Produk</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Barcode</th>
                                        <th class="text-center">Harga Jual</th>
                                        <th class="text-center">Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $item)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="javascript:void(0)" onclick="kuranginStok('{{ $item->id }}' )"
                                                    class="btn btn-sm btn-dark"><i class="fas fa-edit"></i>
                                                    Updat Stok</a>
                                            </td>
                                            <td>{{ $item->kode_produk }}</td>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>{{ $item->barcode }}</td>
                                            <td>{{ $item->harga_jual }}</td>
                                            <td>{{ $item->stok }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-grid gap-4 d-md-flex justify-content-md-end">
                                <a onclick="window.print()" class="btn btn-success noprint"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-save2" viewBox="0 0 16 16">
                                        <path
                                            d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                                    </svg> Print</a>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        console.log('test');

        function kuranginStok(id) {

            let qty = prompt("Masukin QTYnya ajg...", "");
            if (qty != null) {
                location.href = "{{ url('nguranginStok') }}/" + id + '/' + qty;
            } else {
                return false;
            }
        }

        $('#kasir-post').on('submit', function(e) {
            $('.btnSaving').hide('fast');
            e.preventDefault();
            var values = $(this).serialize();
            console.log(values);
            var nama_produk = $('.namaProdukValue').val();
            var kode_produk = $('.kodeProdukValue').val();
            var barcode = $('.barcodeValue').val();
            var stok = $('.stokValue').val();
            var harga_jual = $('.hargaJualValue').val();

            $.ajax({
                url: "{{ url('/transaksi/baru') }}",
                type: "post",
                dataType: 'json',
                data: values,
                success: function(response) {
                    if (response.status == 'ok') {
                        $('#example tbody').append(`
                            <tr>
                                <td class="text-center">
                                    ${kode_produk}
                                </td>
                                <td class="text-center">
                                    ${nama_produk}
                                </td>
                                <td class="text-center">
                                    ${barcode}
                                </td>
                                <td class="text-center">
                                    ${stok}
                                </td>
                                <td class="text-center">
                                    ${harga_jual}
                                </td>
                                <td class="text-center">
                                    ${harga_beli}
                                </td>
                            </tr>`)
                        $('#modalproduk').modal('hide')
                        $('.btnSaving').show('fast');
                        $('.namaProdukValue').val("");
                        $('.namaStokValue').val("");
                        $('.supplierValue').val("");
                        $('.hargaJualValue').val("");
                        $('.hargaBeliValue').val("");
                        $('.hargaJualValue').val("");

                        $('.kodeProdukValue').val(response.data.kode_barang);
                        $('.invoiceValue').val("");
                        $('.barcodeValue').val(response.data.barcode);
                        $('.invoiceValue').val(response.data.invoice);
                        toastr.success('Barang baru sudah ditambahkan!')
                    }
                },
                error: function(error) {
                    $('.btnSaving').show('fast');
                }
            });
        })
    </script>
@endsection
