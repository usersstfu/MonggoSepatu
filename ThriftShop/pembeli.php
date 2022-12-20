<?php
require 'fungsi.php';
//$id = $_GET["id"];
if(isset($_POST["submit"])) {
     //  $query = "INSERT INTO pembeli (idmobil) VALUES ('$id')";
        $query = "CALL insertpembeli('".$_POST["noktp"]."','".$_POST["nama"]."', '".$_POST["ttl"]."', '".$_POST["alamat"]."','".$_POST["nohp"]."','".$_POST["pembayaran"]."','".$_GET["id"]."')";
        mysqli_query($koneksi, $query);
    if (mysqli_affected_rows($koneksi)>0) {
        echo "
        <script>
        alert('Data Berhasil Ditambahkan');
        document.location.href = 'index.php';
        </script> ";
    }  else {
        echo "
        <script>
        alert('Data Gagal Ditambahkan');
        document.location.href = 'index.php';
        </script> ";
    }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian</title>
    <link rel="stylesheet" href="style3.css" type="text/css">
</head>
<body>
    <div class="main">
    <div class="register">
        <h1>Form Pembelian </h1>
        <form id="register" action="" method="post">
                <label for="id_sepatu">ID Sepatu : </label>
                <input type="text" name="id_sepatu" id="id_sepatu" 
                required value="<?=$_GET["id"] ; ?>">
                <br><br>           
                <label for="noktp">No. KTP : </label>
                <br>
                <input type="text" name="noktp" id="noktp" placeholder="Masukkan Nomor KTP">
                <br><br>
                <label for="nama">Nama Lengkap : </label>
                <br>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Lengkap">
                <br><br>
                <label for="ttl">Tempat Tanggal Lahir : </label>
                <br>
                <input type="text" name="ttl" id="ttl" placeholder="Masukkan Tempat, hh/bb/ttt">
                <br><br>
                <label for="alamat">Alamat Lengkap : </label>
                <br>
                <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat">
                <br><br>
                <label for="nohp">No. HP : </label>
                <br>
                <input type="text" name="nohp" id="nohp" placeholder="Masukkan Nomor HP">
                <br><br>
                <label for="pembayaran">Metode Pembayaran : </label>
                <br>
                <input type="radio" name="pembayaran" id="pembayaran" value="Cash"> Cash
                <input type="radio" name="pembayaran" id="pembayaran" value="Kredit"> Kredit
                <input type="radio" name="pembayaran" id="pembayaran" value="Debit"> Debit
                <br><br>
                <button type="submit" name="submit"onclick="return confirm('Apakah semua data sudah diisi dengan benar?');">BELI</button>
            </form>
</body>
</html>