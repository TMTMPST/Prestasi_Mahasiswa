<?php
include "../connection.php";
$conn = sqlsrv_connect( $serverName, $connectionOptions);
if( $conn === false ) {
    echo "Koneksi Gagal</br>";
    die( print_r( sqlsrv_errors(), true));
}

$nim = $_POST['nim'];
$nama_lomba = $_POST['nama-lomba'];
$kategori = $_POST['kategori-juara'];
$dosbing = $_POST['dosbing'];
$date = $_POST['date'];
$tipe = $_POST['tipe-prestasi'];
$tingkat = $_POST['tingkat-prestasi'];

$tsql = "INSERT INTO dbo.PRESTASI (NIM, ID_DOKUMEN, ID_DETAIL, NIP, JENIS_PRESTASI, PERINGKAT, STATUS) VALUES (?, ?, ?, ?, ?, ?, ?)";
$params = array($nim, $id_dokumen, $id_detail, $dosbing, $tipe, $kategori, $status);

$stmt = sqlsrv_query($conn, $tsql, $params);


// $tsql = "INSERT INTO dbo.PRESTASI VALUES('$nim','$nama_lomba','$kategori', '$date', '$tipe', '$tingkat')";
// $stmt = sqlsrv_query( $conn, $tsql);

if( $stmt === false ) {
    echo "Error in executing query.</br>";
    die( print_r( sqlsrv_errors(), true));
}
header('location:inputFile.php');

?>