<?php
try {
    $serverName = "LAPTOP-A6N5VPUV"; //kamila
    // $serverName = "LAPTOP-315GD7L8"; //Tionusa
    // $serverName = "LAPTOP-A6N5VPUV";  // josh
    $database = "presma_web";
    
    // DSN (Data Source Name) untuk koneksi PDO
    $dsn = "sqlsrv:Server=$serverName;Database=$database";
    // koneksi menggunakan PDO
    $conn = new PDO($dsn);
    // PDO agar melempar exception jika terjadi error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Koneksi Gagal.";
    die("Error: " . $e->getMessage());
}
?>