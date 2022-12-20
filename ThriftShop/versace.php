<?php
require 'fungsi.php';
$sepatu = query("SELECT * FROM sepatu,merk where sepatu.id_merk=merk.id_merk and sepatu.id_merk=1006");

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>MONGGO SEPATU</title>

</head>
<header>
    <div class="text-white" style="background-color: #000;">
        <div class="container">
        <img src="img/monggosepatu.png" class="py" style="max-width: 300px; max-height: 300px;" alt="">
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #f43704;">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item mx-2">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item dropdown mx-2">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    MERK
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="adidas.php">ADIDAS</a></li>
                                    <li><a class="dropdown-item" href="chanel.php">CHANEL</a></li>
                                    <li><a class="dropdown-item" href="converse.php">CONVERSE</a></li>
                                    <li><a class="dropdown-item" href="dc.php">DC</a></li>
                                    <li><a class="dropdown-item" href="gucci.php">GUCCI</a></li>
                                    <li><a class="dropdown-item" href="puma.php">PUMA</a></li>
                                    <li><a class="dropdown-item" href="versace.php">VERSACE</a></li>
                                    <li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown mx-2">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    ADMIN
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="login_page.php">Log In</a></li>

                                </ul>
                        </ul>
                        
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slide1.jpg ?>" class="d-block w-100" style="height: 300px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <a href="#" class="h5 text-white text-decoration-none"></a>
                    <p></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/slide2.jpg ?>" class="d-block w-100" style="height: 300px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <a href="#" class="h5 text-white text-decoration-none"></a>
                    <p></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/slide3.png ?>" class="d-block w-100" style="height: 300px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <a href="#" class="h5 text-white text-decoration-none"></a>
                    <p></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="py-3">
        <h4>ALL MERK</h4>
        <hr class="text-subline">
    </div>
    <div class="row py-1">
        <?php foreach ($sepatu as $row) : ?>
            <div class="col-md-3 py-3">
                <div class="card" style="width: 16rem;">
                    <img src="img/<?php echo $row["gambar"]; ?>" class="card-img-top img-thumbnail" alt="..." onerror="this.src='https://media.neliti.com/media/organisations/logo-None-universitas-palangka-raya-48176a02.png'">
                    <div class="card-body">
                        <a href="pages/berita_page.php?id=<?php echo $row["id_merk"]; ?>" class="h6 link-dark card-title text-decoration-none"><?php echo $row["nama_merk"]; ?></a>
                        <p class="card-text text-truncate"></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
</div>

<footer class="text-center text-white" style="background-color: #fb3913;">
    <div class="container p-4">

    <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <h5>CONTACT US</h5>
                <p>
                    MONGGO SEPATU
                </p>
                <p>
                    ALAMAT:
                    Jln. Beliang, Palangka Raya
                    Kalimantan Tengah
                </p>
                <p>Email: dianpea00@gmail.com</p>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #de2703;">
        © 2022 Copyright:
        <a class="text-white" href="">MONGGO SEPATU COMPANY</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>