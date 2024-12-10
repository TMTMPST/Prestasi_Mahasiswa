<?php
include "../connection.php";
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
    <title>Dashboard</title>

</head>

<body class="inter">
    <?php
    include "../component/sidebarAdmin.php";
    echo renderSidebar();
    ?>

    <!-- Main Content -->
    <main class="main-content">
        <div class="table-container">
            <table class="product-table">
                <thead class="table-header">
                    <tr>
                        <th scope="col">Nim</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">2312331122"</td>
                        <td>Dong Zhuo</td>
                        <td>Teknik Informatika</td>
                        <td>2F</td>
                        <td class="unmanage"><a href="ReviewMhs.html" class="unmanage-btn">Review</a></td>
                    </tr>
                    <tr>
                        <td scope="row">2312351231</td>
                        <td>Cao Cao</td>
                        <td>Teknik Informatika</td>
                        <td>2F</td>
                        <td class="unmanage"><a href="ReviewMhs.html" class="unmanage-btn">Review</a></td>
                    </tr>
                    <tr>
                        <td scope="row">2312351231</td>
                        <td>Uwiii</td>
                        <td>Teknik Informatika</td>
                        <td>2F</td>
                        <td class="manage">
                            Complete
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>