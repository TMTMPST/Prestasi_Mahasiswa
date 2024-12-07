
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
                <span>Log Out</span>
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
                <a href="#" class="sidebar-profile">
                    <div class="profile-card">
                        <div class="profile-picture">
                            <img src="../img/test/leo.jpeg" alt="Profile Picture">
                        </div>
                        <div class="profile-info">
                            <h3 class="name inter-bold">Ini Admin</h3>
                            <p class="id">19581238123</p>
                        </div>
                    </div>
            </li>
            <li class="sidebar-item sidebar-title">
                <span>Fitur</span>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-main ">
                    <div class="sidebar-icon">
                        <a href="dashboard.php" class="sidebar-chosen">
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
                        <a href="input.php" class="sidebar-nchosen">
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
                        <a href="Review.html" class="sidebar-nchosen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" style="width: 40px; height:auto; color: black;"
                                class="sidebar-icon-svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            <span class="inter-bold">Review</span>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </aside>

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
                        include "../connection.php";
                        $conn = sqlsrv_connect($serverName, $connectionOptions);
                        $tsql = "SELECT 
                                    P.ID_PRESTASI, 
                                    P.NIM, 
                                    M.NAMA AS NAMA_MHS, 
                                    P.PERINGKAT, 
                                    P.JENIS_PRESTASI, 
                                    P.STATUS 
                                FROM dbo.PRESTASI P
                                JOIN dbo.MAHASISWA M ON P.NIM = M.NIM"; // Join tabel PRESTASI dengan MAHASISWA berdasarkan NIM
                        $stmt = sqlsrv_query($conn, $tsql); //menjalankan query di variabel $tsql
                        do {
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <tr>
                        <td><?= $row['ID_PRESTASI']; ?></td>
                        <td><?= $row['NAMA_MHS']; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="status completed">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6"
                                    style="width: 15px; height:auto;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg> 
                                <span>COMPLETED</span>
                            </button>
                        </td>
                        
                        </tr>

                        <tr>
                        <td scope="row"><img src="../img/dummy/Group8.png"></td>
                        <td scope="row">
                            <h3><?= $row['NAMA_MHS']; ?></h3>
                            <p><?= $row['NIM']; ?></p>
                        </td>
                        <td scope="row"><?= $row['PERINGKAT']; ?></td>
                        <td scope="row"><?= $row['JENIS_PRESTASI']; ?></td>
                        <td scope="row">Regional</td>
                        <td scope="row">
                            <button class="status completed">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6"
                                    style="width: 15px; height:auto;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg> <span>COMPLETED</span>
                            </button>
                        </td>
                    </tr>
                        <?php
                        }
                        } while (sqlsrv_next_result($stmt));
                    ?>
                    

                    <tr>
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
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>