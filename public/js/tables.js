$(document).ready(function () {
    $('#example').DataTable({
        columnDefs: [
            {
                targets: [0],
                orderData: [0, 1],
            },
            {
                targets: [1],
                orderData: [1, 0],
            },
            {
                targets: [4],
                orderData: [4, 0],
            },
        ],
    });
});
// var harga_beli = document.getElementById("harga_beli");
// harga_beli.addEventListener("keyup", function(e) {
//     // tambahkan 'Rp.' pada saat form di ketik
//     // gunakan fungsi formatharga_beli() untuk mengubah angka yang di ketik menjadi format angka
//     harga_beli.value = formatRupiah(this.value, "");
// });

// /* Fungsi formatRupiah */
// function formatRupiah(angka, prefix) {
//     var number_string = angka.replace(/[^,\d]/g, "").toString(),
//         split = number_string.split(","),
//         sisa = split[0].length % 3,
//         rupiah = split[0].substr(0, sisa),
//         ribuan = split[0].substr(sisa).match(/\d{3}/gi);

//     // tambahkan titik jika yang di input sudah menjadi angka ribuan
//     if (ribuan) {
//         separator = sisa ? "." : "";
//         rupiah += separator + ribuan.join(".");
//     }

//     rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
//     return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
// }

// var harga_jual = document.getElementById("harga_jual");
// harga_jual.addEventListener("keyup", function(e) {
//     // tambahkan 'Rp.' pada saat form di ketik
//     // gunakan fungsi formatharga_jual() untuk mengubah angka yang di ketik menjadi format angka
//     harga_jual.value = formatRupiah(this.value, "");
// });

// /* Fungsi formatRupiah */
// function formatRupiah(angka, prefix) {
//     var number_string = angka.replace(/[^,\d]/g, "").toString(),
//         split = number_string.split(","),
//         sisa = split[0].length % 3,
//         rupiah = split[0].substr(0, sisa),
//         ribuan = split[0].substr(sisa).match(/\d{3}/gi);

//     // tambahkan titik jika yang di input sudah menjadi angka ribuan
//     if (ribuan) {
//         separator = sisa ? "." : "";
//         rupiah += separator + ribuan.join(".");
//     }

//     rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
//     return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
// }

// var total_harga = document.getElementById("total_harga");
// total_harga.addEventListener("keyup", function(e) {
//     // tambahkan 'Rp.' pada saat form di ketik
//     // gunakan fungsi formattotal_harga() untuk mengubah angka yang di ketik menjadi format angka
//     total_harga.value = formatRupiah(this.value, "");
// });

/* Fungsi formatRupiah */
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
    return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
}

function sum() {
    var txtFirstNumberValue = document.getElementById('stok').value;
    var txtSecondNumberValue = document.getElementById('harga_beli').value;
    var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
    if (!isNaN(result)) {
        document.getElementById('total_harga').value = result;
    }
}




