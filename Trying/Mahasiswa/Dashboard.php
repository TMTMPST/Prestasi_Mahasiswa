<?php
session_start();
include '../connection.php';
require_once '../component/sidebar.php';
require_once '../component/navbar.php';

// Check if the user is logged in
if (!isset($_SESSION['nim'])) {
    header("Location: ../login/login.php");
    exit();
}

$nim = $_SESSION['nim'];
$nama = $_SESSION['name'];

$sql = "SELECT * FROM D_PRESTASI_MAHASISWA WHERE NIM = :nim";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
$stmt->execute();


$jumlah = "SELECT 
            *
        FROM 
            D_JMLH_POIN_KEGIATAN
        WHERE 
            NIM=:nim";

$stmt2 = $conn->prepare($jumlah);
$stmt2 ->bindParam(':nim', $nim, PDO::PARAM_STR);
$stmt2->execute();
$jnilai = $stmt2->fetch(PDO::FETCH_ASSOC)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styledashboard.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body>
    <?php echo renderSidebar("Dashboard.php", "input.php", "view.php"); ?>
    <div class="navbar">
        <?php renderNavbar(); ?>
    </div>

    <h1> asdas</h1>
    <main class="main-content">
        <h1>Welcome Back, <?php echo $nama; ?></h1>
        <section class="card-grid">
            <div class="card">
                <h3>Total Achievement Points</h3>
                <div class="value"><?= htmlspecialchars($jnilai['jumlah_poin'])?></div>
            </div>
            <div class="card">
                <h3>Achievements Recorded</h3>
                <div class="value"><?= htmlspecialchars($jnilai['jumlah_kegiatan'])?></div>
            </div>
        </section>
        <section class="card">
            <section class="card">
                <h3>Recent Achievements</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Lomba</th>
                            <th>Kategori</th>
                            <th>Poin</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <?php
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?= htmlspecialchars($row['nama_lomba']); ?></td>
                                <td><?= htmlspecialchars($row['tingkatan']); ?></td>
                                <td><?= htmlspecialchars($row['poin']); ?></td>
                                <td><?= htmlspecialchars($row['tgl_kegiatan']); ?></td>
                            </tr>
                        </tbody>
                    <?php
                    }
                    ?>
                </table>
            </section>
    </main>

</body>

</html>