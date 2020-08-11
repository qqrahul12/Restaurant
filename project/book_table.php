<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
    	header("Location:login.php");
    }
    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    	die("connection failed".mysqli_connect_error());
    $info = mysqli_query($con,"SELECT charge from booking_charge ");
    $charge=array();$j=0;
    while($row=$info->fetch_assoc())
    			$charge[$j++]=$row["charge"];

?>

<html>
<head>
<style type="text/css">
html {
    margin: auto;
    margin-top: 10%;
}

body {
    vertical-align: middle;
    background-color: #888888;
}

</style>

	<link rel= "stylesheet"  href="css/rc.css">
	<link rel= "stylesheet"  href="css/button.css">
	<link rel= "stylesheet"  href="css/input.css">
	<link rel= "stylesheet"  href="css/card.css">
	<script type="text/javascript" src="rc.js"></script>
<style type="text/css">
	th , td {
	padding-right: 30px;
</style>
</head>
<body>
<div class="card">
<div class="center">
	<form action="vbook.php" method="post">

		<label for="tables">Number of tables</label><br>
		<select id ="tables" name="count" class="ipt" >
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
		</select><br>
		<button  type="submit">Book now</button>

	</form>
	<a  href="menu.php">Check Menu</a>
   <a  href="order.php">order online</a><br>
   <span>check<a href="history.php#2">Current Bookings</a><a href="history.php#4" >Previous Bookings</a></span><br>
   <a  href="user_home.php" >back to home</a>

<table align="center" style="margin-top: 20px">
	<tr>
		<th>Tables</th>
		<th>Charge</th>
	</tr>
	<tr>
		<td>1</td>
		<td><?php echo $charge[0] ?></td>
	</tr>
	<tr>
		<td>2</td>
		<td><?php echo $charge[1] ?></td>
	</tr>
	<tr>
		<td>3</td>
		<td><?php echo $charge[2] ?></td>
	</tr>
</table> 
</div>
</div>

</body>
