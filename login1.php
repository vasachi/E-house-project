<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$servername = "localhost"; // Change this to your database server name
$username = "Admin1"; // Change this to your database username
$password = "shivachi"; // Change this to your database password
$dbname = "check_in_system"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message
$error_message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Prepare SQL statement to retrieve user data
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if username exists in database
    if ($result->num_rows == 1) {
        // Username exists, fetch associated row
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($input_password, $row['password'])) {
            // Password is correct, redirect user to dashboard or desired page
            header("window.Location: home.html");
            exit();
        } else {
            // Password is incorrect, set error message
            $error_message = "Incorrect password";
        }
    } else {
        // Username doesn't exist, set error message
        $error_message = "Username not found";
    }
}

// Close database connection
$conn->close();
?>

