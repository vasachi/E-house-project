<!DOCTYPE html>
<html>

<head>
    <title>User registration</title>
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
        $DBID = $_REQUEST['DBID'];
        $FULL_NAME = $_REQUEST['FULL_NAME'];
        $STAFF_NO = $_REQUEST['STAFF_NO'];
        $DEPARTMENT = $_REQUEST['DEPARTMENT'];
        $EMAIL = $_REQUEST['EMAIL'];
        $DEVICE_SERIAL_NUMBER = $_REQUEST['DEVICE_SERIAL_NUMBER'];
        $VEHICLE_NUMBER_PLATE = $_REQUEST['VEHICLE_NUMBER_PLATE'];


        // Performing insert query execution
        $sql = "INSERT INTO staff_users (DBID, FULL_NAME, STAFF_NO, DEPARTMENT, EMAIL, DEVICE_SERIAL_NUMBER, VEHICLE_NUMBER_PLATE)
                VALUES ('$DBID', '$FULL_NAME', '$STAFF_NO', '$DEPARTMENT', '$EMAIL', '$DEVICE_SERIAL_NUMBER', '$VEHICLE_NUMBER_PLATE')";

        if (mysqli_query($conn, $sql)) {
            echo "<h3>User registered successfully. Please login again to update data.</h3>";
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
