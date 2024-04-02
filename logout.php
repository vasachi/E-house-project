<?php
// Start the session (if not already started)
session_start();

// Check if the user is logged in
if(isset($_SESSION['user_id'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Response indicating successful logout
    echo json_encode(array("message" => "Logout successful"));
} else {
    // Response indicating that the user is not logged in
    echo json_encode(array("message" => "You are not logged in"));
}


?>
<br><br>
<a href="login.php"><button>Login Again</button></a>