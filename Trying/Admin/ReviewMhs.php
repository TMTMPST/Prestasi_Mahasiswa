<?php
include "../connection.php";
require_once "../component/sidebarAdmin.php";
require_once "../component/navbarAdmin.php";
$id_prestasi = $_GET['id_prestasi'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id_prestasi'])) {
    $id_prestasi = htmlspecialchars($_GET['id_prestasi']);
    if (isset($_POST['accept'])) {
        $status = "Completed";
    } elseif (isset($_POST['reject'])) {
        $status = "Rejected";
    }

    $sql = "UPDATE PRESTASI 
    SET STATUS = :status 
    WHERE ID_PRESTASI = :id_prestasi;";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':id_prestasi', $id_prestasi, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header('Location: Review.php');
        exit();
    } else {
        echo "Data tidak berubah";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/Review.css">
    <link rel="stylesheet" href="../style/styledashboard.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <title>Submit</title>
</head>

<body class="inter">
<?php echo renderSidebar(); ?>
        <div class="navbar">
        <?php renderNavbar(); ?>
        </div>

    <!-- Main -->
    <div class="Main">
        <!-- Back Button -->
        <a href="Review.php" style="text-decoration: none;">
            <div class="ButtonBack">
                <span class="BackText">Back</span>
            </div><br>
        </a>

        <!-- Header -->
        <div class="Header">
            <h1>Review Prestasi Mahasiswa</h1>
        </div>

        <!-- Data Prestasi Section -->
        <div class="Table DataMahasiswa">
            <div class="SectionHeader">Data Mahasiswa</div>
            <div class="DataItem">
                <span class="Label">Nama</span>
                <span class="Colon">:</span>
                <span class="Details">Lee Dong min</span>
            </div>
            <div class="DataItem">
                <span class="Label">NIM</span>
                <span class="Colon">:</span>
                <span class="Details">2341720175</span>
            </div>
            <div class="DataItem">
                <span class="Label">Prodi</span>
                <span class="Colon">:</span>
                <span class="Details">Teknik Informatika</span>
            </div>
            <div class="DataItem">
                <span class="Label">Angkatan</span>
                <span class="Colon">:</span>
                <span class="Details">2024</span>
            </div>
        </div>

        <!-- Data Prestasi Section -->
        <div class="Table DataPrestasi">
            <div class="SectionHeader">Data Prestasi</div>
            <div class="DataItem">
                <span class="Label">Nama Lomba</span>
                <span class="Colon">:</span>
                <span class="Details">GEMASTIK</span>
            </div>
            <div class="DataItem">
                <span class="Label">Kategori Juara</span>
                <span class="Colon">:</span>
                <span class="Details">Juara 2</span>
            </div>
            <div class="DataItem">
                <span class="Label">Date</span>
                <span class="Colon">:</span>
                <span class="Details">Januari 2023</span>
            </div>
            <div class="DataItem">
                <span class="Label">Tingkat Prestasi</span>
                <span class="Colon">:</span>
                <span class="Details">Akademik - Nasional</span>
            </div>
        </div>

        <!-- File Prestasi Section -->
        <div class="Table FilePrestasi">
            <div class="SectionHeader">File Prestasi</div>
            <div class="FileItem">
                <span class="Label">Sertifikat</span>
                <div class="ViewImage">View Image</div>
            </div>
            <div class="FileItem">
                <span class="Label">Proposal</span>
                <div class="ViewImage">View Image</div>
            </div>
            <div class="FileItem">
                <span class="Label">Surat Tugas</span>
                <div class="ViewImage">View Image</div>
            </div>
            <div class="FileItem">
                <span class="Label">Karya</span>
                <div class="ViewImage">View Image</div>
            </div>
        </div>
        <div class="align-to-right">
            <form action="" method="POST">
                <div class="ButtonAccept">
                    <button type="submit" name="accept">Accept</button>
                </div>
                <div class="ButtonReject">
                    <button type="submit" name="reject">Reject</button>
                </div>
            </form>
        </div>
</body>

</html>