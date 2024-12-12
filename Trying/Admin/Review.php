<?php
include "../connection.php";
require_once '../component/sidebar.php';
require_once '../component/navbarAdmin.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/stylereview.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/Table.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <title>Review</title>

</head>

<body class="inter">
<?php echo renderSidebar("Dashboard.php", "input.php", "review.php"); ?>
        <div class="navbar">
        <?php renderNavbar(); ?>
        </div>
    <h1>asdasd</h1>

    <!-- Main Content -->
    <main class="main-content">
        <div class="table-container">
            <table class="product-table">
                <thead class="table-header">
                    <tr>
                        <th scope="col">Nim</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Lomba</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM REVIEW_MAHASISWA;";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td scope="row"><?= htmlspecialchars($row['NIM']); ?></td>
                            <td><?= htmlspecialchars($row['NAMA']); ?></td>
                            <td><?= htmlspecialchars($row['PRODI']); ?></td>
                            <td><?= htmlspecialchars($row['NAMA_LOMBA']); ?></td>
                            <td class="unmanage">
                                <form action="ReviewMhs.php" method="GET">
                                    <input type="hidden" name="id_prestasi" value="<?= htmlspecialchars($row['ID_PRESTASI']); ?>">
                                    <button type="submit" class="unmanage-btn">Review</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>