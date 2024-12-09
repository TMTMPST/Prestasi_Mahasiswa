<?php
session_start();
include "../connection.php";
include "proses_tambah.php";

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

// if (!isset($_SESSION['nim'])) {
//     header('Location: input.php');
//     exit();
// }

echo '<pre>';
print_r($_POST);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/styleSubmit.css">
    <link rel="stylesheet" href="../style/popup.css">
    <title>Submit</title>
</head>

<body class="inter">
    <!-- Navigation -->
    <nav class="navbar">
        <div class="navbar-content">
            <div class="navbar-logo">
                <img src="img/placeholder.png" alt="ACHIVEHUB LOGO">
                <span class="navbar-logo-text">ACHIVEHUB</span>
            </div>
            <div class="steps">
                <div>
                    <i class="fas fa-edit">
                        <img src="../img/Group 78.png" alt="Input Data Prestasi Status" class="navbar-img">
                    </i>
                    <p> Input Data Prestasi</p>
                </div>
                <div class="line">
                    <div>
                        <i class="fas fa-upload">
                            <img src="../img/upload-active.png" alt="Upload Status" class="navbar-img">
                        </i>
                        <p>Upload File</p>
                    </div>
                </div>
                <div class="active line">
                    <i class="fas fa-submit">
                        <img src="../img/submit-active.png" alt="Submit Status" class="navbar-img">
                    </i>
                    <p>Submit</p>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="sidebar">
        <ul class="sidebar-menu">
            <div class="navbar-logo">
                <img src="../img/placeholder.png" alt="ACHIVEHUB LOGO">
                <span class="navbar-logo-text">ACHIVEHUB</span>
            </div>
            <li class="sidebar-item sidebar-title inter-bold">
                <span>Your Account</span>
            </li>
            <li class="sidebar-item">
                <a href="editProfile.html" class="sidebar-profile">
                    <div class="profile-card">
                        <div class="profile-picture">
                            <img src="../img/test/leo.jpeg" alt="Profile Picture">
                        </div>
                        <div class="profile-info">
                            <h3 class="name inter-bold">Leonardo Davinci</h3>
                            <p class="id">2341720175</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="sidebar-item sidebar-title">
                <span>Fitur</span>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-secondary ">
                    <div class="sidebar-icon">
                        <a href="Dashboard.php" class="sidebar-nchosen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" style="width: 40px; height:auto; color:black;"
                                class="sidebar-icon-svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                            </svg>
                            <span class="inter-bold">Dashboard</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-main ">
                    <div class="sidebar-icon">
                        <a href="#" class="sidebar-chosen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" style="width: 40px; height:auto;" class="sidebar-icon-svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                            <span class="inter-bold">Input</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-secondary ">
                    <div class="sidebar-icon">
                        <a href="view.html" class="sidebar-nchosen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" style="width: 40px; height:auto; color: black;"
                                class="sidebar-icon-svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            <span class="inter-bold">View</span>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </aside>

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
                <span class="Details"><?php echo $_SESSION['name']; ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">NIM</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo $_SESSION['nim']; ?></span>
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
                <span class="Label">Tipe Prestasi</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo $_SESSION['tipe_prestasi']; ?></span>
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