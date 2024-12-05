<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="styleforgot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="icon">
            <i class="fas fa-user"></i>
        </div>
        <div class="input-container">
            <div class="input-icon">
                <i class="fas fa-user"></i>
            </div>
            <input type="username" name="username" placeholder="Masukkan username">
        </div>
        <div class="input-container">
            <div class="input-icon">
                <i class="fas fa-lock"></i>
            </div>
            <input type="password" name="password" placeholder="Masukkan password">
        </div>
        <div class="input-container">
            <div class="input-icon">
                <i class="fas fa-lock"></i>
            </div>
            <input type="password" name="confirm-password"  placeholder="Masukkan ulang password">
        </div>
        <button>Kirim Tautan</button>
    </div>

    <?php

include '../connection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validasi input
    if (empty($password) || empty($confirm_password)) {
        echo "Password tidak boleh kosong.";
    } elseif ($password !== $confirm_password) {
        echo "Password dan konfirmasi password tidak cocok.";
    } else {
        // Enkripsi password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Misalnya menggunakan email sebagai identitas untuk reset
        $username = $_POST['username'] ?? '';
        if (!empty($email)) {
            // Query untuk memperbarui password di database
            $sql = "UPDATE dbo.USERS SET PASSWORD = :password WHERE USERNAME = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "Password berhasil diperbarui.";
            } else {
                echo "Terjadi kesalahan saat memperbarui password.";
            }
        } else {
            echo "Email tidak valid.";
        }
    }
}

?>
</body>
</html>
