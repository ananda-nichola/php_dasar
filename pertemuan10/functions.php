<?php
//koneksi ke database
$conn = mysqli_connect("localhost","root","@S1xxF0ur","phpdasar");

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

    $gambar =htmlspecialchars($data ["gambar"]);
    $nama =htmlspecialchars($data ["nama"]);
    $absen =htmlspecialchars($data["absen"]);
    $email =htmlspecialchars($data["email"]);
    $jurusan =htmlspecialchars($data["jurusan"]);

    $query = "INSERT INTO mahasiswa
              VALUES
              ('7', '$gambar', '$nama', '$absen', '$email', '$jurusan')
              ";

              mysqli_query($conn, $query);
              


              return mysqli_affected_rows($conn);



}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}



?>