<?php
include "../connection.php";  // Include your database connection

// Check if POST request is made
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the search term sent from JavaScript
    $data = json_decode(file_get_contents('php://input'), true); // Decode the JSON body
    $searchTerm = htmlspecialchars($data['search'] ?? '', ENT_QUOTES, 'UTF-8'); // Get and sanitize the search term

    try {
        // Prepare the SQL query to fetch matching "nama_lomba" values
        $query = "SELECT ID_DETAIL, nama_lomba FROM DETAIL_PRESTASI WHERE nama_lomba LIKE :search";
        $stmt = $conn->prepare($query);
        $searchTerm = '%' . $searchTerm . '%'; // Add wildcards for LIKE search
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        
        // Execute the query and fetch the results
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return the results as a JSON response
        echo json_encode($results);
    } catch (Exception $e) {
        // Handle any errors that occur during the database query
        echo json_encode(['error' => 'Database query failed', 'message' => $e->getMessage()]);
    }
} else {
    // If not a POST request, return an error
    echo json_encode(['error' => 'Invalid request method']);
}
exit(); // Ensure no further processing happens after sending the response
