<?php
include "../connection.php";
include "proses_tambah.php";
require_once '../component/sidebarAdmin.php';
require_once '../component/navbar.php';


$nim = $_SESSION['nim'] ?? null;
if (!$nim) {
    die("NIM tidak ditemukan!");
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $tsql = "SELECT * FROM dbo.MAHASISWA where NIM = :nim";
    $stmt = $conn->prepare($tsql);
    $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
    $stmt->execute();
    $mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleSubmit.css">
    <link rel="stylesheet" href="../style/popup.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <title>Submit</title>
</head>

<body class="inter">
    <!-- Navigation -->
    <?php echo renderSidebar(); ?>
        <div class="navbar">
        <?php renderNavbar(); ?>
        </div>
    <h1>asdasd</h1>

    <!-- Main -->
    <div class="Main">
        <!-- Back Button -->
        <a href="inputFile.php" style="text-decoration: none;">
            <div class="ButtonBack">
                <span class="BackText">Back</span>
            </div><br>
        </a>

        <!-- Header -->
        <div class="Header">
            <h1>Cekk</h1>
        </div>

        <!-- Data Prestasi Section -->
        <div class="Table DataMahasiswa">
            <div class="SectionHeader">Data Mahasiswa</div>
            <div class="DataItem">
                <span class="Label">Nama</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo htmlspecialchars($mahasiswa['NAMA']); ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">NIM</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo $_SESSION['nim']; ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Prodi</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo htmlspecialchars($mahasiswa['PRODI']); ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Angkatan</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo htmlspecialchars($mahasiswa['ANGKATAN']); ?></span>
            </div>
        </div>

        <!-- Data Prestasi Section -->
        <div class="Table DataPrestasi">
            <div class="SectionHeader">Data Prestasi</div>
            <div class="DataItem">
                <span class="Label">Nama Lomba</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo $_SESSION['nama-lomba']; ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Kategori Juara</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo $_SESSION['kategori-juara']; ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Date</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo $_SESSION['date']; ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Tingkat Prestasi</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo $_SESSION['tingkat_prestasi']; ?></span>
            </div>
        </div>

        <!-- File Prestasi Section -->
        <div class="Table FilePrestasi">
            <div class="SectionHeader">File Prestasi</div>
            <div class="FileItem">
                <span class="Label">Sertifikat</span>
                <div class="ViewImage">View Image</div>
                <div class="UploadSuccess">Upload Success</div>
            </div>
            <div class="FileItem">
                <span class="Label">Proposal</span>
                <div class="ViewImage">View Image</div>
                <div class="UploadSuccess">Upload Success</div>
            </div>
            <div class="FileItem">
                <span class="Label">Surat Tugas</span>
                <div class="ViewImage">View Image</div>
                <div class="UploadSuccess">Upload Success</div>
            </div>
            <div class="FileItem">
                <span class="Label">Karya</span>
                <div class="ViewImage">View Image</div>
                <div class="UploadSuccess">Upload Success</div>
            </div>
        </div>

        <div class="ButtonSubmit">
            <form id="" action="proses_tambah.php" method="POST">
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="popup-overlay" id="popup">
            <div class="popup">
                <img src="../img/submit-success.png" alt="Submit Success">
                <p>SUBMIT SUCCESS</p>
            </div>
        </div>

        <script src="../js/popup.js"></script>

</body>

</html>