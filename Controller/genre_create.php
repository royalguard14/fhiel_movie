<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the genre from the form
    $genre = $_POST['genre'];

    // Database configuration
    $host = 'localhost';
    $dbName = 'movies';
    $dbusername = 'root';
    $dbpassword = '';

    try {
        // Connect to the database
        $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO tbl_movie_genre (genreType) VALUES (?)");

        // Bind the genre value to the statement
        $stmt->bindParam(1, $genre);

        // Execute the statement
        $stmt->execute();

        // Redirect back to the same page
        header('Location: ../Views/genres/index.php');
        exit();
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
    }
}
?>
