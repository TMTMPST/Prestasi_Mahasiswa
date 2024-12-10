<?php
include "../connection.php";
require_once '../component/sidebar.php';
require_once '../component/navbar.php';
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
                <tr>
                    <td>GEMASTIK</td>
                    <td>Juara 2</td>
                    <td>Akademik</td>
                    <td>National</td>
                    <td>
                        <button class="status success">
                            <img src="../img/icon/check.png" alt="check" class="check">
                            COMPLETED
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>KMIPN</td>
                    <td>Juara 1</td>
                    <td>Akademik</td>
                    <td>Lokal</td>
                    <td>
                        <button class="status rejected">
                            <img src="../img/icon/check.png" alt="check" class="check">
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
                </tr>
            </table>
</body>

</html>