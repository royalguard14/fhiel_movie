<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the genre ID and updated genre from the form
    $genreId = $_POST['genreId'];
    $updatedGenre = $_POST['updatedGenre'];

    // Database configuration
    $host = 'localhost';
    $dbName = 'movies';
    $dbusername = 'root';
    $dbpassword = '';

    try {
        // Connect to the database
        $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement to update the genre
        $stmt = $pdo->prepare("UPDATE tbl_movie_genre SET genreType = ? WHERE id = ?");

        // Bind the updated genre and genre ID to the statement
        $stmt->bindParam(1, $updatedGenre);
        $stmt->bindParam(2, $genreId);

        // Execute the statement
        $stmt->execute();

        // Redirect to a success page or do something else
        header('Location: ../Views/genres/index.php');
        exit();
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
    }
}
?>
