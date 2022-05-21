<?php
//Date
//Untuk menampilkan tanggal dengan format tertentu
echo date("l, d-M-Y \n");

//Time
//UNIX Timestamp atau EPOCH time
//detik yang sudah berlalu sejak 1 januari 1970
echo time ();
echo ("\n");

//cara mengetahui dua hari berikutnya
//60*60*24*2 
//60detik 60menit 24jam
echo date ("l", time()+172800 );

//untuk mengetahui 100 hari lagi hari apa dengan kalkulator php
echo date(" d M Y", time()+60*60*24*100);
echo ("\n");

//untuk mengetahui 100 hari kebelakang
echo date("l", time()-60*60*24*100);
echo ("\n");

//mktime
//membuat sendiri detik
//mktime(0,0,0,0,0,0,)
//jam, menit, detik, bulan, tanggal, tahun
//melihat kapan hari kita lahir
echo date("l",mktime(0,0,0,8,13,2005));
echo ("\n");

//strtotime
//jika mengetik format tanggal maka akan muncul detik
echo strtotime("13 aug 2005");
echo ("\n");
?>