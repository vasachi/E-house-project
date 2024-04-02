<!DOCTYPEJS1 html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/imgs/favicon.ico">
    <title>Security checking - Checkin </title>
    <link rel="stylesheet" href="Assets/style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <header>
        <nav class="sidebar">
            <div class="logo">
                <h5>KPLC check-in<div class="ttl_"></div></h5>
            </div>
            <i id="btn" class="material-symbols-outlined"> menu</i>
            <ul class="nav-links">
                <li>
                    <a href="home.html">
                        <i class="material-symbols-outlined">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php">
                        <i class="material-symbols-outlined">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="checkin.html">
                        <i class="material-symbols-outlined">task_alt</i>
                        <span>Checkin</span>
                    </a>
                </li>
                <li>
                    <a href="checkout.html">
                        <i class="material-symbols-outlined">cancel</i>
                        <span>Checkout</span>
                    </a>
                </li>
                <li>
                    <a href="register.html">
                        <i class="material-symbols-outlined">app_registration</i>
                        <span>Registration</span>
                    </a>
                </li>
                
                <li>
                    <a href="logout.php">
                        <i class="material-symbols-outlined">logout</i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
<!-- PHPJS code to establish connection with the localxamppserver -->
<?php

// Username is Admin1
$user = 'Admin1';
$password = 'shivachi';

// Database name is check_in_system
$database = 'check_in_system';

// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}
//$key=$_REQUEST['key'];
// SQL query to select data from database
$sql = " SELECT * FROM staff_users";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPEJS html>

<head>
	
	<title>kplc</title>
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
			font-family: 'Gill Sans', 'Gill Sans',
			'Gill Sans', 'Gill Sans', 'Gill Sans';
		}

		td {
			background-color:pink;
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
		}
            @media print {
               #noprint {
                  display: none;
               }
		}
	</style>
<script>
let timeout;
    function resetTimer() 
{
      clearTimeout(timeout);
      timeout = setTimeout(() =>
 {
        // logout user
 	window.location.href='home.html';
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
		
		<h1><u>KPLC</u></h1>
		<h1><u><b>Central Rift Region</u></b></h1>
		<h1><u>E-House</u></h1>
		
		<!-- TABLE CONSTRUCTION -->
	
	
	
		<table>
			<tr>
				<th>FULL NAME</th>
				<th>STAFF NO</th>
				<th>DEPARTMENT</th>
				<th>CHECKIN DATE</th>
				<th>CHECKOUT</th>
	
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tbody id="USERS">
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['FULL_NAME'];?></td>
				<td><?php echo $rows['STAFF_NO'];?></td>
				<td><?php echo $rows['DEPARTMENT'];?></td>
				<td><?php echo $rows['CHECKIN DATE'];?></td>
				<td><?php echo $rows['CHECKOUT'];?></td>

			</tr>
			<?php
				}
			?>
		</table>

<br>

   <input type="button" id = "noprint" value="PRINT" onclick="window.print();return false;" />

		
	</section>
    </main>
    <!---For the main section provide the css and the javascript codes that relates to it.-->

    <footer>

    </footer>
    <script src="Assets/script/script.js"></script>
</body>
</html>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
</body>

</html>
