<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
    	header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());

	$total_orders = 0;
	$total_amount = 0;
	$today = date("Y-m-d");
	$daily_orders = 0;
	$daily_order_amount = 0;

?>
<head>
	<link rel="stylesheet" href="css/card.css">
	<link rel="stylesheet" href="css/button.css">
	<link rel="stylesheet" href="css/rc.css">
</head>
<body>
<div class="card">
<p class="dish-name" id="1">Current Orders</p>
<?php
	$info1 = mysqli_query($con,"SELECT * from order_history where pending=1 order by id DESC ");
	$total_orders += $info1->num_rows;
	if($info1->num_rows>0){
		while($row=$info1->fetch_assoc()){
			echo '<table>';
			echo '<tr>';
			echo '<td>Date</td>';
			echo '<td>'.$row["dates"].'</td>';
			echo '</tr>';
			if($row["dates"]==$today){
				$daily_orders+=1;
				$daily_order_amount+=$row["price"];
			}
			echo '<tr>';
			echo '<td>Order id</td>';
			echo '<td>'.$row["id"].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Price</td>';
			$total_amount+=$row["price"];
			echo '<td>'.$row["price"].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>items</td>';
			echo '<td>'.$row["description"].'</td>';
			echo '</tr>';
			echo '</table>';
			echo '<br>';
		}
	}
?>
</div>
<br>

<div class="card">
<p class="dish-name" id="1">Completed Orders</p>
<?php
	$info1 = mysqli_query($con,"SELECT * from order_history where pending=0 order by id DESC ");
	$total_orders += $info1->num_rows;
	if($info1->num_rows>0){
		while($row=$info1->fetch_assoc()){
			echo '<table>';
			echo '<tr>';
			echo '<td>Date</td>';
			echo '<td>'.$row["dates"].'</td>';
			echo '</tr>';
			if($row["dates"]==$today){
				$daily_orders+=1;
				$daily_order_amount+=$row["price"];
			}
			echo '<tr>';
			echo '<td>Order id</td>';
			echo '<td>'.$row["id"].'</td>';
			echo '</tr>';
			echo '<tr>';
			$total_amount+=$row["price"];
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
	}
?>
</div>
<br>

<div class="card">
<p class="dish-name" id="1">Order Stastics</p>
<?php

		echo '<table align="center">';
		echo '<tr>';
		echo '<td>Total Orders</td>';
		echo '<td>'.$total_orders.'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Overall Order Amount</td>';
		echo '<td>'.$total_amount.'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Average Order Amount</td>';
		echo '<td>'.round($total_amount/$total_orders,2).'</td>';
		echo '</tr>';
		echo '</table>';
		echo '<br>';
?>
<table align="center">
	<tr>
		<td>Today Orders</td>
		<td><?php echo $daily_orders;?></td>
	</tr>
	<tr>
		<td>Order Amount</td>
		<td><?php echo $daily_order_amount;?></td>
	</tr>
	<?php
	if($daily_orders!=0){	
	echo '<tr>
		<td>Average Order Amount</td>';
	echo '<td>'.round($daily_order_amount/$daily_orders,2).'</td>';
	echo '</tr>';
}
	?>
</table>
<br>
<a href="admin_home.php">Back</a>
</div>
