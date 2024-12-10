<?php
session_start();
include "../connection.php";
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
    <title>Dashboard</title>

</head>

<body class="inter">
    <!-- Navigation -->
    <?php
    include "../component/sidebarAdmin.php";
    echo renderSidebar();
    ?>

    <!-- Main Content -->
    <main class="main-content">
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
                <h1>Ini Admin</h1>
                <h2>Admin JTI</h2>
                <h3>19581238123</h3>
                </p>
            </div>
        </div>
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

                    $tsql = "SELECT 
                                    P.ID_PRESTASI, 
                                    P.NIM, 
                                    M.NAMA AS NAMA_MHS, 
                                    P.PERINGKAT, 
                                    P.JENIS_PRESTASI, 
                                    P.STATUS 
                                FROM dbo.PRESTASI P
                                JOIN dbo.MAHASISWA M ON P.NIM = M.NIM"; // Join tabel PRESTASI dengan MAHASISWA berdasarkan NIM
                    $stmt = $conn->prepare($tsql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                        <tr>
                            <td scope="row"><img src="../img/dummy/Group8.png"></td>
                            <td scope="row">
                                <h3><?= htmlspecialchars($row['NAMA_MHS']); ?></h3>
                                <p><?= htmlspecialchars($row['NIM']); ?></p>
                            </td>
                            <td scope="row"><?= htmlspecialchars($row['PERINGKAT']); ?></td>
                            <td scope="row"><?= htmlspecialchars($row['JENIS_PRESTASI']); ?></td>
                            <td scope="row">Regional</td>
                            <td scope="row">
                                <button class="status completed">
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
                        <!-- <tr>
                            <td scope="row"><img src="../img/dummy/Group8.png"></td>
                            <td scope="row">
                                <h3><?= $row['NAMA_MHS']; ?></h3>
                                <p><?= $row['NIM']; ?></p>
                            </td>
                            <td scope="row"><?= $row['PERINGKAT']; ?></td>
                            <td scope="row"><?= $row['JENIS_PRESTASI']; ?></td>
                            <td scope="row">Nasional</td>

                            <td>
                                <button class="status failed">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6"
                                        style="width: 15px; height:auto;">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span><?= $row['STATUS']; ?></span>
                                </button>
                            </td>
                        </tr> -->
                </tbody>
            <?php
                    }
            ?>
            </table>

            <!-- <tr>
                <td scope="row"><img src="../img/dummy/Group8.png"></td>
                <td scope="row">
                    <h3>Uwiii</h3>
                    <p>2312351231</p>
                </td>
                <td scope="row">Harapan 1</td>
                <td scope="row">GEMASTIK</td>
                <td scope="row">Nasional</td>

                <td>
                    <button class="status failed">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6"
                            style="width: 15px; height:auto;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>Failed</span>
                    </button>
                </td>
            </tr> -->

        </div>
    </main>
</body>

</html>