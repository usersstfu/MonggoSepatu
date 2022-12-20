<?php

$koneksi = mysqli_connect('localhost','root','','thriftshop');

function query($sql)
{
    global $koneksi;
    $result=mysqli_query($koneksi,$sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function insertMerk($id_merk,$nama_merk,$model_sepatu)
{
    global $koneksi;
    $result = mysqli_query($koneksi,"call InsertMerk('$id_merk','$nama_merk','$model_sepatu')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function insertSepatu($id_sepatu,$id_merk,$ukuran, $warna, $harga, $stok, $gambar)
{
    global $koneksi;
    $result = mysqli_query($koneksi,"call InsertSepatu('$id_sepatu','$id_merk','$ukuran','$warna','$harga','$stok','$gambar')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}
function insertDetail($id_detail,$id_sepatu,$jumlah_beli)
{
    global $koneksi;
    $result = mysqli_query($koneksi,"call InsertDetail('$id_detail','$id_sepatu','$jumlah_beli')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function insertHeader($tanggal,$id_detail,$bayar)
{
    global $koneksi;
    $result = mysqli_query($koneksi,"call InsertHeader('$tanggal','$id_detail','$bayar')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function deletesepatu($id_sepatu) {
    global $koneksi;
    $result = mysqli_query($koneksi,"call DeleteSepatu('$id_sepatu')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function deletemerk($id_merk) {
    global $koneksi;
    $result = mysqli_query($koneksi,"call DeleteMerk('$id_merk')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function deletedetail($id_detail) {
    global $koneksi;
    $result = mysqli_query($koneksi,"call DeleteDetail('$id_detail')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function deleteheader($no_nota) {
    global $koneksi;
    $result = mysqli_query($koneksi,"call DeleteHeader('$no_nota')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function updateSepatu($id_sepatu,$id_merk,$ukuran, $warna, $harga, $stok, $gambar)
{
    global $koneksi;
     $result = mysqli_query($koneksi,"call UpdateSepatu('$id_sepatu','$id_merk','$ukuran','$warna','$harga','$stok','$gambar')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}
function updateMerk($id_merk,$nama_merk, $model_sepatu)
{
    global $koneksi;
     $result = mysqli_query($koneksi,"call UpdateMerk('$id_merk','$nama_merk','$model_sepatu')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function updateDetail($id_detail,$id_sepatu, $jumlah_beli)
{
    global $koneksi;
     $result = mysqli_query($koneksi,"call UpdateDetail('$id_detail','$id_sepatu','$jumlah_beli')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function updateHeader($tanggal,$id_detail,$bayar)
{
    global $koneksi;
     $result = mysqli_query($koneksi,"call UpdateHeader('$tanggal','$id_detail','$bayar')");
    return $result;
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}
?>
