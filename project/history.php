<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
    	header("Location:login.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
?>
<head>
	<link rel="stylesheet" href="css/card.css">
	<link rel="stylesheet" href="css/button.css">
	<link rel="stylesheet" href="css/rc.css">
</head>
<body>
<div class="card" id="1">
<p class="dish-name" >Current Orders</p>
<?php
	$id = $_SESSION["id"];
	$info1 = mysqli_query($con,"SELECT * from order_history where user_id=$id and pending=1 order by id DESC ");
	if($info1->num_rows>0){
		while($row=$info1->fetch_assoc()){
			echo '<table align="center">';
			echo '<tr>';
			echo '<td>Date</td>';
			echo '<td>'.$row["dates"].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Order id</td>';
			echo '<td>'.$row["id"].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Price</td>';
			echo '<td>'.$row["price"].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>items</td>';
			echo '<td>'.$row["description"].'</td>';
			echo '</tr>';
			echo '</table>';
			echo '<br>';
		}
	echo '<a href="order.php">Order Now </a><br>';
	echo '<a href="user_home.php">Back to home</a><br>';
	}
?>
</div>
<br>

<div class="card" id="2">
<p class="dish-name" >Current Bookings</p>
<?php
	$id = $_SESSION["id"];
	$info1 = mysqli_query($con,"SELECT * from book_history where user_id=$id and pending=1 order by id DESC ");
	if($info1->num_rows>0){
		while($row=$info1->fetch_assoc()){
			echo '<table align="center">';
			echo '<tr>';
			echo '<td>Date</td>';
			echo '<td>'.$row["dattime"].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Booking id</td>';
			echo '<td>'.$row["id"].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Tables</td>';
			echo '<td>'.$row["number_of_tables"].'</td>';
			echo '</tr>';
			echo '</table>';
			echo '<br>';
		}
		    echo '<a href="book_table.php">Book table </a><br>';
		    echo '<a href="user_home.php">Back to home</a><br>';
	}
?>
</div>
<br>

<div class="card" id="3">
<p class="dish-name"  >Previous Orders</p>
<?php
	$id = $_SESSION["id"];
	$info1 = mysqli_query($con,"SELECT * from order_history where user_id=$id and pending=0 order by id DESC ");
	if($info1->num_rows>0){
		while($row=$info1->fetch_assoc()){
			echo '<table align="center">';
			echo '<tr>';
			echo '<td>Date</td>';
			echo '<td>'.$row["dates"].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Order id</td>';
			echo '<td>'.$row["id"].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Price</td>';
			echo '<td>'.$row["price"].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>items</td>';
			echo '<td>'.$row["description"].'</td>';
			echo '</tr>';
			echo '</table>';
			echo '<br>';
		}
	echo '<a href="order.php">Order Now </a><br>';
	echo '<a href="user_home.php">Back to home</a><br>';
	}
?>
</div>
<br>

<div class="card" id="4" >
<p class="dish-name">Previous Bookings</p>
<?php
	$id = $_SESSION["id"];
	$info1 = mysqli_query($con,"SELECT * from book_history where user_id=$id and pending=0 order by id DESC ");
	if($info1->num_rows>0){
		while($row=$info1->fetch_assoc()){
			echo '<table align="center">';
			echo '<tr>';
			echo '<td>Date</td>';
			echo '<td>'.$row["dattime"].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Booking id</td>';
			echo '<td>'.$row["id"].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Tables</td>';
			echo '<td>'.$row["number_of_tables"].'</td>';
			echo '</tr>';
			echo '</table>';
			echo '<br>';
		}
	echo '<a href="book_table.php">Book table </a><br>';
	echo '<a href="user_home.php">Back to home</a><br>';
	}
?>
</div>
	
</body>
