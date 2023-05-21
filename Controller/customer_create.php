<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve customer details from the form
    $email = $_POST['email'];
    $fName = $_POST['fName'];
    $mName = $_POST['mName'];
    $lName = $_POST['lName'];
    $address = $_POST['address'];
    $contactNo = $_POST['contactNo'];

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

    // Insert customer information into the tbl_customer_info table
    $sql = "INSERT INTO tbl_customer_info (email, fName, mName, lName, address, contactNo) VALUES ('$email', '$fName', '$mName', '$lName', '$address', '$contactNo')";

    if (mysqli_query($conn, $sql)) {
        $success = true;
    } else {
        $success = false;
    }

    // Close the database connection
    mysqli_close($conn);

    // Provide feedback to the user
    if ($success) {
        echo "Customer created successfully!";
        header('Location: ../Views/customers/index.php');
        exit();
    } else {
        echo "Failed to create the customer. Please try again.";
    }
}
?>
