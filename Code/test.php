<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Automatic Remote Feeder</title>
    <link rel="stylesheet" href="styles.css">
	<script src="arf.js" defer></script>
	
	<style>
		table, tr, td {
			padding: 10px;
			border: 2px solid black;
			border-collapse: collapse;
			text-align: center;
		}
		tr {
			border: 4px solid black;
		}
		th {
			font-weight: bold;
		}
		body {
			text-align: center;
		}
		table {
			margin-left: auto;
			margin-right: auto;
		}
		form {
			border: 2px solid black;
			padding: 5px;
			top: 20px;
		}
	</style>
</head>

<body> 
	<?php
		function convertDate($_date) {
			$month = substr($_date, 5, 2);
			switch ($month) {
				case "1":
					$month = "January";
					break;
				case "2":
					$month = "Febuary";
					break;
				case "3":
					$month = "March";
					break;
				case "4":
					$month = "April";
					break;
				case "5":
					$month = "May";
					break;
				case "6":
					$month = "June";
					break;
				case "7":
					$month = "July";
					break;
				case "8":
					$month = "August";
					break;
				case "9":
					$month = "September";
					break;
				case "10":
					$month = "October";
					break;
				case "11":
					$month = "November";
					break;
				case "12":
					$month = "January";
			}
			$year = substr($_date, 0, 4);
			$day = substr($_date, 8, 2);
			$temp = "th";
			switch ($day) {
				case "1":
				case "21":
				case "31":
					$temp = "st";
					break;
				case "2":
				case "22":
					$temp = "nd";
					break;
				case "3":
				case "23":
					$temp = "rd";
					break;
				default:
					$temp = "th";
			}
			return $month . " " . $day . $temp . ", " . $year;
		}
	?>
	
	<?php 
	
		$servername = "localhost";
		$username = "root";
		//$passowrd = "";
		$database = "test";
		
		//remember to change the "" back to $password once you figure out that issue
		$conn = mysqli_connect($servername, $username, "", $database);
		
		if ($conn->connect_error) {
			die("Database is not connect: error " . $conn->connect_error);
		}
		
		//$sql = "DELETE FROM `auto-feeder` WHERE id=9";
		//$result = $conn->query($sql);
		
		//getting form data from index.php on what to insert into table
		if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST) && !empty($_POST["amount"])) {
			$date = $_POST["auto-date"];
			$time = $_POST["auto-time"];
			$amount = $_POST["amount"];
		
			//echo "<p>Dipsense $amount of food on $date at $time</p>";
			
			//inserts into the database the values obtained from the form in index.php
			$sql = "INSERT INTO `auto-feeder` (`id`, `date`, `time`, `amount`) VALUES (NULL, '".$date."', '".$time."', ".$amount.")"; 
			$result = $conn->query($sql);
			
			//redirect to same page to prevent form resubmittion
			header('location: test.php');
		}
		
		//getting form from test.php on what row to delete
		if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST) && !empty($_POST["del-item"])) {
			$del = $_POST["del-item"];
		
			//echo "<p>Dipsense $amount of food on $date at $time</p>";
			
			//inserts into the database the values obtained from the form in index.php
			$sql = "DELETE FROM `auto-feeder` WHERE `auto-feeder`.`id` = ".$del.""; 
			$result = $conn->query($sql);
			
			//redirect to same page to prevent form resubmittion
			header('location: test.php');
		}
		
		
		//loop to incorporate the table into the web client
		$sql = "SELECT * FROM `auto-feeder` ORDER BY `id`";
		$result = $conn->query($sql) or die($conn->error);
		
		echo "<p style='font-size:20pt'>Automatic Feed Times</p>";
		
		echo "<table>";
		echo "<th><td>Date</td><td>Time</td><td>Amount</td></th>";
		
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td> Item " . $row['id'] . "</td><td>" . /*$row['date']*/ convertDate($row['date']) . "</td><td>" . $row['time'] . "</td><td>" . $row['amount'] . " Cup(s)</td></tr>";
		}
		
		echo "</table id='auto-times'>";


	?>
	
	<!-- form for what item to delte -->
	<form method="post" action="test.php">
		<div>
			<label>Which item would you like to remove?     <input type="number" name="del-item" value=1 min=0 step=1></label>
		</div>
		<div>
			<input type="submit" value="Submit" name="del-row">
		</div>
	</form>
	
	<a href="index.php" style="font-size:14pt"> Return </a>
	
</body>
</html>