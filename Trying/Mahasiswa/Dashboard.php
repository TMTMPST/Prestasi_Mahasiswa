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
        <?php echo renderSidebar(); ?>
        <div class="navbar">
            <?php renderNavbar(); ?>
        </div>

        <h1> asdas</h1>
        <main class="main-content">
            <h1>Welcome Back, Nama</h1>
            <section class="card-grid">
                <div class="card">
                    <h3>Total Achievement Points</h3>
                    <div class="value">440</div>
                </div>
                <div class="card">
                    <h3>Achievements Recorded</h3>
                    <div class="value">12</div>
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
                        <tbody>
                            <tr>
                                <td>Nama Lomba</td>
                                <td>Academic</td>
                                <td>50</td>
                                <td>2023-05-15</td>
                            </tr>
                            <tr>
                                <td>Captain of Basketball Team</td>
                                <td>Sports</td>
                                <td>30</td>
                                <td>2023-04-22</td>
                            </tr>
                            <tr>
                                <td>Volunteer at Local Shelter</td>
                                <td>Community Service</td>
                                <td>20</td>
                                <td>2023-06-01</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
        </main>
    <script src="../js/sidebar.js"></script>
</body>

</html>