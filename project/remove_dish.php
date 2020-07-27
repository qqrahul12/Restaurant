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

	mysqli_query($con,"DELETE from  dish where did = $id");
?>
<script>
	alert("Dish removed succesfully");
	window.location.href = "manage_dish.php";
</script>