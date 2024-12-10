<?php
include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleSubmit.css">
    <link rel="stylesheet" href="../style/popup.css">
    <title>Submit</title>
</head>

<body class="inter">
    <!-- Navigation -->
    <?php
    include "../component/sidebarAdmin.php";
    echo renderSidebar();
    ?>

    <!-- Main -->
    <div class="Main">
        <!-- Back Button -->
        <a href="inputFile.html" style="text-decoration: none;">
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
            <form id="myForm">
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