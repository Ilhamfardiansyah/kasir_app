<div class="modal fade" id="modalproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="post" id="post-barang">
            @csrf
            <input type="text" class="form-control mb-2 text-center" name="no_invoice" id="no_invoice"
                value="{{ $invoice }}" hidden>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Size</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="container">
                    <div class="mt-2 mb-2 p-4 row">
                        <label for="inputPassword" class="col-sm-3 mt-2 mb col-form-label">Total</label>
                        <div class="col-sm-2 mt-3 ml-0">
                            <input type="text" class="input-box" name="total_harga" id="total_harga" readonly>
                            {{-- <script src="{{  }}js/tables.js"></script> --}}
                        </div>
                        <label for="inputPassword" class="col-sm-2 mt-2 mb col-form-label"></label>
                        <div class="col-sm-2 mt-3 ml-0">
                            <input type="text" class="input-box" name="total_jual" id="total_jual" readonly>
                            {{-- <script src="{{  }}js/tables.js"></script> --}}
                        </div>
                    </div>

                    <div class="mt-4 mb-4 p-4 row">
                        <label for="nama_produk" class="col-sm-3 col-form-label">Nama Barang</label>
                        <div class="col-sm-9">
                            <input type="text"
                                class="form-control namaProdukValue @error('nama_produk') is-invalid @enderror"
                                name="nama_produk" id="nama_produk" value="{{ old('nama_produk') }}" autocomplete="off"
                                autofocus>
                            @error('nama_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="kode_produk" class="col-sm-3 mt-2 mb col-form-label">Kode Barang</label>
                        <div class="col-sm-9 mt-2">
                            <input type="text"
                                class="form-control kodeProdukValue @error('kode_produk') is-invalid @enderror"
                                name="kode_produk" id="kode_produk" value="{{ $kode_barang }}" readonly>
                            @error('kode_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="barcode" class="col-sm-3 mt-2 mb col-form-label">Barcode</label>
                        <div class="col-sm-9 mt-2">
                            <input type="text"
                                class="form-control barcodeValue @error('barcode') is-invalid @enderror" name="barcode"
                                id="barcode" value="{{ $barcode }}" readonly>
                            @error('barcode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="stok" class="col-sm-3 mt-2 mb col-form-label">Stok</label>
                        <div class="col-sm-9 mt-2">
                            <input type="number" class="form-control stokValue @error('stok') is-invalid @enderror"
                                name="stok" id="stok" value="{{ old('stok') }}" autocomplete="off">
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="suplaier_id" class="col-sm-3 mt-2 col-form-label">Supplier</label>
                        <div class="col-sm-9 mt-2">
                            <select type="input" class="form-select supplierValue" aria-label="Default select example"
                                id="suplaier_id" name="suplaier_id" required>
                                <option value="" selected disabled>-- Pilih Supplier --
                                </option>
                                @foreach ($suplier as $suplaiers)
                                    <option value="{{ $suplaiers->id }}">
                                        {{ $suplaiers->nama_supplier }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <label for="harga_jual" class="col-sm-3 mt-2 col-form-label">Harga
                            Jual</label>
                        <div class="col-sm-9 mt-2">
                            <input type="number"
                                class="form-control hargaJualValue @error('harga_jual') is-invalid @enderror"
                                name="harga_jual" id="harga_jual" value="{{ old('harga_jual') }}" autocomplete="off">
                            @error('harga_jual')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="harga_beli" class="col-sm-3 mt-2 col-form-label">Harga Beli</label>
                        <div class="col-sm-9 mt-2">
                            <input type="number"
                                class="form-control hargaBeliValue @error('harga_beli') is-invalid @enderror"
                                name="harga_beli" id="harga_beli" onkeyup="sum()" autocomplete="off">
                            @error('harga_beli')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="kategori_id" class="col-sm-3 mt-2 mb col-form-label descriptionValue">Description
                            Item</label>
                        <div class="col-sm-9 mt-2">
                            <select type="input" class="form-select kategoriValue"
                                aria-label="Default select example" name="kategori_id" id="kategori_id">
                                <option value="" selected disabled>-- Pilih Kategori --
                                </option>
                                @foreach ($kategori as $kategoris)
                                    <option value="{{ $kategoris->id }}">{{ $kategoris->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="size_id" class="col-sm-3 mt-2 mb col-form-label">Size Item</label>
                        <div class="col-sm-9 mt-2">
                            <select type="input" class="form-select sizeValue" aria-label="Default select example"
                                name="size_id" id="size_id">
                                <option value="" selected disabled>-- Pilih Size --
                                </option>
                                @foreach ($size as $sizes)
                                    <option value="{{ $sizes->id }}">{{ $sizes->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="rak_id" class="col-sm-3 mt-2 mb col-form-label">Rak</label>
                        <div class="col-sm-9 mt-2">
                            <select type="input" class="form-select rakValue" aria-label="Default select example"
                                name="rak_id" id="rak_id">
                                <option value="" selected disabled>-- Pilih Rak --
                                </option>
                                @foreach ($rak as $raks)
                                    <option value="{{ $raks->id }}">{{ $raks->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btnSaving">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

$('#harga_jual').on('keyup', function (){
    var harga_jual = $('#harga_jual').val();
    var stok = $('#stok').val();

    var total  = harga_jual * stok;
    $('#total_jual').val(formatRupiah(String(total),""));
});


</script>
