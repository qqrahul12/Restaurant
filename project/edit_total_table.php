<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
    	header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
	
	$tt = $_POST["tt"];
    $info = mysqli_query($con,"SELECT total_tables-avl_tables from vals");
    $booked = mysqli_fetch_row($info)[0];
	mysqli_query($con,"UPDATE vals set total_tables = $tt, avl_tables = $tt-$booked");
?>
<script type="text/javascript">
	alert('Succesfully updated');
	window.location.replace('manage_booking.php#table_stat');
</script>
