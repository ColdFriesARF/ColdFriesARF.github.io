<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Automatic Remote Feeder</title>
    <link rel="stylesheet" href="styles.css">
	<script src="arf.js" defer></script>
</head>

<body>    
	<table>
		<tr>
			<td style="text-align:center" colspan="2"><label for="dispense-amount">Dispense how many cups?</label></td>
		</tr>
		<tr>
			<td><input type="range" id="dispense-amount" min="0" max="5" step=".5" value="5" onchange="range()"></td>
			<td><span id="amount">Dispense 5 Cup(s)</span></td>
		</tr>
		<tr>
			<td colspan="2"><span id="dispense-button"><button type="button" id="dispense">Dispense</button></span></td>
		</tr>
	</table>
    
	<!--
	<table>
	<tr>
		<td><label for="auto-date">What day do you want to automatically dispense food?</label></td>
	</tr>
	<tr>
		<td style="text-align:center"><input type="date" id="auto-date"></input></td>
	</tr>
	<tr>
		<td><label for="auto-time">What time do you want to automatically dispense food?</label></td>
	</tr>
	<tr>
		<td style="text-align:center"><input type="time" id="auto-time"></input></td>
	</tr>
	</table>
	-->
	<form>
		<div>
			<label>What day do you want to automatically dispense food?<input type="date" name="auto-date"></input></label>
		</div>
		<div>
			<label>What time do you want to automatically dispense food?<input type="time" name="auto-time"></input></label>
		</div>
		<div>
			<label>How many cup(s) of food?<select name="amount">
				<option>0.5 Cups</option>
				<option>1 Cup</option>
				<option>1.5 Cups</option>
				<option>2 Cups</option>
				<option>2.5 Cups</option>
				<option>3 Cups</option>
				<option>3.5 Cups</option>
				<option>4 Cups</option>
				<option>4.5 Cups</option>
				<option>5 Cups</option>
			</select>
		</div>
	
	
	</form>
	
</body>
    
</html>