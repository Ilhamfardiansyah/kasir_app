<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Barcode</title>

    <style>
        .text-center{
            text-align: center;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            @foreach ($data as $item)
            <td class="text-center" style="border: 1px solid">
                <br>{{ $item->nama_produk }} Size {{ $item->size->nama }} {{ $item->rak->nama }}</>
                <br>{{ date('d.m.Y', strtotime($item->created_at)) }}
                <img src="data:image/png;base64, {{ DNS1D::getBarcodePNG($item->barcode, 'C39') }}" alt="{{ $item->barcode }}"
                width="180"
                height="60">
                <br>
                {{ $item->kode_produk }} - Rp. {{ number_format($item->harga_jual) }}
                @if ($no++ % 3 ==0)
                    <tr></tr>
                @endif
            </td>
            @endforeach
        </tr>
    </table>
</body>
</html>
