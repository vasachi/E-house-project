<?php
// Database configuration
$servername = "localhost";
$username = "Admin1";
$password = "shivachi";
$dbname = "check_in_system";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FULL_NAME = $_POST["fullname"];
    $STAFFNO/ID = $_POST["Staffno"];
    $DEPARTMENT = $_POST["department"];
    $EMAIL = $_POST["email"];
    $DEVICE_SERIAL_NUMBER = $_POST["device"];
    $VEHICLE_NUMBER_PLATE = $_POST["vehicleplate"];


    // Perform input validation
   /* if (empty($) || empty($staffNo) || empty($phoneNumber) || empty($department) || empty($device) || empty($deviceSerial) || empty($vehicleType) || empty($vehiclePlate)) {
        echo "All fields are required.";
    } else {
        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO `tbluser` (`ID`, `user_name`, `phoneNo.`, `departments`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isis", $staffNo, $username, $phoneNumber, $department)
        if ($stmt->execute()) {
            $userId = $stmt->insert_id;*/

            // Prepare and execute the SQL statement to insert computer details
            $stmt = $conn->prepare("INSERT INTO `staff_users` (`serialNo.`, `device_type`, `ID`) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $deviceSerial, $device,$staffNo);
            $stmt->execute();

            /* Prepare and execute the SQL statement to insert vehicle details
            $stmt = $conn->prepare("INSERT INTO `tblvehicles` (`PlateNo.`, `Model_type`, `ID`) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $vehiclePlate, $vehicleType, $staffNo);
            $stmt->execute();*/

            echo "Registration successful.";
        } else {
            echo "Error storing registration data.";
        }

        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>
