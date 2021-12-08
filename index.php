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

<body>    <!--
	<table>
		<tr>
			<td style="text-align:center" colspan="2"><label for="dispense-amount">Dispense how many cups?</label></td>
		</tr>
		<tr>
			<td><input type="range" id="dispense-amount" min="0" max="5" step=".5" value="5" onchange="range()"></td>
			<td><span id="amount">Dispense 2.5 Cup(s)</span></td>
		</tr>
		<tr>
			<td colspan="2"><span id="dispense-button"><button type="button" id="dispense">Dispense</button></span></td>
		</tr>
	</table> -->

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