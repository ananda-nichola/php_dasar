// lakukan ini semua  ketika halaman sudah ready
$(document).ready(function() {

    //event ketika keyword ditulis
    $('#keyword').on('keyup', function() {
        // memanggil ajax menggunakan load
        // load memiliki keterbatasan karena dia hanya bisa menggunakan $_GET
        // ketika pake javascript pake .value
        // jika jquery cukup .val

        // munculkan icon loading
        // jika show memunculkan dan hilang
        $('.loader').show();

        // ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        // $.get()
        // ambil data setelah datanya diambil kita lakukan sesuatu
        // sambil mengirim data hasil
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
            
            // ketika sudah berhasil kita ganti  isi containernya
            // kalo javascript innerhtml
            $('#container').html(data);
            // jquery tolong carikan saya loader lalu sembunyikan
            // hide hanya untuk menyembunyikan
            $('.loader').hide();

        });

    });


});


