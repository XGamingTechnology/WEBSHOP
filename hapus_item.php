<?php

    include_once("function/helper.php");

    session_start();

    $barang_id = $_GET['barang_id'];  // Fix: Use $_GET instead of $GET
    $keranjang = $_SESSION['keranjang'];

    unset($keranjang[$barang_id]);

    $_SESSION['keranjang'] = $keranjang;  // Fix: Remove the [$barang_id]

    header("location: " . BASE_URL . "index.php?page=keranjang");  // Fix: Concatenate properly