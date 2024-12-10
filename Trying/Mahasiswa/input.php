<?php
session_start();
include "../connection.php";
include "../proses/function.php";
require_once '../component/sidebar.php';
require_once '../component/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $dosenList = getDosenList($conn);
    $tingkatList = getTingkat($conn);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $_SESSION['nim'] = $_POST['nim'] ?? '';
    $_SESSION['nama-lomba'] = $_POST['nama-lomba'] ?? '';
    $_SESSION['kategori-juara'] = $_POST['kategori-juara'] ?? '';
    $_SESSION['penyelenggara'] = $_POST['penyelenggara'] ?? '';
    $_SESSION['lokasi'] = $_POST['lokasi'] ?? '';
    $_SESSION['dosbing'] = $_POST['dosbing'] ?? '';
    $_SESSION['date'] = $_POST['date'] ?? '';
    $_SESSION['tipe_prestasi'] = $_POST['tipe-prestasi'] ?? '';
    $_SESSION['tingkat_prestasi'] = $_POST['tingkat-prestasi'] ?? '';

    header('Location: inputFile.php');
    exit();
}$nim = $_SESSION['nim'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ambil data dari database
    try {
        $sql = "SELECT * FROM dbo.MAHASISWA WHERE NIM = :nim";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
        $stmt->execute();
        $mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$mahasiswa) {
            echo "<script>alert('Mahasiswa tidak ditemukan.');</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleInput.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <title>Input</title>
</head>

<body>
        <?php echo renderSidebar(); ?>
        <div class="navbar">
        <?php renderNavbar(); ?>
        </div>

    <!-- Main Content -->
    <h1>asdas</h1>
    <main class="main-content">
        <div class="input-prestasi">
            <h2> Input Prestasi Kalian </h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="nim">
                    NIM
                </label>
                <input id="nim" name="nim" type="text" value="<?php echo htmlspecialchars($mahasiswa['NIM']);?>" readonly/>

                <label for="nama-lomba"> 
                    Nama Lomba
                </label>
                <input id="nama-lomba" name="nama-lomba" type="text" />

                <label for="kategori-juara">
                    Kategori Juara
                </label>
                <input id="kategori-juara" name="kategori-juara" type="text" />

                <label for="penyelenggara">
                    Penyelenggara
                </label>
                <input id="penyelenggara" name="penyelenggara" type="text">
                <label for="lokasi">
                    Lokasi
                </label>
                <input id="lokasi" name="lokasi" type="text">

                <label for="dosbing">DOsen Pembimbing</label>
                <select id="dosbing" name="dosbing" required>
                    <option value="">Dosen Pembimbing</option>
                    <?php
                    if (!empty($dosenList)) {
                        foreach ($dosenList as $row) {
                            echo '<option value="'. htmlspecialchars($row['NIP']) .'">'
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

                <label for="tipe-prestasi">
                    Tipe Prestasi
                </label>
                <select id="tipe-prestasi" name="tipe-prestasi">
                    <option> Pilih Tipe Prestasi </option>
                    <option> Akademik </option>
                    <option> Non Akademik </option>
                </select>

                <label for="tingkat-prestasi">
                    Tingkat Prestasi
                </label>
                <select id="tingkat-prestasi" name="tingkat-prestasi">
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
                    <button type="submit">
                        Continue
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>


</html>