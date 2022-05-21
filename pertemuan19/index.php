<?php

//untuk menjalankan session
session_start();

//jika tidak ada session login maka
//akan mengembalikkan user kehalaman login
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
// //pagination
// //konfigurasi
// $jumlahDataPerhalaman = 3;
// $jumlahData = count(query("SELECT * FROM mahasiswa"));
// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
// $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
// $awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;
// //halaman = 2, awal data = 3
// $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");

$mahasiswa = query("SELECT * FROM mahasiswa");

//tombol cari ditekan
if (isset($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html>
<head>
      <title>Halaman Admin</title>
</head>
<body>


<a href="logout.php">Logout</a>

        <h1>Daftar Mahasiswa</h1>


        <a href="tambah.php">Tambah data mahasiswa</a>
        <br></br>

        
        <form action="" method="POST">

            <input type="text" name="keyword" size="40" 
            autofocus placeholder="masukan keyword pencarian.."  autocomplete="off" 
            id="keyword">
            <button type="submit" name="cari" id="tombol-cari">Cari</button>


        </form>
        
      

        <br>
        <!-- div yang membungkus tabel -->
        <div id="container">

        <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No. </th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Absen</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $mahasiswa as $row)  : ?> 


<tr>

 <td><?= $i; ?></td>
 <td>
     <a href="ubah.php?id=<?=  $row["id"]; ?>">ubah</a>
     <a href="hapus.php?id=<?=  $row["id"]; ?>" onclick=" return confirm('yakin?'); ">hapus</a>
 </td>
 <td><img src="img/<?php echo $row["gambar"];?>" width="50"></td>
 <td><?php echo $row["nama"]; ?></td>
 <td><?php echo $row["absen"]; ?></td>
 <td><?php echo $row["email"]; ?></td>
 <td><?php echo $row["jurusan"]; ?></td>

 
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table>
</div>
<script src="js/script.js"></script>
</body>

        
</htmm>
