<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
    	header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
	
	$id = $_POST["dish_id"];
	$price = $_POST["dish_price"];

	mysqli_query($con,"UPDATE  dish set price = $price where did = $id");
?>
<script>
	alert("Price changed Succesfully");
	window.location.href = "manage_dish.php";
</script>