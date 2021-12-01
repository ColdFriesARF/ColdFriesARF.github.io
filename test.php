	<?php 
		$servername = "localhost";
		$username = "root";
		$passowrd = "";
		$database = "test";
		
		$conn = mysqli_connect($servername, $username, $password, $database);
		
		if ($conn->connect_error) {
			die("Database is not connect: error " . $conn->connect_error);
		}
		
		$sql = "DELETE FROM `auto-feeder` WHERE id=9";
		$result = $conn->query($sql);
		
		$sql = "SELECT * FROM `auto-feeder`";
		$result = $conn->query($sql) or die($conn->error);
		
		echo "<table>";
		
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td> Time " . $row['id'] . "</td><td>" . $row['date'] . "</td><td>" . $row['time'] . "</td><td>" . $row['amount'] . " Cup(s)</td></tr>";
		}
		
		echo "</table>";

	?>