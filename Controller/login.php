<?php
// Start the session
session_start();
// Database configuration
$host = 'localhost';
$dbName = 'movies';
$dbusername = 'root';
$dbpassword = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
        // Connect to the database
        $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Prepare the statement to fetch user details
        $stmt = $pdo->prepare("SELECT * FROM user_account WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            // Authentication successful
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Retrieve fName from tbl_user_information
            $stmt = $pdo->prepare("SELECT * FROM tbl_user_information WHERE user_account_id = ?");
            $stmt->execute([$user['id']]);
            $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
            //session na
            $_SESSION['Name'] = ucwords($userInfo['fName']) ." ". ucwords($userInfo['mName'][0]). ". ". ucwords($userInfo['lName']);
            
            // Redirect to the home page or any other protected page
            header('Location: ../Views/dashboard/index.php');
            exit();
        } else {
            // Invalid username or password
            echo "Invalid username or password. Please try again.";
        }
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>
