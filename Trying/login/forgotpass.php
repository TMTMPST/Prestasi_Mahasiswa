<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="styleforgot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <?php
    session_start();
    include '../connection.php';

    // Pastikan session ada untuk Mahasiswa atau Admin
    
    // Cek role pengguna
    $isMahasiswa = isset($_SESSION['nim']);
    $username = $isMahasiswa ? $_SESSION['nim'] : $_SESSION['username'];

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        try {
            // Ambil data sesuai role
            if ($isMahasiswa) {
                $sql = "SELECT * FROM dbo.MAHASISWA WHERE NIM = :nim";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nim', $username, PDO::PARAM_STR);
            } else {
                $sql = "SELECT * FROM dbo.ADMIN WHERE USERNAME = :username";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            }

            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                echo "<script>alert('Pengguna tidak ditemukan.');</script>";
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit();
        }
    }


    ?>


    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">  
            <?php if ($isMahasiswa): ?>

            <?php endif; ?>

            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="input-container">
                <div class="input-icon">
                    <i class="fas fa-user"></i>
                </div>
                <input type="username" name="username" id="username" value="<?php echo htmlspecialchars($user['NAMA'] ?? ''); ?>">
            </div>
            <div class="input-container">
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <input type="password" name="password" id="password" placeholder="Masukkan password" value="<?php echo htmlspecialchars($user['PASSWORD'] ?? ''); ?>">
            </div>
            <div class="input-container">
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <input type="password" name="confirm-password" id="confirm-password" placeholder="Masukkan ulang password" value="<?php echo htmlspecialchars($user['PASSWORD'] ?? ''); ?>">
            </div>
            <button type="submit">Kirim</button>
        </form>
    </div>

</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $username = $_POST['username'] ?? '';

    try {
        // Validasi sederhana
        if (empty($nama) || empty($password)) {
            echo "<script>alert('Semua field wajib diisi.');</script>";
        } else {
            // Query update berdasarkan role
            if ($isMahasiswa) {
                $sql = "UPDATE dbo.MAHASISWA 
                    SET NAMA = :nama, PASSWORD = :password 
                    WHERE NIM = :nim";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nim', $username, PDO::PARAM_STR);
            } else {
                $sql = "UPDATE dbo.ADMIN 
                    SET PASSWORD = :password
                    WHERE USERNAME = :username";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            }

            // Bind parameter umum
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);

            // Bind parameter nama hanya untuk Mahasiswa
            if ($isMahasiswa) {
                $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
            }

            // Eksekusi query
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