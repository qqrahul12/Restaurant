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
	$info  = mysqli_query($con,"SELECT * from order_history order by id Desc limit 1");
    $row = mysqli_fetch_row($info);
    $_SESSION["dates"] = $row[3];
    $_SESSION["order_id"] = $row[0];
    header("Location:customer_order_detail.php")

?>
<br>
<a  href="user_home.php" >back</a><?php
