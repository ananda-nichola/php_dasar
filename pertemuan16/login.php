<?php
session_start();
require 'functions.php';


// //cek cookie
// //isinya true atau bukan,untuk mengecek apakah ini user atau bukan
// //jika benar save session jadi true
// //masuk ke index.php
// if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
//     $id = $_COOKIE['id'];
//     $key = $_COOKIE['key'];

//     //ambil username berdasarkan id
//     $result = mysqli_query($conn, "SELECT username FROM user WHERE
//     id = id");
//     $row = mysqli_fetch_assoc($result);

//     //cek cookie dan username
//     //key adalah username yang sudah diacak
//     //dan acak username baru berdasarkan SELECT
//     //cek sama atau tidak hasil hash nya
//     if($key === hash('sha256', $row['username']) ) {
//         //jika bener bisa login
//         $_SESSION['login'] = true;
//     }
// }

//jika sudah login tidak usah masuk lagi kehalaman login,
//tapi ke index.php
if( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}


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
            //set session
            $_SESSION["login"] = true;

            // //cek remember me
            // if( isset($_POST['remember']) ) {
            //     //buat cookie
            //     setcookie('id', $row['id'],  time() + 60); 
            //     setcookie('key', hash('sha256', $row['username']),
            // time() + 60);
            // }
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
    <!-- <li>
   
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>
    </li> -->
    <li>
        <button type="submit" name="login">Login</button>
    </li>
</ul>

</form>

</body>
</html>