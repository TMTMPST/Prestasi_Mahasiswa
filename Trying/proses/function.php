<?php
function getDosenList($conn) {
    try {
        $tsql = "SELECT * FROM dbo.DOSEN"; // Query SQL
        $stmt = $conn->prepare($tsql);

        // Eksekusi query
        $stmt->execute();

        // Ambil semua hasil query sebagai array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}
function getTingkat($conn) {
    try {
        $tsql = "SELECT * FROM dbo.TINGKAT"; // Query SQL
        $stmt = $conn->prepare($tsql);

        // Eksekusi query
        $stmt->execute();

        // Ambil semua hasil query sebagai array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

?>
