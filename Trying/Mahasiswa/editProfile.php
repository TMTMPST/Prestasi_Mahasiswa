<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/styleProfile.css">
    <title>Edit Profile</title>
</head>

<body>
    <?php
    session_start();
    include '../connection.php';

    // Pastikan session NIM ada

    // Ambil NIM dari session
    $nim = $_SESSION['nim'];

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Ambil data dari database
        try {
            $sql = "SELECT * FROM dbo.MAHASISWA WHERE NIM = :nim";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
            $stmt->execute();
            $mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$mahasiswa) {
                echo "<script>alert('Mahasiswa tidak ditemukan.');</script>";
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit();
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari form
        $nama = $_POST['nama'] ?? '';
        $password = $_POST['password'] ?? '';
        $email = $_POST['email'] ?? '';

        try {
            // Validasi sederhana
            if (empty($nama) || empty($password) || empty($email)) {
                echo "<script>alert('Semua field wajib diisi.');</script>";
            } else {
                // Update data di database
                $sql = "UPDATE dbo.MAHASISWA 
                    SET NAMA = :nama, PASSWORD = :password, EMAIL = :email 
                    WHERE NIM = :nim";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    echo "<script>alert('Profil berhasil diperbarui!'); window.location.href = 'Dashboard.php';</script>";
                } else {
                    echo "<script>alert('Gagal memperbarui profil.');</script>";
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    ?>

    <!-- Back Button -->
    <a href="Dashboard.php" style="text-decoration: none;">
        <div class="ButtonBack">
            <span class="BackText">Back</span>
        </div><br>
    </a>

    <div class="main-layout">
        <div class="profile-picture">
            <img src="../img/test/leo.jpeg" alt="Profile Picture">
        </div>
        <div class="form-div">
            <!-- <form action="" method="post">
                <label for="nama">Your Name</label><br>
                <input type="text" name="nama" id="nama"  value="<?php echo htmlspecialchars($mahasiswa['NAMA']); ?>"><br>
                <label for="password">Password</label><br>
                <input type="password" name="password"id="password" value="<?php echo htmlspecialchars($mahasiswa['PASSWORD']); ?>"><br>
                <label for="email">Email Address</label><br>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($mahasiswa['EMAIL']); ?>">
            </form> -->
            <form action="" method="post">
                <label for="nama">Your Name</label><br>
                <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($mahasiswa['NAMA']); ?>" readonly><br>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($mahasiswa['PASSWORD']); ?>"><br>
                <label for="email">Email Address</label><br>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($mahasiswa['EMAIL']); ?>"><br>
                <div class="button">
                    <div>
                        <button type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</body>

</html>
<?php

?>