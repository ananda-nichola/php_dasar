<?php
//SUPERGLOBALS
//variabel global milik php
//merupakan array associative
//Metode request Get adalah metode pengiriman data melalui url dan data tersebut bisa diambil oleh variabel SUPERGLOBAL $_GET


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
        <title> GET</title>
    </head>
    <body>
        <h1>Daftar Mahasiswa </h1>
        <ul>
        <?php foreach($mahasiswa as $mhs) : ?>
            
              <li>
                <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&absen=<?= $mhs["absen"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>"><?= $mhs["nama"]; ?></a>
                </li>
            
        <?php endforeach; ?>
        </ul>

    </body>
</html>



