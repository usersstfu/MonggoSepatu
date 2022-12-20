<?php
require 'fungsi.php';
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if(isset($_POST['submit']))
 {
 $id_sepatu = $_POST['id_sepatu'];
 $id_merk = $_POST['id_merk'];
 $ukuran = $_POST['ukuran'];
 $warna = $_POST['warna'];
 $harga = $_POST['harga'];
 $stok = $_POST['stok'];
 $gambar = $_POST['gambar'];

 insertSepatu($id_sepatu,$id_merk,$ukuran, $warna, $harga, $stok, $gambar);
 if (mysqli_affected_rows($koneksi)>0) {
    echo "
    <script>
    alert('Data Berhasil Ditambahkan');
    document.location.href = 'kelola_sepatu.php';
    </script> ";
}  else {
    echo "
    <script>
    alert('Data Gagal Ditambahkan');
    document.location.href = 'kelola_sepatu.php';
    </script> ";

}
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Admin - Tambah Sepatu</title>
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php">
                        ADMIN
                    </a>
                </li>
                <li class="d-flex justify-content-center">
                    <img class="w-75 h-75 py-2" src="img/monggosepatu.png" alt="">
                </li>
                <li>
                    <a href="profil.php">Profil Admin</a>
                </li>
                <li>
                    <a href="kelola_merk.php">Kelola Merk</a>
                </li>
                <li class="active">
                    <a href="kelola_sepatu.php">Kelola Sepatu</a>
                </li>
                <li>
                    <a href="kelola_detail.php">Kelola Detail Beli</a>
                </li>
                <li>
                    <a href="kelola_header.php">Kelola Header Beli</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="header" class="sticky-top">
            <div class="d-flex justify-content-end">
                <a href="logout.php" class="btn btn-danger btn-sm">Keluar</a>
            </div>
        </div>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-lg-12 p-3">
                        <h3>Tambah Merk</h3>
                        <hr>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">ID Sepatu</label>
                                <input type="text" class="form-control" placeholder="Masukan Judul" name="id_sepatu">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ID Merk</label>
                                <input type="text" class="form-control" placeholder="Masukan Judul" name="id_merk">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Ukuran</label>
                                <input type="text" class="form-control" placeholder="Masukan Judul" name="ukuran">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Warna</label>
                                <input type="text" class="form-control" placeholder="Masukan Judul" name="warna">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Harga</label>
                                <input type="text" class="form-control" placeholder="Masukan Judul" name="harga">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Stok</label>
                                <input type="text" class="form-control" placeholder="Masukan Judul" name="stok">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Gambar</label>
                                <input type="text" class="form-control" placeholder="Masukan Judul" name="gambar">
                            </div>
                            
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>