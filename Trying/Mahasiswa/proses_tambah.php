<?php
include "../connection.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_SESSION['nim'];
    $nama_lomba = $_SESSION['nama-lomba'];
    $kategori = $_SESSION['kategori-juara'];
    $penyelenggara = $_SESSION['penyelenggara'];
    $lokasi = $_SESSION['lokasi'];
    $dosbing = $_SESSION['dosbing'];
    $date = $_SESSION['date'];
    $tipe = $_SESSION['tipe_prestasi'];
    $tingkat = $_SESSION['tingkat_prestasi'];
    $sertifikat = $_SESSION['sertifikat'];
    $proposal = $_SESSION['proposal'];
    $surat_tugas = $_SESSION['surat_tugas'];
    $karya = $_SESSION['karya'];

    $tsql = "EXEC InsertPrestasi
    @tanggal = :tanggal,
	@lomba = :lomba,
	@lokasi = :lokasi,
	@penyelenggara = :penyelenggara,
    @nim = :nim,
	@nip = :dosbing,
	@jenis_prestasi = :tipe_prestasi,
	@peringkat = :kategori_juara,
	@status = 'Pending',
	@id_tingkat = :id_tingkat,
	@sertifikat = :sertifikat,
	@proposal = :proposal,
	@surat_tugas = :surat_tugas,
	@karya = :karya;";

    $stmt = $conn->prepare($tsql);
    $stmt->bindParam(':tanggal', $date, PDO::PARAM_STR);
    $stmt->bindParam(':lomba', $nama_lomba, PDO::PARAM_STR);
    $stmt->bindParam(':lokasi', $lokasi, PDO::PARAM_STR);
    $stmt->bindParam(':penyelenggara', $penyelenggara, PDO::PARAM_STR);
    $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
    $stmt->bindParam(':dosbing', $dosbing, PDO::PARAM_STR);
    $stmt->bindParam(':tipe_prestasi', $tipe, PDO::PARAM_STR);
    $stmt->bindParam(':kategori_juara', $kategori, PDO::PARAM_STR);
    $stmt->bindParam(':id_tingkat', $tingkat, PDO::PARAM_STR);
    $stmt->bindParam(':sertifikat', $sertifikat, PDO::PARAM_STR);
    $stmt->bindParam(':proposal', $proposal, PDO::PARAM_STR);
    $stmt->bindParam(':surat_tugas', $surat_tugas, PDO::PARAM_STR);
    $stmt->bindParam(':karya', $karya, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header('location:inputSubmit.php?submit=success');
        exit();
    } else {
        // if ($stmt === false) {
        //     echo "Error in executing query.</br>";
        //     die(print_r(sqlsrv_errors(), true));
        // }
    }
}
