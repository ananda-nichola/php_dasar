<?php

//koneksi ke database
$conn = mysqli_connect("sql113.epizy.com","epiz_31554856","5lydqAehpl3o","epiz_31554856_phpdasar");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;

}


function tambah($data){
    global $conn;

    
    $nama =htmlspecialchars($data ["nama"]);
    $absen =htmlspecialchars($data["absen"]);
    $email =htmlspecialchars($data["email"]);
    $jurusan =htmlspecialchars($data["jurusan"]);

       //upload gambar
       //jika gambar berhasil diupload maka yang muncul nama filenya
       $gambar = upload();
       if( !$gambar) {
           return false;
       }

   //setiap mau menambahkan data id harus diganti sesuai jumlah data bertambah
   $query = "INSERT INTO mahasiswa
              VALUES
              
              ('12', '$gambar', '$nama', '$absen', '$email', '$jurusan')
              ";

              mysqli_query($conn, $query);
              


              return mysqli_affected_rows($conn);

    }





function upload() {
    
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmp_name = $_FILES["gambar"]["tmp_name"];


    // cek apakah tidak ada gambar yang diupload
    if($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    //cek apakah file yang diupload adalah gambar
    //end mengambil akhir kalimat
    //explode pemecah string sebagai array
    //strtolower mengubah / memaksa huruf besar menjadi huruf kecil
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    // var_dump($ekstensiGambar);
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    
    }

    /*if(()) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }
*/
    // cek jika ukurannya terlalu besar
      if( $ukuranFile > 1000000 ) {
        echo "<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
        return false;
     }

  //  lolos pengecekan gambar siap diupload
  //generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= ".";
  $namaFileBaru .= $ekstensiGambar;


   move_uploaded_file($tmp_name, 'img/' . $namaFileBaru);

   return $namaFileBaru;

}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}  

function ubah($data) {
    global $conn;

    $id = $data["id"];
    $gambar =htmlspecialchars($data ["gambar"]);
    $nama =htmlspecialchars($data ["nama"]);
    $absen =htmlspecialchars($data["absen"]);
    $email =htmlspecialchars($data["email"]);
    $gambarLama =htmlspecialchars($data["gambarlama"]);

    //cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    

    $jurusan =htmlspecialchars($data["jurusan"]);

    $query = "UPDATE mahasiswa SET
              gambar = '$gambar',
              nama = '$nama',
              absen = '$absen',
              email = '$email',
              jurusan = '$jurusan'
              WHERE id = $id
              ";

              mysqli_query($conn, $query);
              


              return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM mahasiswa
    WHERE
    nama LIKE '%$keyword%' OR 
    absen LIKE '%$keyword%' OR 
    email LIKE '%$keyword%' OR 
    jurusan LIKE '%$keyword%'
    ";

    return query($query);
}

//function ini menerima inputan data yg dikirim,
//dari $_POST dan ditangkap disini
function registrasi($data) {
    //untuk mengambil koneksi paling  atas halaman ini
     global $conn;
     
     //stripslashes untuk membersihkan karakter tertentu contoh /
     //strtolower memaksa untuk jadi huruf kecil semua
     //password bebas dengan karakter khusus
     $username = strtolower(stripslashes($data["username"]));
     $password = mysqli_real_escape_string($conn, $data["password"]);
     //konfirmasi password lagi
     $password2 = mysqli_real_escape_string($conn, $data["password2"]);

     //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user 
    WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
        alert('username sudah terdaftar!')
        </script>";
        return false;
    }
    

     //cek konfirmasi password
     if( $password !== $password2 ) {
         echo "<script>
         alert('konfirmasi password tidak sesuai!');
         </script>";
         return false;
     }
    
    

     //enkripsi password
     //password_hash password yang akan diacak dan pake algoritma apa
     $password = password_hash($password, PASSWORD_DEFAULT);

     //tambahkan userbaru ke database
     mysqli_query($conn, "INSERT INTO user VALUES('1', '$username', '$password')");

     return mysqli_affected_rows($conn);

    


}

?>






















 