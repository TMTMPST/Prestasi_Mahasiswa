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
                <input type="text" name="USER" placeholder="Username">
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="PASSWORD" placeholder="Password">
            </div>
            <div class="options">
                <label>
                    <input type="checkbox"> Remember me
                </label>
                <a href="forgotpass.php">Forgot Password?</a>
            </div>
            <button class="login-btn">LOGIN</button>
        </form>
    </div>

<?php
session_start();
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['USER']; // Ambil input NIM
    $password = $_POST['PASSWORD']; // Ambil input password

    // Validasi input kosong
    if (empty($user) || empty($password)) {
        $error_message = "NIM dan Password tidak boleh kosong!";
    } else {
        try {
            // Query untuk mahasiswa
            $sql_mahasiswa = "SELECT * FROM dbo.MAHASISWA WHERE NIM = :nim";
            $stmt_mahasiswa = $conn->prepare($sql_mahasiswa);
            $stmt_mahasiswa->bindParam(':nim', $user, PDO::PARAM_STR);
            $stmt_mahasiswa->execute();
        
            $mahasiswa = $stmt_mahasiswa->fetch(PDO::FETCH_ASSOC);
        
            // Query untuk admin
            $sql_admin = "SELECT * FROM dbo.ADMIN WHERE USERNAME = :username";
            $stmt_admin = $conn->prepare($sql_admin);
            $stmt_admin->bindParam(':username', $user, PDO::PARAM_STR); // Username admin disamakan dengan NIM input
            $stmt_admin->execute();
        
            $admin = $stmt_admin->fetch(PDO::FETCH_ASSOC);
        
            // Periksa apakah mahasiswa ditemukan
            if ($mahasiswa) {
                if ($password === $mahasiswa['PASSWORD']) {
                    session_start();
        
                    // Set session untuk mahasiswa
                    $_SESSION['nim'] = $mahasiswa['NIM'];
                    $_SESSION['name'] = $mahasiswa['NAME'];
                    $_SESSION['role'] = 'mahasiswa';
        
                    // Redirect ke dashboard mahasiswa
                    header("Location: ../Mahasiswa/dashboard.html");
                    exit();
                } else {
                    $error_message = "NIM atau Password mahasiswa salah!";
                }
            }
            // Periksa apakah admin ditemukan
            elseif ($admin) {
                if ($password === $admin['PASSWORD_ADMIN']) {
                    session_start();
        
                    // Set session untuk admin
                    $_SESSION['username'] = $admin['USERNAME'];
                    $_SESSION['name'] = $admin['NAME'];
                    $_SESSION['role'] = 'admin';
        
                    // Redirect ke dashboard admin
                    header("Location: ../Admin/dashboard.html");
                    exit();
                } else {
                    $error_message = "Username atau Password admin salah!";
                }
            } else {
                $error_message = "Username atau Password tidak ditemukan!";
            }
        
        // Tampilkan pesan error jika ada
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
