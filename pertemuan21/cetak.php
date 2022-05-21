<?php

// require_once untuk memanggil library dalam vendor

use Mpdf\Output\Destination;

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");


// coba jalankan code ini
// try {
//     //code...
//     $mpdf = new \Mpdf\Mpdf();
//     $mpdf->WriteHTML('<h1>Hello world!</h1>');
//     var_dump($mpdf->Output()); 
// jika gagal
// } catch (\Exception $e) {
//     //throw $th;
// maka akan menampilkan pesan
//
//     echo $e->getMessage();
// }

// tinggal instansiasi
$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <title>Daftar Mahasiswa</title>
   <link rel="stylesheet" href="css/print.css">s
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No. </th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Absen</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>';

    $i =1;
    foreach( $mahasiswa as $row ) {
        $html .= '<tr>
        <td>'. $i++ .'</td>
        <td><img src="img/'. $row["gambar"] .'" width="50"></td>
        <td>'. $row["nama"] .'</td>
        <td>'. $row["absen"] .'</td>
        <td>'. $row["email"] .'</td>
        <td>'. $row["jurusan"] .'</td>
        </tr>';

    }

 $html .=  '</table>
</body>
</html>';
// untuk mencetak html kedalam pdf
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf', \Mpdf\Output\Destination::INLINE);



?>


