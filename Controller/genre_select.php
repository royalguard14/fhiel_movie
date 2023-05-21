<?php
// ...

// Retrieve genre values from the database
    $host = 'localhost';
    $dbName = 'movies';
    $dbusername = 'root';
    $dbpassword = '';

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve genre data from the table tbl_genre
$sql = "SELECT * FROM tbl_movie_genre";
$result = mysqli_query($conn, $sql);

$genres = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $genres[] = $row;
    }
}

mysqli_close($conn);
?>


