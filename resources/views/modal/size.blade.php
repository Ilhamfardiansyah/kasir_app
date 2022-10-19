<div class="modal fade" id="sizeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/create/size" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Input Size</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input onkeyup="this.value = this.value.toUpperCase()"
                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                        type="text" name="nama" id="nama" placeholder="Masukan Size"
                        aria-label="default input example" autocomplete="off" autofocus>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
