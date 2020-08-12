<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
    	header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
	
	$count = $_POST["count"];
	$charge = $_POST["charge"];
	mysqli_query($con,"UPDATE booking_charge set charge = $charge where count = $count");
?>
<script type="text/javascript">
	alert('Succesfully updated');
	window.location.replace('manage_booking.php#book_charge');
</script>
