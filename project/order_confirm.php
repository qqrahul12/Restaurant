<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
    	header("Location:login.php");
    }
    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
	
	$id = $_SESSION["id"];
	$total = $_SESSION["total"];
	$description = $_SESSION["description"];
	mysqli_query($con,"INSERT into order_history(user_id,price,description) values(
		$id,$total,'$description')");

	unset($_SESSION["total"]);
	unset($_SESSION["description"]);
    echo 'order success<br>';
    echo 'Pay the order amount and pickup your order within 30 mins from restaurant';

?>
<br>
<a  href="user_home.php" >back</a>