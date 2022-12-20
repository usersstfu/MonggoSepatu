<?php

require 'fungsi.php';
// ambil data di URL
$id = $_GET["id"];

// query data berita berdasarkan ID
$roww = query("SELECT * FROM header_bayar WHERE no_nota = $id")[0];

session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if(isset($_POST['submit']))
 {
 $tanggal = $_POST['tanggal'];
 $id_detail = $_POST['id_detail'];
 $bayar = $_POST['bayar'];
 updateHeader($tanggal,$id_detail,$bayar);
 if (mysqli_affected_rows($koneksi)>0) {
    echo "
    <script>
    alert('Data Berhasil Diubah');
    document.location.href = 'kelola_header.php';
    </script> ";
}  else {
    echo "
    <script>
    alert('Data Gagal Diubah');
    document.location.href = 'kelola_header.php';
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
    <title>Halaman Admin - Ubah Header</title>
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
                <li>
                    <a href="kelola_sepatu.php">Kelola Sepatu</a>
                </li>
                <li>
                    <a href="kelola_detail.php">Kelola Detail Beli</a>
                </li>
                <li class="active">
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
                        <h3>Ubah Header</h3>
                        <hr>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="<?php echo $roww["tanggal"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ID Detail</label>
                                <select name="id_detail" class="form-label" id="id_detail" placeholder="Masukan ID Detail" name="id_detail">
                                            <Option> </Option>
                                            <?php
                                            $tampil = "SELECT * FROM detail_bayar ORDER BY id_detail";
                                            $query = mysqli_query($koneksi, $tampil) or die("Gagal" . mysqli_error($koneksi));
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo "<option> $row[id_detail] 
                                                </option>";
                                            }
                                            ?>
                                        </select>
                            <div class="mb-3">
                                <label for="" class="form-label">Bayar</label>
                                <input type="text" class="form-control" name="bayar" value="<?php echo $roww["bayar"]; ?>">
                            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                            <a href="kelola_header.php" class="btn btn-primary">Kembali</a>
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