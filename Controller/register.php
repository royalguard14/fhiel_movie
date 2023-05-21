<?php
// Database configuration
$host = 'localhost';
$dbName = 'movies';
$dbusername = 'root';
$dbpassword = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $fName = $_POST['f_name'];
    $mName = $_POST['m_name'];
    $lName = $_POST['l_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
        // Connect to the database
        $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Insert data into user_account table
        $stmt = $pdo->prepare("INSERT INTO user_account (username, password, access, active) VALUES (?, ?, 1, 1)");
        $stmt->execute([$username, $hashedPassword]);
        // Retrieve the inserted user_account_id
        $userAccountId = $pdo->lastInsertId();
        // Insert data into tbl_user_information table
        $stmt = $pdo->prepare("INSERT INTO tbl_user_information (user_account_id, email, fName, mName, lName, address, contactNo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$userAccountId, $email, $fName, $mName, $lName, $address, $contact]);
        echo "User account created successfully!";
        header('Location: ../Views/auth/login.html');
        exit();
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
                header('Location: ../Views/register.html');
                exit();
    }
}
