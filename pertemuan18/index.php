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
//pagination
//konfigurasi
$jumlahDataPerhalaman = 3;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;
//halaman = 2, awal data = 3

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");



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
            autofocus placeholder="masukan keyword pencarian.."  autocomplete="off">
            <button type="submit" name="cari">Cari</button>


        </form>
        <br><br>

<!-- navigasi -->

<!-- jika halaman aktif lebih besasr dari 1 maka akan tampil -->
<?php if( $halamanAktif >1) : ?>
<!-- halaman ini -->
<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;;</a>
<!-- tapi begitu satu tidak tampil apa apa -->
<?php endif;?>

<?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
    <?php if( $i == $halamanAktif ) : ?>
<a href="?halaman=<?= $i; ?>" style="font-weight:bold;"color: red;><?= $i; ?></a>
    <?php else : ?>
        <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>

<!-- selama halamanAktif lebih kecil dari jumlahHalaman -->
<?php if( $halamanAktif < $jumlahHalaman) : ?>
<!-- selama halaman lebih kecil dari halaman terakhir akan muncul -->
<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;;</a>
<!-- jika dihalaman terakhir tidak munculkan -->
<?php endif;?>

        <br>
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
</body>

        



       
</body>
</htmm>
