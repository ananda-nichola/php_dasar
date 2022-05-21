<?Php
//array
//variabel yang dapat memiliki banyak nilai
//elemen pada array boleh memiliki tipe data yang berbeda
//pasangan antara key dan value
//key-nya adalah index, yang dimulai dari 0

//membaut array
//cara lama
$hari = array("Senin", "Selasa", "Rabu");

//cara baru
$bulan = ["Januari", "Februari", "Maret"];
$arrl = [123, "tulisan", false];


//menampilkan array
//var_dump atau print_r()
var_dump($arrl);
print_r($bulan);

//menampilkan 1 elemen pada array
echo $bulan[0];
echo "\n";
echo $arrl[1];
echo "\n";

//menambahkan elemen baru pada array
var_dump($hari);
$hari[] = "Kamis";
$hari[] = "Jumat";
var_dump($hari);