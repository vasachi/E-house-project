<!DOCTYPE html>
<html>

<head>
    <title>Admin registration</title>
</head>

<body>
    <center>
        <?php

        // Establishing connection to the database
        $conn = mysqli_connect("localhost", "Admin1", "shivachi", "check_in_system");

        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Taking all values from the form data(input)
        //$DBID = $_REQUEST['DBID'];
        $username = $_REQUEST['username'];
        $phone_number = $_REQUEST['phone_number'];
        $email = $_REQUEST['email'];
        $department = $_REQUEST['department'];
        $password = $_REQUEST['password'];
        
        // Performing insert query execution
        $sql = "INSERT INTO users (username, phone_number, email, department, password)
                VALUES ('$username', '$phone_number', '$email', '$department', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "<h3>Admin registered successfully. Please login again to update data.</h3>";
        } else {
            echo "ERROR: Unable to execute $sql. " . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
        <a href="home.html"><button>RETURN HOME</button></a>

    </center>
</body>

</html>
