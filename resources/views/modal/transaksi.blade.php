<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">

<div class="modal fade" id="modaltransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form method="post" action="{{ url('kasir-post') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <table id="transaksi" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Barcode</th>
                                    <th>Harga Jual</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $item)
                                    <tr>
                                        <td></td>
                                        <td class="kodeProdukValue">
                                            {{ $item->kode_produk }}
                                            <input type="hidden" name="kode_produk" value="{{ $item->kode_produk }}">
                                        </td>
                                        <td class="namaProdukValue">{{ $item->nama_produk }}
                                            <input type="hidden" name="nama_produk" value="{{ $item->nama_produk }}">
                                        </td>
                                        <td class="barcodeValue">{{ $item->barcode }}
                                            <input type="hidden" name="barcode" value="{{ $item->barcode }}">
                                        </td>
                                        <td class="hargaJualValue">{{ $item->harga_jual }}
                                            <input type="hidden" name="harga_jual" value="{{ $item->harga_jual }}">
                                        </td>
                                        <td class="stokValue">{{ $item->stok }}
                                            <input type="hidden" name="stok" value="{{ $item->stok }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#transaksi').DataTable({
                                    columnDefs: [{
                                        orderable: false,
                                        className: 'select-checkbox',
                                        targets: 0
                                    }],
                                    select: {
                                        style: 'os',
                                        selector: 'td:first-child'
                                    },
                                    order: [
                                        [1, 'asc']
                                    ]
                                });
                            });
                        </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btnSaving">Save changes</button>
                    </div>
                </div>
        </form>
    </div>
</div>
