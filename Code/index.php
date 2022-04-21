<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Automatic Remote Feeder</title>
    <link rel="stylesheet" href="C:\wamp64\www\wampthemes\simple\style.css">
	<script src="arf.js" defer></script>
	
	<style>
		form {
			border: 2px solid black;
			padding: 5px;
		}
		body {
			text-align: center;
		}
		#form-title {
			font-size: 16pt;
			font-weight: bold;
		}
	</style>
	
</head>

<body>    
	<?php	
		//getting form data from index.php on how much food to dispense
		if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST) && !empty($_POST["dispense-amount"])) {
			$amount = $_POST["dispense-amount"];
			
			$val = exec("sudo python3 /home/pi/mu_code/servo_copy.pi " .$amount."");
			
			header('location: index.php');
		}
	?>

	<form method="post" action="index.php">
		<div id="form-title">
			Insert the amount of food to dispense right now
		</div>
		<div>
			<label>How many gram(s) of food?     <input type="number" name="dispense-amount" value=1 min=1 step=1></label>
		</div>
		<div>
			<input type="submit" value="Submit" name="dispense">
		</div>
	</form>

	<form method="post" action="test.php">
		<div id="form-title">
			Insert info below to add an automatic feed time
		</div>
		<div>
			<label>What day do you want to automatically dispense food?   <input type="date" name="auto-date" value="2021-01-01"></label>
		</div>
		<div>
			<label>What time do you want to automatically dispense food?   <input type="time" name="auto-time" value="00:00"></label>
		</div>
		<div>
			<label>How many cup(s) of food?   <input type="number" name="amount" value=1 min=0 max=5 step=0.5></label>
		</div>
		<div>
			<input type="submit" value="Submit" name="row-insert">
		</div>
	</form>
	

	
	<a href="test.php" style="font-size:14pt"> Automatic Feed Times </a>
	
</body>
    
</html>