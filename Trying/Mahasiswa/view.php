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
    <link rel="stylesheet" href="../style/styledashboard.css    ">
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
                    $statusClass = 'pending';
                    break;
                case 'Completed':
                    $statusClass = 'completed';
                    break;
                case 'Rejected':
                    $statusClass = 'rejected';
                    break;
                default:
                    $statusClass = 'other-status'; // Status lainnya jika ada
                    break;
            }

        ?>
            <tr>
                <td><?= htmlspecialchars($row['NAMA_LOMBA']); ?></td>
                <td><?= htmlspecialchars($row['PERINGKAT']); ?></td>
                <td><?= htmlspecialchars($row['JENIS_PRESTASI']); ?></td>
                <td><?= htmlspecialchars($row['TINGKATAN']); ?></td>
                <td>
                    <button class="status success">
                        <img src="../img/icon/check.png" alt="check" class="check">
                        <?= htmlspecialchars($row['STATUS']); ?>
                    </button>
                </td>
            </tr>
            <!-- <tr>
                    <td>KMIPN</td>
                    <td>Juara 1</td>
                    <td>Akademik</td>
                    <td>Lokal</td>
                    <td>
                        <button class="status rejected">
                            <img sr c="../img/icon/check.png" alt="check" class="check">
                            REJECTED
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Taekwondo</td>
                    <td>Juara 3</td>
                    <td>Non Akademik</td>
                    <td>National</td>
                    <td>
                        <button class="status pending">
                            <img src="../img/icon/check.png" alt="check" class="check">
                            PENDING
                        </button>
                    </td>
                </tr> -->
        <?php
        }
        ?>
    </table>
</body>

</html>