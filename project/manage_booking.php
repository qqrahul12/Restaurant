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
</head>
<body>
<div class="card">
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
?>
</div>
<br>

<div class="card">
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
?>
</div>
<br>

<div class="card">
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

</table>
<br>
<a href="admin_home.php">Back</a>
</div>
