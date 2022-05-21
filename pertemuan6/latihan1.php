<?php
//array  associative
//defisininya sama seperti array numerik ,kecuali
//key-nya adalah string yang kita buat sendiri

$mahasiswa = [
    [
    "nama" => "Ananda",
    "absen" => "6",
     "email" => "ananda@gmail.com",
     "jurusan" => "Rekayasa Perangkat Lunak",
     "gambar" => "index(1).png"
    ],
    [
    "nama" => "Nichola",
    "absen" => "7",
     "email" => "nichola@gmail.com",
     "jurusan" => "Rekayasa Perangkat Lunak",
     "gambar" => "indexx(1).jpeg"
     
    ]
];


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Mahasiswa  </title>
    </head>
    <body>
        <h1>Daftar Mahasiswa</h1>

        <?php foreach( $mahasiswa as $mhs) : ?>
            <ul>
                <li>Nama : <?= $mhs["nama"]; ?></li>
                <li>Absen : <?= $mhs["absen"]; ?></li>
                <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
                <li>Email : <?= $mhs["email"]; ?></li>
                <li>
                    <img src="img/<?= $mhs;["gambar"]; ?>">
                </li>
            </ul>
            <?php endforeach; ?>


    </body>
</html>