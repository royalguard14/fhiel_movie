<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve movie details from the form
    $title = $_POST['title'];
    $cast = $_POST['cast'];
    $director = $_POST['director'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $release_year = $_POST['release_year'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $availability = $_POST['availability'];
    $borrowed = $_POST['borrowed'];

    // Handle image upload
    if (isset($_FILES['img_path']) && $_FILES['img_path']['error'] === UPLOAD_ERR_OK) {
        $tempFile = $_FILES['img_path']['tmp_name'];
        $fileName = $_FILES['img_path']['name'];
        $targetPath = '../Storage/';
        $targetFile = $targetPath . $fileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($tempFile, $targetFile)) {
            // Image uploaded successfully
            // Store the image path in the database
            $img_path = $targetFile;

            // Create a database connection
            $host = 'localhost';
            $dbName = 'movies';
            $dbusername = 'root';
            $dbpassword = '';

            $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbName);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Insert movie information into the tables (tbl_movie_info, tbl_movie_about, tbl_movie_inventory_info)
            $sql1 = "INSERT INTO tbl_movie_info (title, cast, director, img) VALUES ('$title', '$cast', '$director', '$img_path')";
            $sql2 = "INSERT INTO tbl_movie_about (tbl_movie_info_id, tbl_movie_genre_id, `description`, duration, year_release) VALUES (LAST_INSERT_ID(), '$genre', '$description', '$duration', '$release_year')";
            $sql3 = "INSERT INTO tbl_movie_inventory_info (tbl_movie_info_id, price, qty, available, borrowed) VALUES (LAST_INSERT_ID(), '$price', '$quantity', '$availability', '$borrowed')";

            if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)) {
                $success = true;
            } else {
                $success = false;
            }

            // Close the database connection
            mysqli_close($conn);

            // Provide feedback to the user
            if ($success) {
                echo $genre;
            } else {
                echo "Failed to create the movie. Please try again.";
            }
        } else {
            // Failed to move the uploaded file
            echo "Failed to upload the image. Please try again.";
        }
    } else {
        // No file selected or an error occurred during the file upload
        echo "Please select an image file.";
    }
}
?>
