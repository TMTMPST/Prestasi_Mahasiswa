<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="avatar">
                <i class="fas fa-user"></i>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="NIM" placeholder="Username">
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="PASSWORD" placeholder="Password">
            </div>
            <div class="options">
                <label>
                    <input type="checkbox"> Remember me
                </label>
                <a href="#">Forgot Password?</a>
            </div>
            <button class="login-btn">LOGIN</button>
        </form>
    </div>

<?php
session_start();
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['NIM']; // Ambil input NIM
    $password = $_POST['PASSWORD']; // Ambil input password

    // Validasi input kosong
    if (empty($nim) || empty($password)) {
        $error_message = "NIM dan Password tidak boleh kosong!";
    } else {
        try {
            // Query untuk mengambil data berdasarkan NIM
            $sql = "SELECT * FROM dbo.MAHASISWA WHERE NIM = :nim";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
            $stmt->execute();
            echo $nim;
            echo $password;       
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Periksa apakah NIM ditemukan
            if ($user) {
                // Verifikasi password menggunakan password_verify()
                if ($password === $user['PASSWORD']) {
                    // Jika password benar, set session
                    session_start(); // Jangan lupa memulai session
                    $_SESSION['NIM'] = $user['NIM'];
                    $_SESSION['NAMA'] = $user['NAMA'];
                    $_SESSION['PRODI'] = $user['PRODI'];
                    
                    // Redirect ke halaman dashboard
                    header("Location: ../Mahasiswa/dashboard.html");
                    exit();
                } else {
                    $error_message = "NIM atau Password salah!";
                }
            } else {
                $error_message = "NIM Password salah!";
            }
            
            // Jika ada error, tampilkan pesan error
            if (isset($error_message)) {
                echo $error_message;
            }
        } catch (PDOException $e) {
            // Error handling untuk database
            $error_message = "Terjadi kesalahan pada server: " . $e->getMessage();
        }
    }
}
?>
</body>

</html>
