<?php
require 'functions.php';

//mengecek apakah tombol login sudah ditekan atau belum
if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

   $result =  mysqli_query($conn, "SELECT * FROM user WHERE
              username = '$username'");

    //cek username
    //untuk menghitung baris yang dikembalikan select
    if(mysqli_num_rows($result) === 1 ) {

        //cek password
        //password verify untuk mengecek string sama tidak dengan hash
        //dengan parameter yang belum diacak dan yang sudah diacak
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            header("Location: index.php");
            exit;
        }
    }
    
    //jika tidak ada username maka masuk $error = true
    //jika ada nama masuk password verify
    //jika password login dan database tidak sama maka masuk $error = true
    $error = true;

}


?>


<!DOCTYPE html>
<html>
<head>
   
    <title>Halaman Login</title>
</head>
<body>
    
<h1>Halaman Login</h1>

<?php if( isset($error) ) : ?>
    <p style="color: red; font-style: italic;">username / password salah</p>
<?php endif; ?>



<form action="" method="POST">

<ul>
    <li>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username">
    </li>
    <li>
    <label for="password">Password :</label>
        <input type="password" name="password" id="password">
    </li>
    <li>
        <button type="submit" name="login">Login</button>
    </li>
</ul>

</form>

</body>
</html>