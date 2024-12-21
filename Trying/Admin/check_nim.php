<?php
include "../connection.php";
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$nim = $data['nim'] ?? '';

$query = "SELECT COUNT(*) FROM mahasiswa WHERE nim = :nim";
$stmt = $conn->prepare($query);
$stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->fetchColumn();

echo json_encode(['exists' => $count > 0]);
?>

