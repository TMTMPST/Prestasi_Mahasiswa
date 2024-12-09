<?php
include "../connection.php";

// $nim = $_POST['nim'];
// $nama_lomba = $_POST['nama-lomba'];
// $kategori = $_POST['kategori-juara'];
// $dosbing = $_POST['dosbing'];
// $date = $_POST['date'];
// $tipe = $_POST['tipe_prestasi'];
// $tingkat = $_POST['tingkat_prestasi'];
// $status = "Pending";
$nim = $_SESSION['nim'];
$nama_lomba = $_SESSION['nama-lomba'];
$kategori = $_SESSION['kategori-juara'];
$dosbing = $_SESSION['dosbing'];
$date = $_SESSION['date'];
$tipe = $_SESSION['tipe_prestasi'];
$tingkat = $_SESSION['tingkat_prestasi'];
$status = "Pending";
// ID_PRESTASI,	NIM, ID_DOKUMEN, ID_DETAIL,	NIP, JENIS_PRESTASI, PERINGKAT, STATUS, ID_TINGKAT
// (NIM, ID_DOKUMEN, ID_DETAIL, NIP, JENIS_PRESTASI, PERINGKAT, STATUS)

// -- Cara Mendapatkan PK dari DETAIL_PRESTASI (Dilakukan dalam satu sesi execute)
// DECLARE @NewDetailPrestasiID INT;

// -- Masukkan data ke detail_prestasi
// INSERT INTO detail_prestasi (TGL_KEGIATAN, NAMA_LOMBA, LOKASI, PENYELENGGARA) 
// VALUES ('2024-06-15', 'Lomba', 'Lokasi', 'Politeknik Negeri Batam');

// SET @NewDetailPrestasiID = SCOPE_IDENTITY();

// -- Menggunakan @NewDetailPrestasiID yang telah diambil sebelumnya untuk menyisipkan data ke prestasi
// INSERT INTO prestasi (ID_DETAIL, JENIS_PRESTASI, PERINGKAT)
// VALUES (@NewDetailPrestasiID, 'nilaiA', 'nilaiB');
$tsql = "INSERT INTO dbo.PRESTASI (NIM, NIP, JENIS_PRESTASI, PERINGKAT, STATUS) 
        VALUES (:nim, :dosbing, :tipe_prestasi, :kategori_juara, 'pending' )";

$stmt = $conn->prepare($tsql);
$stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
$stmt->bindParam(':dosbing', $dosbing, PDO::PARAM_STR);
$stmt->bindParam(':tipe_prestasi', $tipe, PDO::PARAM_STR);
$stmt->bindParam(':kategori_juara', $kategori, PDO::PARAM_STR);
// $stmt->bindParam(':tingkat-prestasi', $tingkat_prestasi, PDO::PARAM_STR);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt->execute();
    if ($stmt === false) {
        echo "Error in executing query.</br>";
        die(print_r(sqlsrv_errors(), true));
    }
    header('location:input.php');
    exit();
}