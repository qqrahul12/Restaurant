<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
    	header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
	
	$name = $_POST["dish_name"];
	$price = $_POST["dish_price"];
	$description = $_POST["description"];

	mysqli_query($con,"INSERT into dish(name,price,description) values('$name',$price,'$description')");

?>
<script type="text/javascript">
	alert("Dish successfully added");
	window.location.href = "manage_dish.php";
</script>