<?php
include "../connection.php";
include "../proses/function.php";
require_once '../component/sidebar.php';
require_once '../component/navbarAdmin.php';

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $dosenList = getDosenList($conn);
    $tingkatList = getTingkat($conn);
    $peringkatList = getPeringkat($conn);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nim = htmlspecialchars($_POST['nim'] ?? '');
    $_SESSION['nama-lomba'] = $_POST['nama-lomba'] ?? '';
    $_SESSION['kategori-juara'] = $_POST['kategori-juara'] ?? '';
    $_SESSION['penyelenggara'] = $_POST['penyelenggara'] ?? '';
    $_SESSION['lokasi'] = $_POST['lokasi'] ?? '';
    $_SESSION['dosbing'] = $_POST['dosbing'] ?? '';
    $_SESSION['date'] = $_POST['date'] ?? '';
    $_SESSION['tipe_prestasi'] = $_POST['tipe-prestasi'] ?? '';
    $_SESSION['tingkat_prestasi'] = $_POST['tingkat-prestasi'] ?? '';

    $_SESSION['nim'] = $nim;
    header('Location: inputFile.php');
    exit();
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
    <link rel="stylesheet" href="../style/sidebar.css">
    <title>Input</title>

</head>

<body class="inter">
    <!-- Navigation -->
    <?php echo renderSidebar("Dashboard.php", "input.php", "review.php"); ?>
    <div class="navbar">
        <?php renderNavbar(); ?>
    </div>
    <h1>asdasd</h1>
    <!-- Main Content -->
    <main class="main-content">
        <div class="input-prestasi">
            <h2> Input Prestasi Kalian </h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <!-- <label for="nama-mahasiswa">
                    Nama Mahasiswa
                </label>
                <input id="nama-mahasiswa" name="nama-mahasiswa" type="text" /> -->
                <label for="nim">
                    Nim
                </label>
                <input id="nim" name="nim" type="text" required />
                <label for="nama-lomba">
                    Nama Lomba
                </label>
                <input id="nama-lomba" name="nama-lomba" type="text" required />
                <label for="kategori-juara">
                    Peringkat
                </label>
                <select id="kategori-juara" name="kategori-juara" required>
                    <option value="">-=Peringkat Juara=-</option>
                    <?php
                    if (!empty($peringkatList)) {
                        foreach ($peringkatList as $row) {
                            echo '<option value="' . htmlspecialchars($row['id_peringkat']) . '">'
                                .  htmlspecialchars($row['peringkat'])
                                . '</option>';
                        }
                    } else {
                        echo '<option value="">Tidak ada data Peringkat</option>';
                    }
                    ?>
                </select>
                <label for="penyelenggara">
                    Penyelenggara
                </label>
                <input id="penyelenggara" name="penyelenggara" type="text" required>
                <label for="lokasi">
                    Lokasi
                </label>
                <input id="lokasi" name="lokasi" type="text" required>
                <label for="dosbing">
                    Dosen Pembimbing
                </label>
                <select id="dosbing" name="dosbing" required>
                    <option value="">Dosen Pembimbing</option>
                    <?php
                    if (!empty($dosenList)) {
                        foreach ($dosenList as $row) {
                            echo '<option value="' . htmlspecialchars($row['NIP']) . '">'
                                . htmlspecialchars($row['NIP']) . ' - ' .  htmlspecialchars($row['NAMA_DOSEN'])
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
                <input id="date" name="date" type="date" required />
                <label for="tipe-prestasi">
                    Tipe Prestasi
                </label>
                <select id="tipe-prestasi" name="tipe-prestasi" required>
                    <option value=""> Pilih Tipe Prestasi </option>
                    <option> Akademik </option>
                    <option> Non-Akademik </option>
                </select>
                <label for="tingkat-prestasi">
                    Tingkat Prestasi
                </label>
                <select id="tingkat-prestasi" name="tingkat-prestasi" required>
                    <option value=""> Pilih Tingkat Prestasi </option>
                    <?php
                    if (!empty($tingkatList)) {
                        foreach ($tingkatList as $row) {
                            echo '<option value="' . htmlspecialchars($row['ID_TINGKAT']) . '">'
                                . htmlspecialchars($row['TINGKATAN'])
                                . '</option>';
                        }
                    } else {
                        echo '<option value="">Tidak ada data Tingkatan</option>';
                    }
                    ?>
                </select>
                <div class="submit">
                    <button type="submit">
                        Continue
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
<?php

?>