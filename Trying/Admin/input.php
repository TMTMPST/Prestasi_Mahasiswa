<?php
include "../connection.php";
include "../proses/function.php";

if ($conn === false) {
    echo "Koneksi Gagal<br>";
    die(print_r(sqlsrv_errors(), true));
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $dosenList = getDosenList($conn);
    $tingkatList = getTingkat($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleInput.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <title>Input</title>

</head>

<body class="inter">
    <!-- Navigation -->
    <nav class="navbar">
        <div class="navbar-content">
            <div class="navbar-logo">
                <img src="../img/placeholder.png" alt="ACHIVEHUB LOGO">
                <span class="navbar-logo-text">ACHIVEHUB</span>
            </div>
            <div class="steps">
                <div class="active">
                    <i class="fas fa-edit">
                        <img src="../img/Group 78.png" alt="Input Data Prestasi Status" class="navbar-img">
                    </i>
                    <p> Input Data Prestasi</p>
                </div>
                <div>
                    <i class="fas fa-upload">
                        <img src="../img/upload.png" alt="Upload Status" class="navbar-img">
                    </i>
                    <p>Upload File</p>
                </div>
                <div>
                    <i class="fas fa-submit">
                        <img src="../img/submit.png" alt="Submit Status" class="navbar-img">
                    </i>
                    <p>Submit</p>
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
                <a href="#" class="sidebar-profile">
                    <div class="profile-card">
                        <div class="profile-picture">
                            <img src="../img/test/leo.jpeg" alt="Profile Picture">
                        </div>
                        <div class="profile-info">
                            <h3 class="name inter-bold">Ini Admin</h3>
                            <p class="id">19581238123</p>
                        </div>
                    </div>
            </li>
            <li class="sidebar-item sidebar-title">
                <span>Fitur</span>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-secondary ">
                    <div class="sidebar-icon">
                        <a href="dashboard.php" class="sidebar-nchosen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 40px; height:auto; color:black;" class="sidebar-icon-svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                            </svg>
                            <span class="inter-bold">Dashboard</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-main ">
                    <div class="sidebar-icon">
                        <a href="input.php" class="sidebar-chosen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 40px; height:auto;" class="sidebar-icon-svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                            <span class="inter-bold">Input</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-secondary ">
                    <div class="sidebar-icon">
                        <a href="Review.html" class="sidebar-nchosen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 40px; height:auto; color: black;" class="sidebar-icon-svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            <span class="inter-bold">Review</span>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="input-prestasi">
            <h2> Input Prestasi Kalian </h2>
            <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
                <!-- <label for="nama-mahasiswa">
                    Nama Mahasiswa
                </label>
                <input id="nama-mahasiswa" name="nama-mahasiswa" type="text" /> -->
                <label for="nim">
                    Nim
                </label>
                <input id="nim" name="nim" type="text" />
                <label for="nama_lomba">
                    Nama Lomba
                </label>
                <input id="nama_lomba" name="nama_lomba" type="text" />
                <label for="kategori_juara">
                    Kategori Juara
                </label>
                <input id="kategori_juara" name="kategori_juara" type="text" />
                <label for="penyelenggara">
                    Penyelenggara
                </label>
                <input id="penyelenggara" name="penyelenggara" type="text">
                <label for="lokasi">
                    Lokasi
                </label>
                <input id="lokasi" name="lokasi" type="text">
                <label for="dosbing">
                    Dosen Pembimbing
                </label>
                <select id="dosbing" name="dosbing" required>
                    <option value="">Dosen Pembimbing</option>
                    <?php
                    if (!empty($dosenList)) {
                        foreach ($dosenList as $row) {
                            echo '<option value="'. htmlspecialchars($row['NIP']).'">'
                                . htmlspecialchars($row['NIP']). ' - ' .  htmlspecialchars($row['NAMA_DOSEN'])
                                . '</option>';
                        }
                    } else {
                        echo '<option value="">Tidak ada data dosen</option>';
                    }
                    ?>
                    
                </select>
                <label for="date">
                    Date
                </label>
                <input id="date" name="date" type="date" />
                <label for="tipe_prestasi">
                    Tipe Prestasi
                </label>
                <select id="tipe_prestasi" name="tipe-prestasi">
                    <option> Pilih Tipe Prestasi </option>
                    <option> Akademik </option>
                    <option> Non-Akademik </option>
                </select>
                <label for="tingkat_prestasi">
                    Tingkat Prestasi
                </label>
                <select id="tingkat_prestasi" name="tingkat-prestasi">
                    <option> Pilih Tingkat Prestasi </option>
                    <?php
                    if (!empty($tingkatList)) {
                        foreach ($tingkatList as $row) {
                            echo '<option value="'. htmlspecialchars($row['ID_TINGKAT']).'">'
                                .htmlspecialchars($row['TINGKATAN'])
                                . '</option>';
                        }
                    } else {
                        echo '<option value="">Tidak ada data dosen</option>';
                    }
                    ?>
                </select>
                <div class="submit">
                    <a href="inputFile.php"></a>
                    <button type="submit">
                        Continue
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>