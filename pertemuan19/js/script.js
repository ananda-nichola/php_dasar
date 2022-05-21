// ambil elemen elemen yang dibutuhkan
//javascirpt tolong carikan saya elemen yang punya id keyword yang ada didalam document
//jika ketemu akan masuk ke var keyword
var keyword = document.getElementById('keyword');
//tombolcari
var tombolCari = document.getElementById('tombol-cari');
//container
var container = document.getElementById('container');

// tambahken event ketika keyword ditulis
keyword.addEventListener('keyup', function() {

    //buat object ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function() {
        //kesiapan sumber menerima data kita ada 4
        //status =  kesiapan sumber jika 404 sumber tidak jalan
        if( xhr.readyState == 4 && xhr.status == 200) {
         container.innerHTML = xhr.responseText;

        }
    }

    //eksekusi ajax
    //akses sumber mahasiswa.php tapi juga mengirim keyword
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    xhr.send();

});

// function onKeyup() {
//     alert('ok');
