<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
    	header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());

	$info = mysqli_query($con,"SELECT count(Account_id) from Signin");
	$total = mysqli_fetch_row($info)[0];

	$info = mysqli_query($con,"SELECT count(distinct(user_id)) from order_history");
	$uo = mysqli_fetch_row($info)[0];

	$info = mysqli_query($con,"SELECT count(distinct(user_id)) from book_history");
	$ub = mysqli_fetch_row($info)[0];

?>
<head>
	<link rel="stylesheet" href="css/card.css">
	<link rel="stylesheet" href="css/button.css">
	<link rel="stylesheet" href="css/input.css">
	<style type="text/css">
		td {
			padding: 5px;
		}
	</style>
</head>

<body>
	<div class="card">
	<h2>user specific bookings</h2>
	<form action="admin_user_booking.php" method="POST">
		<label for="user_id">user id</label><br>
		<input type="number" name="user_id" id = "user_id" class="ipt" min = 1 required><br>
		<button type="submit">check now</button>
	</form><hr>

	<h2>user specific orders</h2>
	<form action="admin_user_order.php" method="POST">
		<label for="user_id">user id</label><br>
		<input type="number" name="user_id" id = "user_id" class="ipt" min = 1 required><br>
		<button type="submit">check now</button>
	</form><hr>

	<h2>user specific stastics</h2>
	<form action="admin_user_stat.php" method="POST">
		<label for="user_id">user id</label><br>
		<input type="number" name="user_id" id = "user_id" class="ipt" min = 1 required><br>
		<button type="submit">check now</button>
	</form>

	</div><br>
	
	<div class="card">
		<h1>users count</h1>
		<table align="center">
			<tr>
				<td>total users</td>
				<td><?php echo $total ?></td>
			</tr>
			<tr>
				<td>At least one booking users</td>
				<td><?php echo $ub ?></td>
			</tr>
			<tr>
				<td>At least one order users</td>
				<td><?php echo $uo ?></td>
			</tr>
		</table><br>
		<a href="admin_home.php">back</a>		
	</div>
</body>