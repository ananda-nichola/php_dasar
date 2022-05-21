<?php

//jalankan session
session_start();
//untuk lebih meyakinkan lagi bahwa session hilang
$_SESSION = [];
//untuk memastikan bahwa session hilang,karena ada kasus session tidak hilang
session_unset();
//menghapus session
session_destroy();


// setcookie('id', '', time() - 3600);
// setcookie('key', '', time() - 3600);

//untuk menendang kembali user kehalaman login
header("Location: login.php");
exit;




?>