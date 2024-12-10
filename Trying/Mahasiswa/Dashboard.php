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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styledashboard.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body>
    <div>
        <?php echo renderSidebar(); ?>
        <div class="navbar">
        <?php renderNavbar(); ?>
        </div>
        <div class="main-content">
            <main class="dashboard-content">
                <?php
                // Query untuk mendapatkan informasi mahasiswa berdasarkan NIM
                $sql = "SELECT * FROM dbo.MAHASISWA WHERE NIM = :nim";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
                
                if ($stmt->execute()) {
                    $mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($mahasiswa) {
                ?>
                    <div class="dashboard-box dashboard-tall">
                        <h1 class="dashboard-placeholder inter-bold" style="text-align: center;">
                            <span class="yellow">WELCOME</span> BACK
                        </h1>
                    </div>

                    <div class="dashboard-grid-2col " style="border-radius: 50px; border: 10px solid #FEC113;">
                        <div class="dashboard-grid-item-1">
                            <p class="dashboard-placeholder">
                                <img src="../img/test/leo.jpeg" alt="">
                            </p>
                        </div>
                        <div class="dashboard-grid-item-2">
                            <p class="dashboard-placeholder">
                                <h1><?php echo htmlspecialchars($mahasiswa['NAMA']); ?></h1>
                                <h2><?php echo htmlspecialchars($mahasiswa['PRODI']); ?></h2>
                                <h3><?php echo htmlspecialchars($mahasiswa['NIM']); ?></h3>
                            </p>
                            <a href="editProfile.php">
                                <h3 class="edit">Edit Profile</h3>
                            </a>
                        </div>
                    </div>
                    <?php
                    // Query untuk mendapatkan total poin prestasi
                    $sql_poin = "SELECT total_poin FROM dbo.mahasiswa WHERE NIM = :nim";
                    $stmt_poin = $conn->prepare($sql_poin);
                    $stmt_poin->bindParam(':nim', $nim, PDO::PARAM_STR);
                    $stmt_poin->execute();
                    $poin = $stmt_poin->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="dashboard-grid-2col"
                        style="gap: 1px; background-color: #FEC113; margin-top: 5rem; border-radius: 50px; justify-content: center;">
                        <div class="dashboard-grid-item-1">
                            <img src="../img/icon/poin.png" alt="" style="width: 9rem;">
                        </div>
                        <div class="dashboard-grid-item-2" style="justify-items: center;">
                            <h2>Your Point Prestations</h2>
                            <div
                                style="background-color: white; width: 8rem; height: 7rem; text-align: center; color: transparent; align-items: center; display: flex; justify-content: center;">
                                <h1 style='color: black;'><?php echo ($poin['total_poin'] ?? 0); ?></h1>
                            </div>
                        </div>
                    </div>
                <?php
                    } else {
                        echo "<p>Mahasiswa tidak ditemukan.</p>";
                    }
                } else {
                    echo "<p>Terjadi kesalahan saat mengambil data.</p>";
                }
                ?>
            </main>
        </div>
    </div>
    <script src="../js/sidebar.js"></script>
</body>

</html>