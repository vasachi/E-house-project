
<?php
$servername = "localhost";
$username = "Admin1";
$password = "shivachi";
$dbname = "checking_system";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}
    // Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form
    $input_username = $_POST['username'];
    $input_password = md5($_POST['password']);

    // Prepare SQL statement to retrieve user data
    $stmt = $conn->prepare("SELECT * FROM tbladmin WHERE user_name = ?");
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
            header(window.Location.href: "home.html");
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


<!DOCTYPE html>
<html lang="en">
  <style>
    body {
        background-image:url();
      display:flex;
      align-items:end;
      justify-content:space-evenly;
      height: 100vh;
      margin: 0;
      background-color: #b1b2f5;
      font-family: 'Arial', sans-serif;
    }

    .login-container {
      text-align: center;
      padding: 40px;
      border-radius: 10px;
      background-color: rgb(255, 255, 255, 0.6);
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
      box-sizing: border-box;
    }

    .login-container img {
      max-width: 100px;
      margin-bottom: 20px;
    }

    .form-heading {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #333;
    }

    .login-form {
      max-width: 300px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      color: #555;
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-sizing: border-box;
      font-size: 16px;
    }

    .form-group button {
      background-color: #4caf50;
      color: #fff;
      padding: 12px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    .form-group button:hover {
      background-color: #45a049;
    }
  </style>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
  <aside>
  </aside>
  <div class="login-container">
    <img src="Assets/img/LOGO.jpg" alt="Logo">
    <div class="form-heading">Check in system<hr>Admin  Login <br> </div>
    <form class="login-form" method="post">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <button type="submit">Login</button>
      </div>
      <div class="form-signup"> 
        <P style="font-size: 25px;">or</P>
        <p>Don't have account </p>
       
      </div>
    </form>
    <button><a herf="forgotpassword.php">forgotpassword</a></button>
  </div>
</body>
</html>