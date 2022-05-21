<?php
$mahasiswa = [
["Ananda", "08132005", "Teknik", "ananda@gmail.com"],
["Nichola", "08132004", "Teknik", "nichola@gmail.com"]
];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>daftar mahasiswa</title>
    </head>
    <body>
        <h1>Daftar mahasiswa</h1>

        <?php foreach( $mahasiswa as $mhs) : ?>
        <ul>
       <li><?= $mhs[0]; ?></li>
       <li><?= $mhs[1]; ?></li>
       <li><?= $mhs[2]; ?></li>
       <li><?= $mhs[3]; ?></li>
        </ul>
        <?php endforeach; ?>
    </body>
</html>