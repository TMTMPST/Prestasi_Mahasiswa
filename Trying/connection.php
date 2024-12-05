<?php
try {
    $serverName = "LAPTOP-315GD7L8";
    $database = "presma_web";
    
    // DSN (Data Source Name) untuk koneksi PDO
    $dsn = "sqlsrv:Server=$serverName;Database=$database";
    // koneksi menggunakan PDO
    $conn = new PDO($dsn);
    // PDO agar melempar exception jika terjadi error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi Berhasil.";
    
} catch (PDOException $e) {
    echo "Koneksi Gagal.";
    die("Error: " . $e->getMessage());
}
?>