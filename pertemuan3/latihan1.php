<?php
//pengulangan
//for
//while
//do.. while
//foreach : pengulangan khusus array

//for
for ( $i = 0; $i < 5; $i++) {
    echo "ini pengulangan \n";
}

//while
//selama kondisi bernilai true maka sama dengan for
//jika bernilai false tidak akan jalan
$i = 0;
while( $i < 5) {
    echo " true \n";
    $i++;
}
//do.. while
//jika bernilai false akan dijalankan setidaknya sekali
$i = 0;
do {
echo "siapa siapa? \n";
$i++;
} while( $i < 5 );