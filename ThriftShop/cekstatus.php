<?php
require 'fungsi.php';

$id = $_GET["id"];
$carr = query("SELECT * FROM sepatu WHERE id_sepatu = $id")[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Sepatu</title>
    <link rel="stylesheet" href="style4.css" type="text/css">
</head>
<body>
<h1>Status Sepatu</h1>
<div class="box">
    <table border="1">
    <tr>
            <th colspan="2"> <img src="img/<?= $carr["gambar"]; ?>" width="200"></th>
        </tr>
        <tr>
            <td>ID Sepatu </td>
            <td><?= $carr["id_sepatu"]?></td>
        </tr>
        <tr>
            <td>ID Merk</td>
            <td><?= $carr["id_merk"]; ?></td>
        </tr>
        <tr>
            <td>Ukuran</td>
            <td><?= $carr["ukuran"]; ?></td>
        </tr>
        <tr>
            <td>Warna</td>
            <td><?= $carr["warna"]; ?></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><?= $carr["harga"]; ?></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><?= $carr["stok"]; ?></td>
        </tr>
        <tr>
        <a href="pembeli.php?id=<?php echo $carr["id_sepatu"];?>"><button>BELII</button></a>
        <a href="index.php?id=<?php echo $carr["id_sepatu"];?>"><button>Kembali</button></a>
    </table>

</body>
</html>