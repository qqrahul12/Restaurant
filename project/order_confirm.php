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
2
    session_start();
3
    if(!isset($_SESSION["id"]))
4
    {
5
        header("Location:login.php");
6
    }
7
    $con = mysqli_connect("localhost","root","","RoyalCafe");
8
    if(!$con)
9
    die("connection failed".mysqli_connect_error());
10
        
11
        $id = $_SESSION["id"];
12
        $total = $_SESSION["total"];
13
        $description = $_SESSION["description"];
14
        mysqli_query($con,"INSERT into order_history(user_id,price,description) values(
15
                $id,$total,'$description')");
16
​
17
        unset($_SESSION["total"]);
18
        unset($_SESSION["description"]);
19
    echo 'order success<br>';
20
    echo 'Pay the order amount and pickup your order within 30 mins from restaurant';
21
​
22
?>
23
<br>
24
<a  href="user_home.php" >back</a>
