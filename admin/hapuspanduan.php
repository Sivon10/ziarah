<?php
$databaseHost = 'localhost';
$databaseName = 'toko';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Get id from URL to delete that user
$id = $_GET['kode_buku'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM panduan WHERE kode_buku=$id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php?halaman=panduan_doa");
