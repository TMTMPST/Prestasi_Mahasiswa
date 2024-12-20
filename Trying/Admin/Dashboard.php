<?php
session_start();
include "../connection.php";
require_once '../component/sidebar.php';
require_once '../component/navbarAdmin.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styledashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style/Table.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <title>Dashboard</title>

</head>

<body class="inter" style="padding: 0;">
    <!-- Navigation -->
    <?php echo renderSidebar("Dashboard.php", "input.php", "review.php"); ?>
        <div class="navbar">
        <?php renderNavbar(); ?>
        </div>

    <h1>asd</h1>
    <!-- Main Content -->
    <main class="main-content">
        <div class="dashboard-box dashboard-tall"  style="margin-bottom: 1rem;">
            <h1 class="dashboard-placeholder inter-bold" style="text-align: center;">
                <span class="yellow">WELCOME</span> BACK
            </h1>
        </div>

        <?php
        require_once "../linechart.php";
        ?>
        <div class="table-container">
            <table class="product-table">
                <thead class="table-header">
                    <tr>
                        <th scope="col">*</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Juara</th>
                        <th scope="col">Lomba</th>
                        <th scope="col">Tingkatan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $tsql = "SELECT * FROM D_ADMIN_PRESTASI";
                    $stmt = $conn->prepare($tsql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $statusClass = '';
                        switch ($row['STATUS']) {
                            case 'Pending':
                                $statusClass = 'unreview';
                                break;
                            case 'Completed':
                                $statusClass = 'completed';
                                break;
                            case 'Rejected':
                                $statusClass = 'failed';
                                break;
                            default:
                                $statusClass = 'other-status'; // Status lainnya jika ada
                                break;
                        }
                    ?>

                        <tr>
                            <td scope="row"><img src="../img/dummy/Group8.png"></td>
                            <td scope="row">
                                <h3><?= htmlspecialchars($row['NAMA']); ?></h3>
                                <p><?= htmlspecialchars($row['NIM']); ?></p>
                            </td>
                            <td scope="row"><?= htmlspecialchars($row['PERINGKAT']); ?></td>
                            <td scope="row"><?= htmlspecialchars($row['NAMA_LOMBA']); ?></td>
                            <td scope="row"><?= htmlspecialchars($row['TINGKATAN']); ?></td>
                            <td scope="row">
                                <button class="status <?= $statusClass; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6"
                                        style="width: 15px; height:auto;">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span><?= htmlspecialchars($row['STATUS']); ?></span>
                                </button>
                            </td>
                        </tr>
                </tbody>
            <?php
                    }
            ?>
            </table>
        </div>
    </main>
</body>

</html>