<?php
include "../connection.php";
include "../proses/function.php";

// if ($conn === false) {
//     echo "Koneksi Gagal<br>";
//     die(print_r(sqlsrv_errors(), true));
// }
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
    <?php
    include "../component/sidebarAdmin.php";
    echo renderSidebar();
    ?>

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
                <label for="nama-lomba">
                    Nama Lomba
                </label>
                <input id="nama-lomba" name="nama_lomba" type="text" />
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
                            echo '<option value="' . htmlspecialchars($row['ID_TINGKAT']) . '">'
                                . htmlspecialchars($row['TINGKATAN'])
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