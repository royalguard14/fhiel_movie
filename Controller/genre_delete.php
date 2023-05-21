<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the genre ID from the request
    $genreId = $_POST['genreId'];

    // Database configuration
    $host = 'localhost';
    $dbName = 'movies';
    $dbUsername = 'root';
    $dbPassword = '';

    try {
        // Connect to the database
        $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement to delete the genre
        $stmt = $pdo->prepare("DELETE FROM tbl_movie_genre WHERE id = ?");
        $stmt->execute([$genreId]);

        // Return a success response
        echo "Genre deleted successfully";
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
    }
}
?>
