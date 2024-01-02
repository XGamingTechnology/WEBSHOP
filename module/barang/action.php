<?php

    include_once("../../function/koneksi.php");
    include_once("../../function/helper.php");

    $nama_barang = $_POST['nama_barang'];
    $kategori_id = $_POST['kategori_id'];
    $spesifikasi = $_POST['spesifikasi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $button = $_POST['button'];

    $nama_file = $_FILES["fule"] ["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/barang/".$nama_file);

    if($button == "Add") {
        mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES ('$kategori', '$status')");
    } else if($button == "Updagit te") {
        $kategori_id = $_GET ['kategori_id'];
        mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori',status='$status' WHERE kategori_id='$kategori_id'");
    }

    header("location:".BASE_URL."index.php?page=my_profile&module=kategori&action=list");