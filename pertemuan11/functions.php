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


?>