<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
    	header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());

	$info = mysqli_query($con,"SELECT * from booking_charge");
	$charge = array();
	$j = 1;
	while($row = $info->fetch_assoc()){
		$charge[$j] = $row["charge"];
		$j+=1;
	}

	$total_charge=0;
	$total_booking = 0;
	$total_booked_tables = 0;
	$today = date("Y-m-d");
	$daily_booking = 0;
	$daily_booked_tables = 0;
	$daily_charge=0;

?>
<head>
	<link rel="stylesheet" href="css/card.css">
	<link rel="stylesheet" href="css/button.css">
	<link rel="stylesheet" href="css/rc.css">
	<link rel="stylesheet" href="css/input.css">
</head>
<body>
<div class="card" id="cur_book">
<p class="dish-name" id="1">Current Bookings</p>
<?php
	$info1 = mysqli_query($con,"SELECT * from book_history where pending=1 order by id DESC ");
	$total_booking += $info1->num_rows;
	if($info1->num_rows>0){
		while($row=$info1->fetch_assoc()){
			echo '<table align="center">';
			echo '<tr>';
			echo '<td>Date</td>';
			echo '<td>'.$row["dattime"].'</td>';
			echo '</tr>';

			if($row["dattime"]==$today){
				$daily_booking+=1;
				$daily_booked_tables+=$row["number_of_tables"];
				$daily_charge += $charge[$row["number_of_tables"]];
			}
			$total_booked_tables += $row["number_of_tables"];
			$total_charge += $charge[$row["number_of_tables"]];

			echo '<tr>';
			echo '<td>Booking id</td>';
			echo '<td>'.$row["id"].'</td>';
			echo '</tr>';
			echo '<tr>';

			echo '<td>user id</td>';
			echo '<td>'.$row["user_id"].'</td>';
			echo '</tr>';
			echo '<tr>';

			echo '<td>table count</td>';
			echo '<td>'.$row["number_of_tables"].'</td>';
			echo '</tr>';
			echo '</table>';
			echo '<br>';
		}
	}
?><hr>
<a href="#book_charge">Booking Charges</a>
<a href="#prev_book">Previous Bookings</a>
<a href="#book_stat">Booking Stats</a>
<a href="#table_stat">Table stats</a>
<a href="admin_home.php">Back</a>
</div>
<br>

<div class="card" id="prev_book">
<p class="dish-name" id="1">Completed Bookings</p>
<?php
	$info1 = mysqli_query($con,"SELECT * from book_history where pending=0 order by id DESC ");
	$total_booking += $info1->num_rows;
	if($info1->num_rows>0){
		while($row=$info1->fetch_assoc()){
			echo '<table align="center">';
			echo '<tr>';
			echo '<td>Date</td>';
			echo '<td>'.$row["dattime"].'</td>';
			echo '</tr>';

			if($row["dattime"]==$today){
				$daily_booking+=1;
				$daily_booked_tables+=$row["number_of_tables"];
			}

			echo '<tr>';
			echo '<td>Booking id</td>';
			echo '<td>'.$row["id"].'</td>';
			echo '</tr>';
			echo '<tr>';

			$total_booked_tables+=$row["number_of_tables"];
			echo '<td>user id</td>';
			echo '<td>'.$row["user_id"].'</td>';
			echo '</tr>';
			echo '<tr>';

			echo '<td>table count</td>';
			echo '<td>'.$row["number_of_tables"].'</td>';
			echo '</tr>';
			echo '</table>';
			echo '<br>';
		}
	}
?><hr>
<a href="#book_charge">Booking Charges</a>
<a href="#cur_book">Current Bookings</a>
<a href="#book_stat">Booking Stats</a>
<a href="#table_stat">Table stats</a>
<a href="admin_home.php">Back</a>
</div>
<br>

<div class="card" id = "book_stat">
<p class="dish-name" id="1">Booking Stastics</p>
<?php

	echo '<table align="center">';
	echo '<tr>';
	echo '<td>Total Bookings</td>';
	echo '<td>'.$total_booking.'</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>Overall Booked tables</td>';
	echo '<td>'.$total_booked_tables.'</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>Overall booking charge</td>';
	echo '<td>'.$total_charge.'</td>';
	echo '</tr>';
	echo '</table>';
	echo '<br>';
?>
<table align="center">
	<tr>
		<td>Today Bookings</td>
		<td><?php echo $daily_booking;?></td>
	</tr>

	<tr>
		<td>tables booked</td>
		<td><?php echo $daily_booked_tables;?></td>
	</tr>
	
	<tr>
		<td>booking charge</td>';
		<td><?php echo $daily_charge;?></td>';
	</tr>';

</table><hr>
<a href="#book_charge">Booking Charges</a>
<a href="#prev_book">Previous Bookings</a>
<a href="#cur_book">Current Booking</a>
<a href="#table_stat">Table stats</a>
<a href="admin_home.php">Back</a>
</div>
<?php
    $info = mysqli_query($con,"SELECT charge from booking_charge ");
    $charge=array();$j=0;
    while($row=$info->fetch_assoc())
    			$charge[$j++]=$row["charge"];
    $info = mysqli_query($con,"SELECT * from vals ");
    $row = mysqli_fetch_row($info);
    $tt = $row[0];
    $at= $row[1];
    $mt = $row[2];

?>
<div class="card" id = "book_charge">
	<h2>Booking Charges</h2>
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
</table><hr>
<form action="edit_booking_charge.php" method="POST">
	<label for="count">count</label><br>
	<input type="number" name="count" class="ipt" id="count" min ="1" max = "<?php echo $mt?>" step = "1" required><br>
	<label for="charge">charge</label><br>
	<input type="number" name="charge" class="ipt" id = "charge" min ="50" step = "50" required><br><br>
	<button type="submit">change now</button>
</form> <hr>
<a href="#cur_book">Current Bookings</a>
<a href="#prev_book">Previous Bookings</a>
<a href="#book_stat">Booking Stats</a>
<a href="#table_stat">Table stats</a>
<a href="admin_home.php">Back</a>
</div>
<div class="card" id="table_stat">
	<h2>Table stats</h2>
	<table align="center" style="margin-top: 20px">
	<tr>
		<td>Total tables</td>
		<td><?php echo $tt ?></td>
	</tr>
	<tr>
		<td>Available tables</td>
		<td><?php echo $at ?></td>
	</tr>
	<tr>
		<td>Max tables can be booked</td>
		<td><?php echo $mt ?></td>
	</tr>
</table> <hr>
<form action="edit_total_table.php" method="POST">
	<label for="tt">new Total tables</label><br>
	<input type="number" name="tt" class="ipt" id="tt" min ="10" step = "5" required> 
	<br><br>
	<button type="submit">change now</button>
</form><hr>
<a href="#book_charge">Booking Charges</a>
<a href="#prev_book">Previous Bookings</a>
<a href="#book_stat">Booking Stats</a>
<a href="#cur_book">Current Booking</a>
<a href="admin_home.php">Back</a> 
</div>
