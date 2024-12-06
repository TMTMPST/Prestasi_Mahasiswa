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
    <title>Dashboard</title>

</head>

<body class="inter">
    <!-- Navigation -->
    <nav class="navbar">
        <div class="navbar-content">
            <div class="navbar-logo">
                <img src="../img/placeholder.png" alt="ACHIVEHUB LOGO">
                <span class="navbar-logo-text">ACHIVEHUB</span>
            </div>
            <div class="navbar-user-btn">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 icons">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                    </svg>
                </div>
                <a href="../login/index.php">
                    <span>Log Out</span>
                </a>
            </div>
        </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="sidebar">
        <ul class="sidebar-menu">
            <div class="navbar-logo">
                <img src="../img/placeholder.png" alt="ACHIVEHUB LOGO">
                <span class="navbar-logo-text">ACHIVEHUB</span>
            </div>
            <li class="sidebar-item sidebar-title inter-bold">
                <span>Your Account</span>
            </li>
            <li class="sidebar-item">
                <a href="editProfile.html" class="sidebar-profile">
                    <div class="profile-card">
                        <div class="profile-picture">
                            <img src="../img/test/leo.jpeg" alt="Profile Picture">
                        </div>
                        <div class="profile-info">
                            <h3 class="name inter-bold">Leonardo Davinci</h3>
                            <p class="id">2341720175</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="sidebar-item sidebar-title">
                <span>Fitur</span>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-main ">
                    <div class="sidebar-icon">
                        <a href="Dashboard.php" class="sidebar-chosen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" style="width: 40px; height:auto;" class="sidebar-icon-svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                            </svg>
                            <span class="inter-bold">Dashboard</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-secondary ">
                    <div class="sidebar-icon">
                        <a href="input.html" class="sidebar-nchosen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" style="width: 40px; height:auto; color:black"
                                class="sidebar-icon-svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                            <span class="inter-bold">Input</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-secondary ">
                    <div class="sidebar-icon">
                        <a href="view.html" class="sidebar-nchosen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" style="width: 40px; height:auto; color: black;"
                                class="sidebar-icon-svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            <span class="inter-bold">View</span>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </aside>
    <?php
    // Koneksi ke database
    include '../connection.php'; // Ganti dengan file koneksi database Anda
    echo "asda11905279127590275917250912751729507291571092579";

    // Koneksi database untuk halaman dashboard
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Ambil NIM dari parameter atau session (sesuaikan kebutuhan Anda)
        $nim = $_GET['nim'] ?? '';
        echo "asda1";

        if (!empty($nim)) {
            // Query untuk mendapatkan informasi mahasiswa berdasarkan NIM
            $sql = "SELECT * FROM dbo.MAHASISWA WHERE NIM = :nim";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
            echo "asda";

            if ($stmt->execute()) {
                $mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($mahasiswa) {
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
                                    <?php
                                    echo "<h1>Welcome Back, " . htmlspecialchars($mahasiswa['NAMA']) . "</h1>";
                                    echo "<h2>Program Studi: " . htmlspecialchars($mahasiswa['PROGRAM_STUDI']) . "</h2>";
                                    echo "<h3>NIM: " . htmlspecialchars($mahasiswa['NIM']) . "</h3>";
                                    ?>
                                </p>
                                <a href="editProfile.html">
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
                                    style="background-color: white; width: 8rem; height: 7rem; text-align: center; color: transparent; align-items: center;">
                                    <?php
                                    echo "<h1 style='color: black;'>" . ($poin['total_poin'] ?? 0) . "</h1>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </main>
    <?php
                } else {
                    echo "Mahasiswa tidak ditemukan.";
                }
            } else {
                echo "Terjadi kesalahan saat mengambil data.";
            }
        } else {
            echo "NIM tidak diberikan.";
        }
    }
    ?>

</body>

</html>