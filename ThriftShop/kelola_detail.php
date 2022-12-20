<?php
require 'fungsi.php';
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$detail = query("SELECT * FROM detail_bayar ");

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
    <title>Halaman Admin - Kelola Detail</title>
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
                <img class="w-75 h-75 py-2" src="imG/monggosepatu.png" alt="">
                </li>
                <li>
                    <a href="profil.php">Profil Admin</a>
                </li>
                <li>
                    <a href="kelola_merk.php">Kelola Merk</a>
                </li>
                <li> 
                    <a href="kelola_sepatu.php">Kelola Sepatu</a>
                </li>
                <li class="active">
                    <a href="kelola_detail.php">Kelola Detail Beli</a>
                </li>
                <li>
                    <a href="kelola_header.php">Kelola Header Beli</a>
                </li>
                <li>
                    <a href="kelola_pembeli.php">Kelola Pembeli</a>
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
                        <h3>Kelola Detail</h3>
                        <hr>
                        <div>
                            <a href="tambah_detail.php" class="btn btn-primary">Tambah Detail</a>
                        </div>
                        <table class="table my-2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>ID Detail</th>
                                    <th>ID Sepatu</th>
                                    <th>Jumlah Beli</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($detail as $row) : ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <a href="ubah_detail.php?id=<?php echo $row["id_detail"]; ?>" class="btn btn-primary btn-sm">Ubah</a>
                                            <a href="hapus_detail.php?id=<?php echo $row["id_detail"]; ?> " onclick="return confirm('Yakin Ingin Menghapus Data?');" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                        <td ><?php echo $row["id_detail"]; ?></td>
                                        <td><?php echo $row["id_sepatu"]; ?></td>
                                        <td><?php echo $row["jumlah_beli"]; ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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