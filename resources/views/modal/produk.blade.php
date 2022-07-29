<div class="modal fade" id="modalproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container">
                <form action="{{ url('barangbaru/create') }}" method="post" id="">
                    @csrf
                    <div class="mt-2 mb-2 p-4 row">
                        <label for="inputPassword" class="col-sm-3 mt-2 mb col-form-label">Total</label>
                        <div class="col-sm-2 mt-3 ml-0">
                            <input type="text" class="input-box" name="total_harga" id="total_harga" readonly>
                            {{-- <script src="{{  }}js/tables.js"></script> --}}
                        </div>
                    </div>
                    <div class="mt-4 mb-4 p-4 row">
                        <label for="nama_produk" class="col-sm-3 col-form-label">Nama Barang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
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
                            <input type="text" class="form-control @error('kode_produk') is-invalid @enderror"
                                name="kode_produk" id="kode_produk" value="{{ $kode_barang }}" readonly>
                            @error('kode_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="barcode" class="col-sm-3 mt-2 mb col-form-label">Barcode</label>
                        <div class="col-sm-9 mt-2">
                            <input type="text" class="form-control @error('barcode') is-invalid @enderror"
                                name="barcode" id="barcode" value="{{ $barcode }}" readonly>
                            @error('barcode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="stok" class="col-sm-3 mt-2 mb col-form-label">Stok</label>
                        <div class="col-sm-9 mt-2">
                            <input type="text" class="form-control @error('stok') is-invalid @enderror"
                                name="stok" id="stok" value="{{ old('stok') }}" autocomplete="off">
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="suplaier_id" class="col-sm-3 mt-2 col-form-label">Supplier</label>
                        <div class="col-sm-9 mt-2">
                            <select type="input" class="form-select" aria-label="Default select example"
                                id="suplaier_id" name="suplaier_id" required>
                                <option value="" selected disabled>--Pilih Supplier--
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
                            <input type="text" class="form-control @error('harga_jual') is-invalid @enderror"
                                name="harga_jual" id="harga_jual" value="{{ old('harga_jual') }}" autocomplete="off">
                            @error('harga_jual')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="harga_beli" class="col-sm-3 col-form-label">Harga Beli</label>
                        <div class="col-sm-9 mt-2">
                            <input type="text" class="form-control @error('harga_beli') is-invalid @enderror"
                                name="harga_beli" id="harga_beli" onkeyup="sum()" autocomplete="off">
                            @error('harga_beli')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="inputPassword" class="col-sm-3 mt-2 mb col-form-label">Description
                            Item</label>
                        <div class="col-sm-9 mt-2">
                            <input type="text" class="form-control" id="inputPassword" autocomplete="off">
                        </div>

                        <label for="inputPassword" class="col-sm-3 mt-2 mb col-form-label">Size Item</label>
                        <div class="col-sm-9 mt-2">
                            <select type="input" class="form-select" aria-label="Default select example"
                                id="inputPassword">
                                <option value="">0</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
