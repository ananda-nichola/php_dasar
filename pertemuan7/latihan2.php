<?php
//cek apakah tidak ada data di $_GET
if( !isset($_GET["nama"])  || 
    !isset($_GET["absen"]) || 
    !isset($_GET["email"])  || 
    !isset($_GET["jurusan"])) 
    {
    //redirect
    header("Location: latihan1.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Detail Mahasiswa</title>
    </head>
    <body>

    <ul>
     <li> <?= $_GET["nama"]; ?></li>
     <li> <?= $_GET["absen"]; ?></li>
     <li> <?= $_GET["email"]; ?> </li>
     <li> <?= $_GET["jurusan"]; ?> </li>
    </ul>

    <a href="latihan1.php">Kembali ke daftar mahasiswa</a>
    </body>
</html>