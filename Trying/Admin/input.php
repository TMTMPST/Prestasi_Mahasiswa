<?php
include "../connection.php";
include "../proses/function.php";
require_once '../component/sidebar.php';
require_once '../component/navbarAdmin.php';

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $dosenList = getDosenList($conn);
    $tingkatList = getTingkat($conn);
    $peringkatList = getPeringkat($conn);
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchTerm = htmlspecialchars($_POST['term'] ?? '');

    // Query untuk mencari nama lomba  
    $query = "SELECT TOP 10 * FROM detail_prestasi WHERE nama_lomba LIKE :term;";
    $stmt5 = $conn->prepare($query);
    $stmt5->bindValue(':term', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $stmt5->execute();

    $results = $stmt5->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);

    $nim = htmlspecialchars($_POST['nim'] ?? '');

    if (!empty($nim)) {
        // Cek apakah NIM ada di database
        $query = "SELECT * FROM mahasiswa WHERE nim = :nim";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
        $stmt->execute();
        $mhs = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($mhs) {
            // Ambil data dari form
            $_SESSION['nama-lomba'] = $_POST['nama-lomba'] ?? '';
            $_SESSION['kategori-juara'] = $_POST['kategori-juara'] ?? '';
            $_SESSION['penyelenggara'] = $_POST['penyelenggara'] ?? '';
            $_SESSION['lokasi'] = $_POST['lokasi'] ?? '';
            $_SESSION['dosbing'] = $_POST['dosbing'] ?? '';
            $_SESSION['date'] = $_POST['date'] ?? '';
            $_SESSION['tipe_prestasi'] = $_POST['tipe-prestasi'] ?? '';
            $_SESSION['tingkat_prestasi'] = $_POST['tingkat-prestasi'] ?? '';
            $_SESSION['nim'] = $nim;

            header('Location: inputFile.php');
            exit();
        } else {
            $error_message = "NIM tidak ditemukan!";
        }
    } else {
        $error_message = "Harap masukkan NIM!";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleInput.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style/sidebar.css">
    <title>Input</title>
    <style>
        .error-message {
            color: red;
            margin-bottom: 20px;
        }

        .live-search-results {
            border: 1px solid #ccc;
            max-height: 150px;
            overflow-y: auto;
            list-style-type: none;
            margin: 0;
            padding: 0;
            position: absolute;
            width: 100%;
            background: #fff;
            z-index: 1000;
        }

        .live-search-results li {
            padding: 8px 12px;
            cursor: pointer;
        }

        .live-search-results li:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body class="inter">
    <!-- Navigation -->
    <?php echo renderSidebar("Dashboard.php", "input.php", "review.php"); ?>
    <div class="navbar">
        <?php renderNavbar(); ?>
    </div>
    <h1>asdasd</h1>
    <!-- Main Content -->
    <main class="main-content">
        <div class="input-prestasi">
            <h2> Input Prestasi Kalian </h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <!-- <label for="nama-mahasiswa">
                    Nama Mahasiswa
                </label>
                <input id="nama-mahasiswa" name="nama-mahasiswa" type="text" /> -->
                <label for="nim">
                    Nim
                </label>
                <input id="nim" name="nim" type="search" required />
                <div id="nim-error" class="error-message" style="display: none;">NIM tidak ada!</div>
                <label for="nama-lomba">
                    Nama Lomba
                </label>
                <input id="nama-lomba" name="nama-lomba" type="text" required autocomplete="off" />
                <ul id="nama-lomba-results" class="live-search-results"></ul>
                <label for="kategori-juara">
                    Peringkat
                </label>
                <select id="kategori-juara" name="kategori-juara" required>
                    <option value="">-=Peringkat Juara=-</option>
                    <?php
                    if (!empty($peringkatList)) {
                        foreach ($peringkatList as $row) {
                            echo '<option value="' . htmlspecialchars($row['id_peringkat']) . '">'
                                .  htmlspecialchars($row['peringkat'])
                                . '</option>';
                        }
                    } else {
                        echo '<option value="">Tidak ada data Peringkat</option>';
                    }
                    ?>
                </select>
                <label for="penyelenggara">
                    Penyelenggara
                </label>
                <input id="penyelenggara" name="penyelenggara" type="text" required>
                <label for="lokasi">
                    Lokasi
                </label>
                <input id="lokasi" name="lokasi" type="text" required>
                <label for="dosbing">
                    Dosen Pembimbing
                </label>
                <select id="dosbing" name="dosbing" required>
                    <option value="">Dosen Pembimbing</option>
                    <?php
                    if (!empty($dosenList)) {
                        foreach ($dosenList as $row) {
                            echo '<option value="' . htmlspecialchars($row['NIP']) . '">'
                                . htmlspecialchars($row['NIP']) . ' - ' .  htmlspecialchars($row['NAMA_DOSEN'])
                                . '</option>';
                        }
                    } else {
                        echo '<option value="">Tidak ada data dosen</option>';
                    }
                    ?>

                </select>
                <label for="date">
                    Date
                </label>
                <input id="date" name="date" type="date" required />
                <label for="tipe-prestasi">
                    Tipe Prestasi
                </label>
                <select id="tipe-prestasi" name="tipe-prestasi" required>
                    <option value=""> Pilih Tipe Prestasi </option>
                    <option> Akademik </option>
                    <option> Non-Akademik </option>
                </select>
                <label for="tingkat-prestasi">
                    Tingkat Prestasi
                </label>
                <select id="tingkat-prestasi" name="tingkat-prestasi" required>
                    <option value=""> Pilih Tingkat Prestasi </option>
                    <?php
                    if (!empty($tingkatList)) {
                        foreach ($tingkatList as $row) {
                            echo '<option value="' . htmlspecialchars($row['ID_TINGKAT']) . '">'
                                . htmlspecialchars($row['TINGKATAN'])
                                . '</option>';
                        }
                    } else {
                        echo '<option value="">Tidak ada data Tingkatan</option>';
                    }
                    ?>
                </select>
                <div class="submit">
                    <button type="submit">
                        Continue
                    </button>
                </div>
            </form>
        </div>
    </main>
    <script>
        document.getElementById('nim').addEventListener('input', function() {
            const nim = this.value;
            const errorElement = document.getElementById('nim-error');

            if (nim.trim() !== "") {
                // Lakukan permintaan AJAX untuk cek NIM
                fetch('check_nim.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            nim
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.exists) {
                            errorElement.style.display = 'none';
                            this.classList.remove('error');
                        } else {
                            errorElement.style.display = 'block';
                            this.classList.add('error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                errorElement.style.display = 'none';
                this.classList.remove('error');
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('nama-lomba').addEventListener('input', function() {
                const searchQuery = this.value; // Define searchQuery here
                const resultsContainer = document.getElementById('nama-lomba-results');

                if (searchQuery.trim() !== "") {
                    fetch('search_nama_lomba.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                search: searchQuery
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            resultsContainer.innerHTML = ""; // Clear previous results
                            if (data.length > 0) {
                                data.forEach(item => {
                                    const li = document.createElement('li');
                                    li.textContent = item.nama_lomba;
                                    li.addEventListener('click', function() {
                                        document.getElementById('nama-lomba').value = item.nama_lomba;
                                        resultsContainer.innerHTML = "";
                                    });
                                    resultsContainer.appendChild(li);
                                });
                            } else {
                                resultsContainer.innerHTML = "<li>No results found</li>";
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                } else {
                    resultsContainer.innerHTML = ""; // Clear results if input is empty
                }
            });
        });
    </script>


</body>

</html>