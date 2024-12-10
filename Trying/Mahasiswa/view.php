<?php
include "../connection.php";
require_once '../component/sidebar.php';
require_once '../component/navbar.php';

session_start();
$nim = $_SESSION['nim'];
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style/styleView.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <title>View</title>
</head>

<body>
    <?php echo renderSidebar(); ?>
    <div class="navbar">
        <?php renderNavbar(); ?>
    </div>


    <h1>View Your Prestation</h1>
    <table>
        <thead>
            <th>Nama Lomba</th>
            <th>Kategori Juara</th>
            <th>Tipe Prestasi</th>
            <th>Tingkat Prestasi</th>
            <th>Status</th>
        </thead>
        <?php

        $tsql = "SELECT p.nim, dp.NAMA_LOMBA, p.PERINGKAT, p.JENIS_PRESTASI , t.TINGKATAN, p.STATUS
                            FROM PRESTASI p
                            JOIN DETAIL_PRESTASI dp ON dp.ID_DETAIL = p.ID_DETAIL
                            JOIN TINGKAT t ON t.ID_TINGKAT = p.ID_TINGKAT
                            where p.NIM = :nim";
        $stmt = $conn->prepare($tsql);
        $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
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
                    $statusClass = 'other-status';
                    break;
            }
        ?>
            <tr>
                <td><?= htmlspecialchars($row['NAMA_LOMBA']); ?></td>
                <td><?= htmlspecialchars($row['PERINGKAT']); ?></td>
                <td><?= htmlspecialchars($row['JENIS_PRESTASI']); ?></td>
                <td><?= htmlspecialchars($row['TINGKATAN']); ?></td>
                <td>
                    <button class="status <?= $statusClass ?>">
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
        <?php
        }
        ?>
    </table>
</body>

</html>