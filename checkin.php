<?php
$user = 'Admin1';
$password = 'shivachi';
$database = 'check_in_system';
$servername = 'localhost:3306';
$mysqli = new mysqli($servername, $user, $password, $database);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$personal_id = $_REQUEST['personal_id'];
$new_device=$_REQUEST['new_device'];
$new_vehicle=$_REQUEST['new_vehicle'];
if ($new_device == null) {
echo "checking in to E-House, Nakuru....";
}
else
{
$sql = "UPDATE staff_users SET DEVICE_SERIAL_NUMBER = '$new_device' WHERE `STAFF_NO` = '$personal_id'";
$mysqli->query($sql);
}
if ($new_vehicle == null) {
echo "checked in to E-House, Nakuru";
}
else
{
$sql = "UPDATE staff_users SET VEHICLE_NUMBER_PLATE = '$new_vehicle' WHERE `STAFF_NO` = '$personal_id'";
$mysqli->query($sql);
}
$sql = "SELECT * FROM staff_users WHERE `STAFF_NO` = '$personal_id'";
$result = $mysqli->query($sql);

$mysqli->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>DETAILS OF STAFF</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: black;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans', 'Gill Sans', 'Gill Sans', 'Gill Sans';
        }

        td {
            background-color: white;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
    <script>
        function logout() {
            window.location.href = 'home.html';
            // prevent the user from going back to the previous page
            window.history.pushState(null, null, window.location.href = 'home.html');
            window.addEventListener('popstate', function logout() {
                window.history.pushState(null, null, window.location.href = 'home.html');
            });
        }

        let timeout;

        function resetTimer() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                // logout user
                window.location.href = 'home.html';
            }, 60000);
        }

        document.addEventListener('mousemove', resetTimer);
        document.addEventListener('mousedown', resetTimer);
        document.addEventListener('keypress', resetTimer);
        document.addEventListener('touchmove', resetTimer);
        document.addEventListener('onscroll', resetTimer);
    </script>
</head>

<body>
    <section>
        <h1><b><u>KPLC CENTRAL RIFT</b></u></h1>
        <h1><b><u>NAKURU E-HOUSE</b></u></h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>NAME</th>
                <th>STAFF NO/ID</th>
                <th>DEPARTMENT</th>
                <th>EMAIL</th>
                <th>DEVICE SERIAL NUMBER</th>
                <th>VEHICLE NUMBER PLATE</th>
                <th>DATE</th>
                <th>CHECKOUT</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
            // LOOP TILL END OF DATA
            while ($rows = $result->fetch_assoc()) {
            ?>
                <tr>
                    <!-- FETCHING DATA FROM EACH ROW OF EVERY COLUMN -->
                    <td><?php echo $rows['FULL_NAME']; ?></td>
                    <td><?php echo $rows['STAFF_NO']; ?></td>
                    <td><?php echo $rows['DEPARTMENT']; ?></td>
                    <td><?php echo $rows['EMAIL']; ?></td>
                    <td><?php echo $rows['DEVICE_SERIAL_NUMBER']; ?></td>
                    <td><?php echo $rows['VEHICLE_NUMBER_PLATE']; ?></td>
                    <td><?php echo $rows['CHECKIN DATE']; ?></td>
                    <td><?php echo $rows['CHECKOUT']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <br><br>
        <input type="button" id="noprint" value="PRINT" onclick="window.print();return false;">
    </section>
</body>

</html>
