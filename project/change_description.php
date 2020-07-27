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
	$description = $_POST["description"];

	mysqli_query($con,"UPDATE  dish set description = '$description' where did = $id");
?>
<script>
	alert("Description changed Succesfully");
	window.location.href = "manage_dish.php";
</script>