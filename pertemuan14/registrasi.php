<?php 
//untuk memanggil
require 'functions.php';

//untuk menandai jika tombol registrasi sudah ditekan
if( isset($_POST["register"]) ) {

    if( registrasi($_POST) > 0 ) {
        echo "<script>
        alert('user baru berhasil ditambahkan');
        </script>";
    } else {
        echo mysqli_error($conn);
    }

}

?>

<!DOCTYPE html>
<html>
<head>
        <title> Halaman Registrasi</title>
        <style> 
        label {
            display: block;
        }
        </style>
</head>
<body>

<h1>Halaman Registrasi</h1>


<form action="" method="POST">

<ul>
    <li>
        <label for="username">username :</label>
        <input type="text" name="username" id="username">
    </li>
    <li>
        <label for="password">password :</label>
        <input type="password" name="password" id="password">
    </li>
    <li>
        <label for="password2">konfirmasi password :</label>
        <input type="password" name="password2" id="password2">
    </li>
    <button type="submit" name="register">Register!</button>


</ul>

</form>

</body>
</html>
